from django.urls import path
from .views import password_entropy_view

urlpatterns = [
    path('', password_entropy_view, name='password_entropy'),
]
