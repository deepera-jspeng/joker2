from datetime import datetime

from django.core.exceptions import ObjectDoesNotExist
from rest_framework import status
from rest_framework.decorators import api_view
from rest_framework.response import Response

from serializers import *


@api_view(['GET'])
def env_get(request):
    if "key" in request.GET:
        try:
            return Response(EnvironmentVariableSerializer(EnvironmentVariable.objects.get(key=request.GET["key"])).data)
        except ObjectDoesNotExist:
            return Response(status=status.HTTP_404_NOT_FOUND)
    else:
        return Response(status=status.HTTP_400_BAD_REQUEST)


@api_view(['GET'])
def env_set(request):
    if "key" in request.GET and "value" in request.GET:
        try:
            env_var = EnvironmentVariable(key=request.GET["key"], value=request.GET["value"], last_update=datetime.now())
            env_var.save()
            return Response(EnvironmentVariableSerializer(env_var).data)
        except ObjectDoesNotExist:
            return Response(status=status.HTTP_404_NOT_FOUND)
    else:
        return Response(status=status.HTTP_400_BAD_REQUEST)
