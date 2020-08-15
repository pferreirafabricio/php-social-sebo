{% extends 'partials/main.twig.php' %}
{% block title %}New Book{% endblock %}

{% block body %}
<div>
    <h1>New book</h1>

    <a href="{{BASE}}dashboard" class="btn btn-success mb-5 mt-3">
        <div class="d-flex align-items-center">
            <i class="gg-arrow-left-o mr-3"></i>
            Back to dashboard
        </div>
    </a>

    <form method="POST" action="{{BASE}}book/create" id="frmRegisterBook">
        <fieldset>
            <div class="row">
                <div class="form-group col-12">
                    <label class="form-control-label" for="title">
                        Title
                    </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="title"
                        name="title"
                        placeholder="Ex: Warrior Cats into the Wild"
                        required
                        autofocus
                    >
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group col-12">
                    <label class="form-control-label" for="slug">
                        Slug
                    </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="slug"
                        name="slug"
                        placeholder="Ex: warrior-cats-into-the-wild"
                        required
                    >
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group col-12">
                    <label class="form-control-label" for="synopsis">
                        Synopsis
                    </label>
                    <textarea  
                        id="synopsis"
                        name="synopsis"
                        required
                    >
                    </textarea>
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label class="form-control-label" for="status">
                        Status
                    </label>
                    <select 
                        class="form-control" 
                        id="status"
                        name="status"
                        required
                    >
                        <option value="0">Select a status...</option>
                        <option value="1">Active</option>
                        <option value="2">Hidden</option>
                    </select>
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label class="form-control-label" for="category">
                        Category
                    </label>
                    <select 
                        class="form-control" 
                        id="category"
                        name="category"
                        required
                    >
                        <option value="0">Select a category...</option>
                        {% for category in categories %}
                        <option value="{{category.id}}">{{category.name}}</option>
                        {% endfor %}
                    </select>
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label class="form-control-label" for="price">
                        Price
                    </label>
                    <input 
                        type="number"
                        min="0"
                        max="10000" 
                        class="form-control" 
                        id="price"
                        name="price"
                        placeholder="Ex: 20,00"
                        required
                    >
                    <span class="invalid-feedback"></span>
                </div>
            </div>
            
        </fieldset>
        <button type="submit" class="btn btn-primary">
            Create book
        </button>
    </form>
</div>
{% endblock %}

{% block scripts %}
<script type="module" src="{{BASE}}assets/js/min/newBook.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('synopsis');
</script>
{% endblock %}