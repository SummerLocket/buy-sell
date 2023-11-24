from django.contrib.auth.decorators import login_required
from django.shortcuts import render, redirect
from django.http import HttpResponse
from django.template import loader
from django.contrib.auth import logout, authenticate, login
from django.contrib.auth.models import User
from .forms import UploadItemForm
from .models import Item


# admin account - user- admin, email- admin@email.com, pass- admin
# user account - user- ayush, pass- qwe123!@#
# superuser - ayushs, pass- ayushs
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

def upload_success(request):
    return render(request, 'upload_success.html')

# @login_required
def upload_item(request):
    if request.user.is_anonymous:
        return redirect("/login")
    elif request.method == 'POST':
        form = UploadItemForm(request.POST, request.FILES)
        if form.is_valid():
            # Set the seller to the currently logged-in user
            form.instance.seller = request.user
            # Save the item to the database
            form.save()
            # After processing, you can redirect the user to a success page or
            # the same page with a success message.

            return redirect('upload_success')  # Redirect to a success page

    else:
        form = UploadItemForm()

    return render(request, 'upload_item.html', {'form': form})

def seller_items(request):
    # Retrieve all items uploaded by the currently logged-in seller
    items = Item.objects.filter(seller=request.user)
    return render(request, 'seller_items.html', {'items': items})
