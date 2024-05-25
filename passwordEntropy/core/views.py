import math
import requests
import hashlib

from django.shortcuts import render

def calculate_entropy(password):
    charset_size = 0
    if any(c.islower() for c in password):
        charset_size += 26
    if any(c.isupper() for c in password):
        charset_size += 26
    if any(c.isdigit() for c in password):
        charset_size += 10
    if any(c in "!@#$%^&*()-_=+[]{}|;:',.<>?/~`" for c in password):
        charset_size += 32
    if charset_size == 0:
        return 0
    
    entropy = len(password) * math.log2(charset_size)
    print(charset_size)
    return entropy

def password_pwned(password):
    sha1_password = hashlib.sha1(password.encode('utf-8')).hexdigest().upper()
    prefix, suffix = sha1_password[:5], sha1_password[5:]
    response = requests.get(f"https://api.pwnedpasswords.com/range/{prefix}")
    return suffix in response.text

def password_entropy_view(request):
    result = None
    quality = ""
    pwned = False
    error_message = None

    if request.method == 'POST':
        password = request.POST.get('password')
        entropy = calculate_entropy(password)
        
        if entropy < 19:
            quality = "Very Weak!"
        elif entropy < 38:
            quality = "Weak!"
        elif entropy < 52:
            quality = "OK!"
        else:
            quality = "STRONG!"
        
        pwned = password_pwned(password)
        if pwned:
            error_message = "Essa senha já está comprometida! Troque ela!"

        result = entropy

    return render(request, 'core/password_entropy.html', {
        'result': result,
        'quality': quality,
        'error_message': error_message,
        'pwned': pwned,
    })
