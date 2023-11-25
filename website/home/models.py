from django.db import models
from django.contrib.auth.models import User


class Item(models.Model):
    seller = models.ForeignKey(User, on_delete=models.CASCADE)
    item_name = models.CharField(max_length=100, default=None)
    item_description = models.TextField(default=None)
    item_category = models.CharField(max_length=255, default=None)
    item_price = models.DecimalField(max_digits=10, decimal_places=2, default=None)
    item_image = models.ImageField(upload_to='item_images/', default=None)  
    

    def __str__(self):
        return self.item_name

    
class Seller(models.Model):
    seller_name = models.CharField(max_length=255)
