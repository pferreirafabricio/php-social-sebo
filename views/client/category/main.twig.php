{% extends 'partials/main.twig.php' %}
{% block title %}Categories{% endblock %}

{% block body %}
<div>
    <h1>Categories</h1>
    <a href="{{BASE}}category/new" class="btn btn-success">
        <div class="d-flex align-items-center">
            <i class="gg-stark d-inline-block mr-3"></i> 
            New category
        </div>
    </a>
    <a href="{{BASE}}category/list" class="btn btn-outline-info">
        <div class="d-flex align-items-center">
            <i class="gg-layout-list mr-3"></i>
            List categories
        </div>
    </a>
</div>
{% endblock %}