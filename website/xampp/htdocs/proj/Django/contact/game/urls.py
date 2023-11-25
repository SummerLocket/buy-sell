from django.contrib import admin
from django.urls import path
from game import views


urlpatterns = [
    path('', views.index , name='index'),
    path('reg',views.reg , name='reg'),
    path('cont',views.cont , name='cont'),
    path('Game',views.game , name='game'),
    path('dice',views.dice , name='dice'),
    path('cards',views.cards , name='cards'),
    path('newstopics',views.newstopics , name='nt')

]