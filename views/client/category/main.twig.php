{% extends 'partials/main.twig.php' %}
{% block title %}Categories{% endblock %}

{% block body %}
<div>
    <h1>Categories</h1>

    <div class="jumbutron fs-20">
        {% if categories == [] %}
        <p>Not exists any category</p>
        {% else %}
            <ul class="list-group list-group-flush">
                {% for category in categories %}
                <li class="list-group-item">
                    <a href="{{BASE}}category/see/{{category.slug}}">
                        {{category.name}}
                    </a>
                </li>
                {% endfor %}
            </ul>
        {% endif %}
</div>
{% endblock %}