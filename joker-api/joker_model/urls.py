from django.conf.urls import url, include
from rest_framework import routers

import views

router = routers.DefaultRouter()
router.register(r'customer', views.CustomerViewSet)

urlpatterns = [
    url(r'', include(router.urls)),
    url(r'histogram/$', views.histogram),
    url(r'active_count/$', views.active_count),
    url(r'turnover_growth_rate/$', views.turnover_growth_rate)
]
