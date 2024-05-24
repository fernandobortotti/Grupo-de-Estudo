from django.shortcuts import render

# Create your views here.
from django.http import HttpResponse
from django.shortcuts import render
import functools
import operator

def sum_view(request):
    result = None
    if 'nums' in request.GET:
        # Obtenha os valores e os separe por vírgula
        nums = request.GET.get('nums')
        try:
            troca_virgula_ponto = nums.replace(',', '.')
            numbers = [float(num) for num in troca_virgula_ponto .split('+')]
            
            # Calcule a soma
            result = sum(numbers)
            
            # Gere uma string para exibir os números e o resultado
            numbers_str = ' + '.join(map(str, numbers))
            result = f"O resultado de {numbers_str} é {result}"
        except ValueError:
            # Tratar erros de conversão para float
            return render(request, 'sum_form.html', {'error_message': 'Infelizmente não é aceito esse tipo de dado, use somente números e o operador soma. Por exemplo: 6+7'})
        
    
    return render(request, 'sum_form.html', {'result': result})


def sum_form(request):
    return render(request, 'sum_form.html')


def subtract_view(request):
    result = None
    if 'nums' in request.GET:
        # Obtenha os valores e os separe por vírgula
        nums = request.GET.get('nums')
        try:
            troca_virgula_ponto = nums.replace(',', '.')
            numbers = [float(num) for num in troca_virgula_ponto .split('-')]
            
            # Calcule a subtração de todos os elementos da lista
            print(numbers)
            result = functools.reduce(operator.sub,numbers)
            
            # Gere uma string para exibir os números e o resultado
            numbers_str = ' - '.join(map(str, numbers))
            result = f"O resultado de {numbers_str} é {result}"
        except ValueError:
            # Tratar erros de conversão para float
            return render(request, 'subtract_form.html', {'error_message': 'Infelizmente não é aceito esse tipo de dado, use somente números e o operador subtração. Por exemplo: 6-7'})
        
    
    return render(request, 'subtract_form.html', {'result': result})

def subtract_form(request):
    return render(request, 'subtract_form.html')

def multiply_view(request):
    result = None
    if 'nums' in request.GET:
        # Obtenha os valores e os separe por vírgula
        nums = request.GET.get('nums')
        try:
            troca_virgula_ponto = nums.replace(',', '.')
            numbers = [float(num) for num in troca_virgula_ponto .split('*')]
            
            # Calcule a subtração de todos os elementos da lista
            print(numbers)
            result = functools.reduce(operator.mul,numbers)
            
            # Gere uma string para exibir os números e o resultado
            numbers_str = ' * '.join(map(str, numbers))
            result = f"O resultado de {numbers_str} é {result}"
        except ValueError:
            # Tratar erros de conversão para float
            return render(request, 'multiply_form.html', {'error_message': 'Infelizmente não é aceito esse tipo de dado, use somente números e o operador multiplicação. Por exemplo: 6*7'})
        
    
    return render(request, 'multiply_form.html', {'result': result})

def multiply_form(request):
    return render(request, 'multiply_form.html')

def divide_view(request):
    result = None
    if 'nums' in request.GET:
        # Obtenha os valores e os separe por vírgula
        nums = request.GET.get('nums')
        
        try:
            troca_virgula_ponto = nums.replace(',', '.')
            numbers = [float(num) for num in troca_virgula_ponto .split('/')]
            
            # Calcule a subtração de todos os elementos da lista
            if 0 in numbers:
                # pass
                return render(request, 'divide_form.html', {'error_message': "A lista contém um zero, o que resultaria em uma divisão por zero."})
            result = functools.reduce(operator.truediv,numbers)
            
            # Gere uma string para exibir os números e o resultado
            numbers_str = ' / '.join(map(str, numbers))
            result = f"O resultado de {numbers_str} é {result}"
        except ValueError:
            # Tratar erros de conversão para float
            return render(request, 'divide_form.html', {'error_message': 'Infelizmente não é aceito esse tipo de dado, use somente números e o operador divisão. Por exemplo: 6/7'})
    return render(request, 'divide_form.html', {'result': result})

def divide_form(request):
    return render(request, 'divide_form.html')


def index(request):
    return render(request, 'index.html')
