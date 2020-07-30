{% extends 'partials/main.twig.php' %}

{% block body %}
<div class="jumbotron">
    <div class="text-center">
        <img
            class=""
            src="{{BASE}}assets/img/error.svg" 
            alt="Image for represent error"
            height="200px"
        >
        <h1 class="display-4 text-danger font-weight-bold my-4">
            Oopss! Error {{errorCode}}
        </h1>
        <h2>{{ title }}</h2>
        {% if errors != [] %}
        <div class="mb-5">
            {% for error in errors %}
                <p class="d-flex align-items-center justify-content-center"> 
                    <i class="gg-close d-inline-block text-danger mr-2"></i> 
                    {{ error }}
                </p>
            {% endfor %}
        </div>
        {% endif %}
        
        <a 
            class="btn btn-primary btn-lg text-white mt-5"
            href="{{BASE}}"
        >
            <i class="gg-home d-inline-block mr-2"></i> Back to home
        </a>
    </div>
</div>
{% endblock %}