from django.conf.urls import url, include
from rest_framework import routers

import views

router = routers.DefaultRouter()
router.register(r'customer', views.CustomerViewSet)

urlpatterns = [
    url(r'', include(router.urls)),
    url(r'histogram/$', views.histogram)
]
