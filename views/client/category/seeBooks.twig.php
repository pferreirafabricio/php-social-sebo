{% extends 'partials/main.twig.php' %}
{% block title %}{{category.name}}{% endblock %}

{% block body %}
<div>
    <h1>{{category.name}}</h1>
    {% if booksArray != [] %}
    {% for books in booksArray %}
        <div class="row my-3">
            {% for book in books %}
            <div class="col-12 col-md-4">
                <a 
                    href="{{BASE}}book/see/{{book.slug}}"
                    title="Click to know more about the book {{book.title}}"
                    aria-label="{{book.title}}"
                >
                    {% if (book.thumb != null and book.thumb != '') %}
                    <img 
                        class="card-img-top w-100" 
                        src="{{HOST}}/resources/thumbs/{{book.thumb}}" 
                        alt="Card image cap"
                    >
                    {% else %}
                    <div class="p-2">
                        <img 
                            class="card-img-top w-100" 
                            src="{{HOST}}assets/img/default-book-thumb.svg" 
                            alt="Card image cap"
                        >
                    </div>
                    {% endif %}
                    <p class="font-weight-bold text-center mt-2">{{book.title}}</p>
                </a>
            </div>
            {% endfor %}
        </div>
    {% endfor %}
    {% else %}
    <p>Any books with this category yet</p>
    {% endif %}
</div>
{% endblock %}