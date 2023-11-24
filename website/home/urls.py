from django.contrib import admin
from django.urls import path, include
from home import views
from .views import seller_items

urlpatterns = [
    path('', views.index, name="index"),
    path('items', views.Item, name="item"),
    path('login', views.loginUser, name="login"),
    path('logout', views.logoutUser, name="logout"),
    path('upload_item', views.upload_item, name="upload_item"),
    path('upload_success', views.upload_success, name="upload_success"), 
    path('seller_items', views.seller_items, name='seller_items'),

]