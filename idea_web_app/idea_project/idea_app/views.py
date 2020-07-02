from django.shortcuts import render
from django.http import HttpResponse,JsonResponse
from rest_framework.parsers import JSONParser
from rest_framework.views import APIView
from idea_app.models import idea_model
from idea_app.serializers import ideaserializer, ideaserializer2,ideaserializer3
import logging
from django.db.models import Q

# Create your views here.

class api(APIView):
    def get(self,request):
        ideas=idea_model.objects.all()
        serializer=ideaserializer2(ideas,many=True)
        return JsonResponse(serializer.data,safe=False)

    def post(self,request):
        data = JSONParser().parse(request)
        serializer = ideaserializer(data=data)

        if serializer.is_valid():

            serializer.save()
            return JsonResponse(serializer.data, status=201)
        return JsonResponse(serializer.errors, status=400)


class api2(APIView):
    def get_object(self,pk):
        try:
            ideas=idea_model.objects.get(pk=pk)
        except:
            return HttpResponse(status=404)

    def get(self,request,pk):
        ideas=idea_model.objects.get(pk=pk)
        serializer=ideaserializer2(ideas)
        return JsonResponse(serializer.data)

    def put(self,request,pk):
        ideas = idea_model.objects.get(pk=pk)
        data = JSONParser().parse(request)
        serializer = ideaserializer3(ideas,data=data)

        if serializer.is_valid():
            serializer.save()
            return JsonResponse(serializer.data, status=201)
        return JsonResponse(serializer.errors, status=400)

    def delete(self ,request,pk):
        ideas=idea_model.objects.get(pk=pk)
        ideas.delete()
        return HttpResponse(status=204)

    def search(self, srch):
          ideas=idea_model.objects.filter(question__icontains=srch)
          serializer=ideaserializer2(ideas,many=True)
          return JsonResponse(serializer.data,safe=False)
