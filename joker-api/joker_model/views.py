import numpy
from collections import Counter

from rest_framework import status
from rest_framework import viewsets
from rest_framework.decorators import api_view
from rest_framework.response import Response

from serializers import *


class CustomerViewSet(viewsets.ModelViewSet):
    queryset = Customer.objects.all()
    serializer_class = CustomerSerializer


@api_view(['GET'])
def histogram(request):
    if "field" in request.GET and "categorical" in request.GET:
        field = request.GET["field"]
        customer = Customer.objects.values_list(field, flat=True)
        if request.GET["categorical"] == "true":
            hist = numpy.divide(Counter(customer).values(), [float(len(customer))])
            bin_edges = Counter(customer).keys()
        else:
            bins = 10
            if "bins" in request.GET:
                bins = numpy.fromstring(request.GET["bins"], dtype=float, sep=',')
            hist, bin_edges = numpy.histogram(customer, bins)
            hist = numpy.divide(hist, [float(len(customer))])
            bin_edges = bin_edges.tolist()
        return Response({
            "hist": hist,
            "bin_edges": bin_edges
        })
    else:
        return Response(status=status.HTTP_400_BAD_REQUEST)
