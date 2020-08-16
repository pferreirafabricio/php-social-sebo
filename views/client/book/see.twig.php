{% extends 'partials/main.twig.php' %}
{% block title %}{{book.title}}{% endblock %}

{% block body %}
<div>
    <div class="row">
        <div class="col-12 col-md-3">
        {% if (book.thumb != null and book.thumb != '') %}
            <img 
                class="img-fluid" 
                src="{{HOST}}/resources/thumbs/{{book.thumb}}" 
                alt="Thumb of the book {{book.title}}"
                title="Thumb of the book {{book.title}}"
            >
            {% else %}
            <img 
                class="img-fluid" 
                src="{{HOST}}assets/img/default-book-thumb.svg" 
                alt="Thumb of the book {{book.title}}"
                title="Thumb of the book {{book.title}}"
            >
        {% endif %}
        <p class="font-weight-bold fs-24">
            Price: ${{book.price}}
        </p>
        </div>
        <div class="col-12 col-md-9">
            <h1>{{book.title}}</h1>
            <p>
                <span class="font-weight-bold">Published by: </span> {{book.user.name}}
                <br />
                <span class="font-weight-bold">Publish date: </span> {{book.createdAt | date(DATE_TIME)}}
            </p>

            <hr class="my-2" />

            <p>{{book.synopsis | raw}}</p>
            
            <hr class="my-2" />

            <h3>Comments</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Sit eum quae maxime asperiores earum blanditiis corrupti 
                assumenda, odit ut expedita qui provident! Consequatur 
                architecto excepturi nihil sit. Neque, laborum odio?
            </p>
        </div>
    </div>
</div>
{% endblock %}