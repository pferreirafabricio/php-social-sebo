{% extends 'partials/main.twig.php' %}
{% block title %}Dashboard{% endblock %}

{% block body %}
<div>
    <h1>Dashboard</h1>
    <a href="{{BASE}}category/list" class="btn btn-info">
        <div class="d-flex align-items-center">
            <i class="gg-layout-list d-inline-block mr-2"></i> 
            Categories
        </div>
    </a>
    <a href="{{BASE}}book/new" class="btn btn-success">
        <div class="d-flex align-items-center">
            <i class="gg-stark d-inline-block mr-3"></i> 
            New book
        </div>
    </a>
    <a 
        href="{{BASE}}login/logout" 
        class="btn btn-danger"
        onclick="return confirm('Do you really want logout?');"
    >
        <span class="d-flex align-items-center">
            <i class="gg-arrow-left-o d-inline-block mr-2"></i>  
            Logout
        </span>
    </a>
    
    <div>
    <div>
        {% if books == [] %}
        <p class="mt-4">Not exists any book</p>
        {% else %}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="fs-24">Title</th>
                    <th class="fs-24">Slug</th>
                    <th class="fs-24">Category</th>
                    <th class="fs-24">Created At</th>
                    <th class="fs-24">Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for book in books %}
                <tr>
                    <td class="p-2 pl-4 font-weight-bold">
                        {{book.title}}
                    </td>
                    <td>
                        <a 
                            class="text-info"
                            href="{{BASE}}book/see/{{book.slug}}"
                        >
                            {{book.slug}}
                        </a>
                    </td>
                    <td>
                        {{book.category.name}}
                    </td>
                    <td>
                        {{book.created_at}}
                    </td>
                    <td class="p-2">
                        <a href="{{BASE}}book/edit/{{book.id}}" class="btn btn-warning text-black-50">
                            <div class="d-flex align-items-center">
                                <i class="gg-edit-markup mr-2"></i>
                                Edit
                            </div>
                        </a>
                        <a href="{{BASE}}book/delete/{{book.id}}" class="btn btn-danger">
                            <div class="d-flex align-items-center">
                                <i class="gg-trash-empty mr-2"></i>
                                Remove
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
</div>
{% endblock %}