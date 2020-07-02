<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252" />
<title>How to Add Search Functionality to a Website in Django</title>
<meta name="keywords" content="how to, add, search, functionality, website, 
Django,
python"/>
<meta name="description" content="In this article, we show how to 
add search functionality to a website in Django. With a search text field, a user can search any database on the website."/>
<meta name=viewport content="width=device-width, initial-scale=1">
<link href="default66.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
		<!-- <h1><a href="#">Mr&bull;Techie</a></h1> -->
		<h2><a href="http://www.learningaboutelectronics.com">Learning about Electronics</a></h2>
		<!-- <p><a href="#">By CSS Templates For Free</a></p> -->
	</div>
<!--	<div id="rss"><a href="#">Subscribe to RSS Feed</a></div> -->
<!-- 
	<div id="search">
		<form id="searchform" method="get" action="">
			<fieldset>
				<input type="text" name="s" id="s" size="15" value="" />
				<input type="submit" id="x" value="Search" />
			</fieldset>
		</form>
	</div>
-->
</div>
<!-- end header -->
<!-- star menu -->
﻿
<script type='text/javascript' src='jquery.js'></script>
<script type='text/javascript' src='nav.js'></script>


<div id='spancolumns'>
<br><hr>
<span class='menu-trigger'><img src='/images/mobile.png'></span> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
<largetext><form id='thisinline' action='search.php' method='POST'><input type='text' name='search_entered' size='15'/>
<input type='submit' name='submit' value='Search'/>
</form></largetext>


<br><hr>
</div>



<div class='nav-menu'>
	<ul>
		<li><a href='http://www.learningaboutelectronics.com'>Home</a></li>
		<li class='current_page_item'><a href='http://www.learningaboutelectronics.com/Articles'>Articles</a></li>
		<li><a href='http://www.learningaboutelectronics.com/Projects'>Projects</a></li>
		<a href='http://www.learningaboutelectronics.com/Programming'>Programming</a> |
		<li><a href='http://www.learningaboutelectronics.com/Calculators'>Calculators</a></li>
		<li><a href='http://www.learningaboutelectronics.com/Contact'>Contact</a></li>
	</ul>
</div>


<!-- end menu -->
<!-- start page -->
 
<div id="page">
<!-- 
<div id="left_img">
<img src="images/dreamstimefree-small.jpg"/>
</div>
-->
	<!-- start ads -->
	<div id="rightads"><script type="text/javascript"><!--
google_ad_client = "ca-pub-7591845391773873";
/* Large Rectangle Text Ad */
google_ad_slot = "1729898602";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
	<!-- end ads -->
	<!-- start content -->
		<div class="post">
<!--			<div class="title">
			</div>
-->


			<div class="entry">
				<h1>How to Add Search Functionality to a Website in Django</h1><br><br>
<img style="width: 208px; height: 62px;" alt="Python"
 src="/images/Python.png"><br><br><br>


<p id="para1">In this article, we show how to add search functionality to a website in Django.

<p id="para1">With search functionality added to a website, a user can search any database table on the website. This can be a database of products, 
such as the search field that amazon has on its site. This can be a search field for posts, such as the search field on quora. Etc.

<p id="para1">The search engine is geared toward looking up items in a database and returning results based on a user's query. 

<p id="para1">So you can either place the search functionality within an existing app, or you can create your own app entirely for search. We take
the latter approach in this article and create our own search app. 

<p id="para1">We do this with the following line shown below. 


<br/><br/>
<textarea cols="35" rows="3">
py manage.py startapp search 
</textarea>
<br/><br/>

<p id="para1">So now we have an entire app for search specifically. 

<p id="para1">I do realize that most websites show a search bar on practically every page of the site. However, we will start this project 
by having a page specifically for search. It's then easy to implement it on multiple pages by just copying the search form to every other page. 

<p id="para1">So, since you've created an app, you have to go to the settings.py file and add the app to the INSTALLED_APPS list. 

<p id="para1">And since this app will render out a template, we need to add a template path, search/search.html

<p id="para1">Once this is done, we can now create multiple pages that are needed for this search functionality to be implemented.

<br/><br/>
<h3>urls.py File</h3>
<p id="para1">So the first thing is let's just create our url. 

<p id="para1">And it will be really basic. 

<p id="para1">In the urls.py file in the root project directory, we have the following code. 


<br/><br/>
<textarea cols="35" rows="20">
from django.conf.urls import url, include
from django.contrib import admin
from django.conf.urls.static import static
from django.conf import settings


urlpatterns = [
    url(r'^search/', include('search.urls', namespace='search')),
   
]

if settings.DEBUG:
    urlpatterns= urlpatterns + static(settings.MEDIA_URL, document_root= settings.MEDIA_ROOT)
    urlpatterns= urlpatterns + static(settings.STATIC_URL, document_root= settings.STATIC_ROOT)
</textarea>
<br/><br/>

<p id="para1">The above code is the code in the urls.py file in the project root directory. 

<p id="para1">Next we need to create the code for the urls.py file in the search app. This is shown below. 

<br/><br/>
<textarea cols="35" rows="10">
from django.conf.urls import url
from django.contrib import admin
from .views import (searchposts)

urlpatterns = [
     url(r'^$', searchposts, name='searchposts'),

]
</textarea>
<br/><br/>

<p id="para1">So basically we just want the search page to be created on the URL, http://localhost/search

<p id="para1">A user going to this page and typing in a search and pressing the submit button will trigger the 
searchposts function in the views.py file. 

<br/><br/>
<h3>models.py File</h3>
<p id="para1">We are going to be performing searches from the Post database. 

<p id="para1">Let's say we have a site of posts. Users can make all types of posts, such as in quora. 

<p id="para1">The posts that users publish are obviously stored in a database and this database is Post. 

<p id="para1">Just to show you the fields of the Post database, I show the entire model below in the models.py file. 





<br/><br/>
<textarea cols="35" rows="16">
class Post(models.Model):
    title= models.CharField(max_length=300)
    slug= models.SlugField(max_length=300, unique=True, blank=True)
    content= models.TextField()
    pub_date = models.DateTimeField(auto_now_add= True)
    last_edited= models.DateTimeField(auto_now= True)
    author= models.ForeignKey(User)
    likes= models.IntegerField(default=0)
    dislikes= models.IntegerField(default=0)


    def __str__(self):
        return self.title

</textarea>
<br/><br/>

<p id="para1">So you see we have the following fields: title, slug, content, pub_date, last_edited, author, likes and dislikes. 

<p id="para1">For this search, we are only going to search and return posts by the title and content fields. 

<br/><br/>
<h3>template file</h3>
<p id="para1">Next, we show the template file that contains the search form. 

<p id="para1">This is shown below. 



<br/><br/>
<textarea cols="35" rows="35">
&lt;h1>Search Page&lt;/h1>

&lt;br/>
&lt;form action="{% url 'search:searchposts' %}" method="GET" value="{{request.GET.q}}">
Search &lt;input type="text" name="q" value="{{request.GET.q}}" placeholder="Search posts"/>
&lt;input type="submit" name="submit" value="Search"/>
&lt;/form>


{% if submitbutton == 'Search' and request.GET.q != '' %}
{% if results %}
&lt;h1>Results for &lt;b>{{ request.GET.q }}&lt;/b>&lt;/h1>
&lt;br/>&lt;br/>

{% for result in results %}

{{result.title}}
&lt;br/>

{{result.content}}
&lt;br/>

{% endfor %}
{% else %}
No search results for this query
{% endif %}
{% endif %}
</textarea>
<br/><br/>



<p id="para1">So we have a search form whose attribute, action, is equal to {% url 'search:searchposts' %}

<p id="para1">We are using the dynamic URL to trigger the function-based view, searchposts.

<p id="para1">The method is "GET". You do not have to specify, method="GET", because the method is GET by default. However, just to 
be completely explicit, we do so. 

<p id="para1">Inside of the HTML form tags, we place in a search field. The field is of type, "text", because the user types in text. 
The name will have a value of "q". The value will be equal to, {{request.GET.q}}. This way, the query that the user enters into the 
field will be retained. We then just add a placeholder, which says, "Search posts"

<p id="para1">We then add a submit button with a name of "submit" and a value of "Search"

<p id="para1">We then close the form element. 

<p id="para1">When the page first loads, we don't want it to say, "No search queries found" because the user hasn't entered anything yet. 
When the page first loads, the script does not know whether the user has tried entering a query or not. To make it know, we can check 
to see whether the submit button was clicked. 

<p id="para1">If the submit button was clicked, it would be equal to the value of "Search"

<p id="para1">Another thing to consider is the fact that if a user presses the submit button without entering anything, in Django, all the 
rows of the database table are returned. This is not what we want. Therefore we want to make sure that this doesn't happen. So we create
an if statement, {% if submitbutton == 'Search' and request.GET.q != '' %}

<p id="para1">This checks to see that the submit button was, in fact, clicked and the field isn't empty. 

<p id="para1">If the submit button wasn't clicked or the field is empty, then the else conditional will be executed. 

<p id="para1">If the submit button is clicked and the field is not empty, then we check to see if any results are matched. If any results
are matched, then we output the title and content of the post. Else, we output, No search results for this query

<p id="para1">So this is the templates file. 

<br/><br/>
<h3>views.py File</h3>
<p id="para1">Lastly, we have the views.py file. 

<p id="para1">In the views.py file, we have the functionality behind the searches of our site. 

<p id="para1">Below is the content of the views.py file. 





<br/><br/>
<textarea cols="35" rows="30">
from django.shortcuts import render
from django.db.models import Q
from posts.models import Post

def searchposts(request):
    if request.method == 'GET':
        query= request.GET.get('q')

        submitbutton= request.GET.get('submit')

        if query is not None:
            lookups= Q(title__icontains=query) | Q(content__icontains=query)

            results= Post.objects.filter(lookups).distinct()

            context={'results': results,
                     'submitbutton': submitbutton}

            return render(request, 'search/search.html', context)

        else:
            return render(request, 'search/search.html')

    else:
        return render(request, 'search/search.html')
</textarea>

<br/><br/>


<p id="para1">So in our views.py file, we must import render, because we're rendering a template. 

<p id="para1">Since we are using Q objects in order to search multiple columns of the database table (the title and the content)< 
we must import Q. 

<p id="para1">We then must import our Post model from the posts app. This is the model we're going to be searching and returning 
results from. 

<p id="para1">We then create a function-based view, searchposts.

<p id="para1">If the request.method is a GET method, then we create
a variable, query, that gets the value from the search field. 

<p id="para1">We then get the value of the submit button. 

<p id="para1">If the query is not None, then we create a variable, 
lookups, and set it to,
Q(title__icontains=query) | Q(content__icontains=query)

<p id="para1">This checks to see if there is any title or content 
that contains the query that the user entered. 

<p id="para1">We then create a variable, results, that 
checks to see if there is any title or content 
that contains the query that the user entered. 

<p id="para1">When you have Q objects that are searching multiple 
columns of a database table, you should always use the distinct() 
function at the end of the results. This is because if you don't, 
you may get duplicates. This is because each Q object is treated
separately, so that if a title and content both contain the query, 
each can be returned (even though they're the same object). 

<p id="para1">We then pass the results and submitbutton into the 
context dictionary. 

<p id="para1">Else, we just return the search template file. 


<p id="para1">And this is how we can add search functionality to a website
in Django. 



<br><br><br>
<p id="para6">Related Resources</p>
<p id="para1">
	<a href="http://www.learningaboutelectronics.com/Articles/How-to-randomly-select-shuffle-list-in-Python.php">How to Randomly Select From or Shuffle a List in Python</a><br><br>

<br/> <br/>

<!-- begin htmlcommentbox.com -->
 


<div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>
 


<link rel="stylesheet" type="text/css" href="http://www.htmlcommentbox.com/static/skins/simple/skin.css" />
 


<script type="text/javascript" language="javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={ };} (function(){s=document.createElement("script");s.setAttribute("type","text/javascript");s.setAttribute("src", "http://www.htmlcommentbox.com/jread?page="+escape((window.hcb_user && hcb_user.PAGE)||(""+window.location)).replace("+","%2B")+"&mod=%241%24wq1rdBcg%24Sz4Jxvl/cDJ0gObHhdw9I1"+"&opts=478&num=10");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
 
<!-- end htmlcommentbox.com --><br/><br/>

<div style="float:left"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Mobile horizontal banner ad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-7591845391773873"
     data-ad-slot="5919600282"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>





<o:p></o:p></p>






 
 
 
 
 
	</div>
	<!-- end content -->
	
</div>
<!-- end page -->
<!-- start footer -->
﻿

<div id='footer'>
	<div class='fcenter'>
		<a href='http://www.learningaboutelectronics.com'>Home</a> | 
		<a href='http://www.learningaboutelectronics.com/Articles'>Articles</a> |
		<a href='http://www.learningaboutelectronics.com/Projects'>Projects</a> |
		<a href='http://www.learningaboutelectronics.com/Programming'>Programming</a> |
		<a href='http://www.learningaboutelectronics.com/Calculators'>Calculators</a> |
		<a href='http://www.learningaboutelectronics.com/Contact'>Contact</a>
</div><br/><br/>
<div align='center'>© 2018 All Rights Reserved</div>

<!-- end footer -->
</body>
<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'p3plcpnl0769'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script></html>
