from django import forms

class UploadItemForm(forms.Form):
    item_name = forms.CharField(max_length=100)
    item_description = forms.CharField(widget=forms.Textarea)
    item_image = forms.ImageField()
    # Add any other fields you need for your item upload form
