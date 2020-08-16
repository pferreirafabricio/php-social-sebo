{% extends 'partials/main.twig.php' %}
{% block title %}Thumb{% endblock %}

{% block body %}
<div>
    <h1>Update thumb</h1>

    <a href="{{BASE}}dashboard" class="btn btn-success mb-5 mt-3">
        <div class="d-flex align-items-center">
            <i class="gg-arrow-left-o mr-3"></i>
            Back to dashboard
        </div>
    </a>

    <form method="POST" action="{{BASE}}book/updateThumb/{{bookId}}" id="frmRegisterThumb" enctype="multipart/form-data">
        <fieldset>
            <div class="row">
                <div class="col-12 col-md-6">
                {% if (thumbPath != '' or thumbPath != null) %}
                <p class="font-weight-bold">Previous uploaded image</p>
                <img src="{{thumbPath}}" class="img-fluid" alt="Book's thumb">
                {% else %}
                <p>Any thumb was uploaded for this book yet!</p>
                {% endif %}
                </div>  
                <div class="form-group col-12 col-md-6">
                    <label class="form-control-label" for="thumb">
                        Thumb {{bookId}}
                    </label>
                    <input 
                        type="file" 
                        class="form-control-file" 
                        id="thumb"
                        name="thumb"
                        accept="'image/jpg,image/jpeg,image/png"
                    >
                    <span class="invalid-feedback"></span>
                </div>
            </div>
            
        </fieldset>
        <button type="submit" class="btn btn-primary mt-5">
            Update Thumb
        </button>
    </form>
</div>
{% endblock %}

{% block scripts %}
<script type="module" src="{{BASE}}assets/js/min/newThumb.min.js"></script>
{% endblock %}