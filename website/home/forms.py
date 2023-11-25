from django import forms
from django.contrib.auth.models import User
from .models import Item
# from .models import Product
from django.contrib.auth.forms import UserCreationForm

class CustomUserCreationForm(UserCreationForm):
    class Meta:
        model = User  # Assuming you have imported User from django.contrib.auth.models
        fields = ['username', 'password1', 'password2']

class UploadItemForm(forms.ModelForm):
    class Meta:
        model = Item
        fields = ['item_name', 'item_category', 'item_price', 'item_image', 'item_description']

