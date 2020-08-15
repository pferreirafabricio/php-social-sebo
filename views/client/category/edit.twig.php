{% extends 'partials/main.twig.php' %}
{% block title %}Edit Category{% endblock %}

{% block body %}
<div>
    <a href="{{BASE}}category" class="btn btn-success mb-5 mt-3">
        <div class="d-flex align-items-center">
            <i class="gg-arrow-left-o mr-3"></i>
            Back to categories
        </div>
    </a>

    <h1>
        Edit category 
        <span class="text-danger">{{category.name}}</span>
    </h1>

    <form method="POST" action="{{BASE}}category/update/{{category.id}}" id="frmRegisterCategory">
        <fieldset> 
            <div class="form-group">
                <label class="form-control-label" for="name">
                    Name
                </label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name"
                    name="name"
                    placeholder="Ex: Romantic Comedy"
                    value="{{category.name}}"
                    required
                    autofocus
                >
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="name">
                    Slug
                </label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="slug"
                    name="slug"
                    value="{{category.slug}}"
                    placeholder="Ex: romantic-comedy"
                    required
                >
                <span class="invalid-feedback"></span>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">
            Update category
        </button>
    </form>
</div>
{% endblock %}

{% block scripts %}
<script type="module" src="{{BASE}}assets/js/min/newCategory.min.js"></script>
{% endblock %}