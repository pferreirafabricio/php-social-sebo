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
                src="{{HOST}}assets/img/default-book-thumb.jpg" 
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

            <input type="hidden" id="bookId" value="{{book.id}}">
            {% if userName != null %}
            <form class="mb-3" action="{{BASE}}comment/" method="POST" id="frmCommentBook">
                <label class="form-control-label font-weight-bold" for="comment">
                    Leave your comment about this book
                </label>
                <textarea 
                    class="form-control" 
                    id="comment"
                    name="comment"
                    rows="4"
                    maxlength="500"
                    onkeyup="countCharacters(this, 'count-characters', 500)"
                    placeholder="Type your comment about this book"
                ></textarea>
                <span class="invalid-feedback"></span>
                <div class="text-right">
                    <span id="count-characters" class="float-left mt-2">
                        500 characters available
                    </span>
                    <button id="btnComment" class="btn btn-primary mt-2 btn-sm" type="submit">
                        Comment
                    </button>
                </div>
            </form>
            {% endif %}
            <div id="bookComments">
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block scripts %}
<script src="{{BASE}}assets/js/min/comment.min.js"></script>
{% endblock %}