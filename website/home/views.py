from django.shortcuts import render, redirect
from django.http import HttpResponse
from django.template import loader
from django.contrib.auth import logout, authenticate, login
from django.contrib.auth.models import User

# admin account - user- admin, email- admin@email.com, pass- admin
# user account - user- ayush, pass- qwe123!@#
# Create your views here.


def index(request):
    if request.user.is_anonymous:
        return redirect("/login")
    return render(request, 'index.html')

def Item(request):
    return render(request, 'Items.html')

def loginUser(request):
    if request.method=="POST":
        Username = request.POST.get('username')
        Password = request.POST.get('password')

        user = authenticate(username=Username, password=Password)
        if user is not None:
            login(request, user)
            return redirect("/")
    
    return render(request, 'login.html')

def logoutUser(request):
    logout(request)
    return redirect('/login')