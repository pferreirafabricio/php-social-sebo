{% extends 'partials/main.twig.php' %}
{% block title %}Dashboard{% endblock %}

{% block body %}
<div>
    <h1>Dashboard</h1>
    <a href="#" class="btn btn-info">Categories</a>
    <a href="#" class="btn btn-success">New book</a>
    <a 
        href="{{BASE}}login/logout" 
        class="btn btn-danger"
        onclick="return confirm('Do you really want logout?');"
    >
        <span class="d-flex align-items-center">
            <i class="gg-arrow-left-o d-inline-block mr-2"></i>  
            Logout
        </span>
    </a>
</div>
{% endblock %}