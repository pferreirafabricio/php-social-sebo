{% extends 'partials/main.twig.php' %}
{% block title %}Categories{% endblock %}

{% block body %}
<div>
    <h1>List categories</h1>

    <a href="{{BASE}}dashboard/" class="btn btn-outline-secondary mb-5 mt-3">
        <div class="d-flex align-items-center">
            <i class="gg-keyboard d-inline-block mr-3"></i> 
            Dashboard
        </div>
    </a>
    <a href="{{BASE}}category/new" class="btn btn-success mb-5 mt-3">
        <div class="d-flex align-items-center">
            <i class="gg-stark d-inline-block mr-3"></i> 
            New category
        </div>
    </a>

    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="fs-24">Category</th>
                    <th class="fs-24">Slug</th>
                    <th class="fs-24">Actions</th>
                </tr>
            </thead>
            {% if categories == [] %}
            <p>Not exists any category</p>
            {% else %}
            <tbody>
                {% for category in categories %}
                <tr>
                    <td class="p-2 pl-4 font-weight-bold">
                        {{category.name}}
                    </td>
                    <td>
                        {{category.slug}}
                    </td>
                    <td class="p-2">
                        <a href="{{BASE}}category/edit/{{category.id}}" class="btn btn-warning text-black-50">
                            <div class="d-flex align-items-center">
                                <i class="gg-edit-markup mr-2"></i>
                                Edit
                            </div>
                        </a>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
            {% endif %}
        </table>
    </div>
</div>
{% endblock %}