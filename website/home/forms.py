from django import forms
from django.contrib.auth.models import User
from .models import Item

class UploadItemForm(forms.ModelForm):
    # item_name = forms.CharField(max_length=100)
    # item_description = forms.CharField(widget=forms.Textarea)
    # item_image = forms.ImageField()
    # Add any other fields you need for your item upload form
    class Meta:
        model = Item
        fields = ['seller', 'item_name', 'item_description', 'item_image']

    def __init__(self, *args, **kwargs):
        super(UploadItemForm, self).__init__(*args, **kwargs)
        self.fields['seller'].widget = forms.HiddenInput()
        self.fields['seller'].required = False  # Make the seller field not required