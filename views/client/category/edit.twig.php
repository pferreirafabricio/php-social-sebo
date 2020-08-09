{% extends 'partials/main.twig.php' %}
{% block title %}Edit Category{% endblock %}

{% block body %}
<div>
    <h1>Edit category</h1>

    <a href="{{BASE}}category" class="btn btn-success mb-5 mt-3">
        <div class="d-flex align-items-center">
            <i class="gg-arrow-left-o mr-3"></i>
            Back to categories
        </div>
    </a>
</div>
{% endblock %}

{% block scripts %}
<script type="module" src="{{BASE}}assets/js/min/newCategory.min.js"></script>
{% endblock %}