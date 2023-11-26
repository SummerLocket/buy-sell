from django.contrib import admin
from django.urls import path, include
from home import views
from .views import seller_items, product_upload, buyer_page, purchase_product, user_register,seller_orders, sell_item

urlpatterns = [
    path('', buyer_page, name='buyer_page'),
    path('index', views.index, name="index"),
    # path('items', views.Item, name="item"),
    path('login', views.loginUser, name="login"),
    path('register', user_register, name='register'),
    path('logout', views.logoutUser, name="logout"),
    path('upload_item', views.upload_item, name="upload_item"),
    path('upload_success', views.upload_success, name="upload_success"), 
    path('seller_items/', seller_items, name='seller_items'),
    path('product/upload', product_upload, name='product_upload'),
    # path('', buyer_page, name='buyer_page'),
    path('buyer/purchase/<int:product_id>/', purchase_product, name='purchase_product'),
    path('order', seller_orders, name='seller_orders'),
    path('sell-item/<int:item_id>/', sell_item, name='sell_item'),
    
]