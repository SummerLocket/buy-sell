from django.shortcuts import render
from game.models import Register

# Create your views here.
def index(request):
    return render(request, 'Register.html')

def reg(request):
    if request.method == "POST":
        username = request.POST.get('username')
        password = request.POST.get('psw')
        reg = Register(username=username, password=password)
        reg.save()
    return render(request, 'Register.html')




