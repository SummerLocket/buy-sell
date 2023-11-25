from django.contrib.auth.decorators import login_required
from django.shortcuts import render, redirect
from django.http import HttpResponse
from django.template import loader
from django.contrib.auth import logout, authenticate, login
from django.contrib.auth.models import User
from .forms import UploadItemForm
from .models import Item
from .models import Seller
# from .forms import ProductForm
# from .models import Product
from django.contrib.auth.forms import UserCreationForm
from django.contrib import messages


# admin account - user- admin, email- admin@email.com, pass- admin
# user account - user- ayush, pass- qwe123!@#
# superuser - ayushs, pass- ayushs
# Create your views here.
# seller4, pass - qwerty@123
# seller1, pass - qwerty@123
# seller2, pass - qwerty@123
# seller3, pass - qwerty@123


def index(request):
    if request.user.is_anonymous:
        return redirect("/login")
    return render(request, 'index.html')

# def Item(request):
#     return render(request, 'Items.html')

def loginUser(request):
    if request.method=="POST":
        Username = request.POST.get('username')
        Password = request.POST.get('password')

        user = authenticate(username=Username, password=Password)
        if user is not None:
            login(request, user)
            return redirect("/")
    
    return render(request, 'login.html')


def user_register(request):
    if request.method == 'POST':
        form = UserCreationForm(request.POST)
        if form.is_valid():
            form.save()
            username = form.cleaned_data.get('username')
            messages.success(request, f'Account created for {username}')
            return redirect('/login')  
    else:
        form = UserCreationForm()
    return render(request, 'register.html', {'form': form})


def logoutUser(request):
    logout(request)
    return redirect('/login')

def upload_success(request):
    return render(request, 'upload_success.html')

@login_required
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
            # After processing, redirect the user to a success page or
            return redirect('upload_success')  

    else:
        form = UploadItemForm()

    return render(request, 'upload_item.html', {'form': form})

def seller_items(request):
    # Retrieve all items uploaded by the currently logged-in seller
    items = Item.objects.filter(seller=request.user.id)
    return render(request, 'seller_items.html', {'items': items})


def product_upload(request):
    if request.method == 'POST':
        form = ProductForm(request.POST)
        if form.is_valid():
            # Save the product and associate it with the current seller 
            seller = get_current_seller(request)  # get the current seller
            product = form.save(commit=False)
            product.seller = seller
            product.save()
            return redirect('seller_page', seller_id=seller.id)
    else:
        form = ProductForm()

    return render(request, 'product_upload.html', {'form': form})

# Helper function to get the current seller 
def get_current_seller(request):
    seller_id = request.session.get('seller_id', None)
    if seller_id:
        return Seller.objects.get(pk=seller_id)
    else:
        return None
    


def buyer_page(request):
    # Retrieve all products available for purchase
    products = Product.objects.all()

    return render(request, 'buyer_page.html', {'products': products})

def purchase_product(request, product_id):
    # Implement logic to process the purchase of a product
    product = Product.objects.get(pk=product_id)

    # Update the seller's page to reflect changes in sold items
    seller = product.seller
    seller_products = Product.objects.filter(seller=seller)
    sold_product = seller_products.get(pk=product_id)
    sold_product.sold = True
    sold_product.save()

    return redirect('buyer_page')