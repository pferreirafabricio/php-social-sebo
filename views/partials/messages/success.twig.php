{% extends 'partials/main.twig.php' %}

{% block title %}Success{% endblock %}

{% block body %}
<div class="jumbotron">
    <div class="text-center">
        <img
            class=""
            src="{{BASE}}assets/img/success.svg" 
            alt="Image for represent success"
            height="200px"
        >
        <h1 class="display-4 text-success font-weight-bold my-4">
            Success! &#x1F389;
        </h1>
        <h2>{{ title }}</h2>
        
        <a 
            class="btn btn-primary btn-lg text-white mt-5"
            href="{{BASE}}{{redirectTo}}"
        >
            <i class="gg-home d-inline-block mr-2"></i> Back
        </a>
    </div>
</div>
{% endblock %}