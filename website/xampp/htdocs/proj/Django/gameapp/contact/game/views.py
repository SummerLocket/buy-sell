from django.shortcuts import render,HttpResponse
from game.models import Contact
# Create your views here.
def index(request):
    return render(request,'login.html')

def reg(request):
    return render(request,'contact.html')

def game(request):
    return render(request,'Firstpage.html')

def dice(request):
    return render(request,'dice.html')

def cards(request):
    return render(request,'cards.html')

def newstopics(request):
    return render(request,'news_topics.html')

def cont(request):
    if request.method == "POST":
        name = request.POST.get('username')
        phone = request.POST.get('psw')
        email = request.POST.get('email')
        contact = Contact(name=name,phone=phone,email=email)
        contact.save()
    return render(request,'contact.html')