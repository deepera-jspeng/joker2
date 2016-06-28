from django.conf.urls import url

import views

urlpatterns = [
    url(r'env/set/$', views.env_set),
    url(r'env/get/$', views.env_get)
]
