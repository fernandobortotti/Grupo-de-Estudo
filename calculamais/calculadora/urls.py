from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('sum/', views.sum_view, name='sum_form'),
    # path('sum/form/', views.sum_form, name='sum_form'),
    path('subtract/', views.subtract_view, name='subtract_form'),
    path('multiply/', views.multiply_view, name='multiply_form'),
    path('divide/', views.divide_view, name='divide_form'),
]
