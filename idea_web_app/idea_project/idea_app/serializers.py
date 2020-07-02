from idea_app.models import idea_model
from rest_framework import serializers
class ideaserializer(serializers.ModelSerializer):
    class Meta():
        model=idea_model
        fields=['question']
class ideaserializer2(serializers.ModelSerializer):
    class Meta():
        model=idea_model
        fields=['answers','question','id']
class ideaserializer3(serializers.ModelSerializer):
    class Meta():
        model=idea_model
        fields=['answers','id']
