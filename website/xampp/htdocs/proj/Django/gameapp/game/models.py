from django.db import models


# Create your models here.
class Register(models.Model):
    username = models.CharField(max_length=122)
    password = models.CharField(max_length=122)
