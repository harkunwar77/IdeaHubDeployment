from django.db import models

# Create your models here.
class idea_model(models.Model):
    id = models.IntegerField(primary_key=True)
    question = models.TextField(max_length=1000)
    answers = models.TextField(max_length=10000)
