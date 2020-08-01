{% extends 'partials/main.twig.php' %}
{% block title %}Dashboard{% endblock %}

{% block body %}
<div>
    <h1>Dashboard</h1>
    <a href="#" class="btn btn-info">
        <div class="d-flex align-items-center">
            <i class="gg-layout-list d-inline-block mr-2"></i> 
            Categories
        </div>
    </a>
    <a href="#" class="btn btn-success">
        <div class="d-flex align-items-center">
            <i class="gg-stark d-inline-block mr-3"></i> 
            New book
        </div>
    </a>
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