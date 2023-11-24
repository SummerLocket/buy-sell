from django.db import models
from django.contrib.auth.models import User

# Create your models here.
class Item(models.Model):
    seller = models.ForeignKey(User, on_delete=models.CASCADE)
    item_name = models.CharField(max_length=100)
    item_description = models.TextField()
    item_image = models.ImageField(upload_to='item_images/')  # Make sure to create a 'item_images' folder in your media directory
    # Add any other fields you need

    def __str__(self):
        return self.item_name