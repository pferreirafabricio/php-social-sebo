{% extends 'partials/main.twig.php' %}
{% block title %}Home{% endblock %}

{% block body %}
<div>
    <h1>Home</h1>
    <hr />
    <h2>Last books</h2>
    {% if booksArray != [] %}
    {% for books in booksArray %}
        <div class="row my-3">
            {% for book in books %}
            <div class="col-12 col-md-4 text-center">
                <a 
                    href="{{BASE}}book/see/{{book.slug}}"
                    title="Click to know more about the book {{book.title}}"
                    aria-label="{{book.title}}"
                >
                    {% if (book.thumb != null and book.thumb != '') %}
                    <img 
                        class="img-fluid" 
                        src="{{HOST}}/resources/thumbs/{{book.thumb}}" 
                        alt="Book {{book.title}}"
                    >
                    {% else %}
                    <img 
                        class="img-fluid" 
                        src="{{HOST}}assets/img/default-book-thumb.jpg" 
                        alt="Book {{book.title}}"
                    >
                    {% endif %}
                    <p class="font-weight-bold mt-2 mb-0 fs-24">{{book.title}}</p>
                </a>
                <p>
                    Price: ${{book.price}}
                </p>
            </div>
            {% endfor %}
        </div>
    {% endfor %}
    {% else %}
    <p>Any books yet</p>
    {% endif %}
</div>
{% endblock %}