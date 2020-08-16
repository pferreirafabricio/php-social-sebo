{% extends 'partials/main.twig.php' %}
{% block title %}Dashboard{% endblock %}

{% block body %}
<div>
    <h1>Dashboard</h1>

    <div class="mb-2">
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
    </div>
    
    <div>
        {% if books == [] %}
        <p class="mt-4">Not exists any book</p>
        {% else %}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="fs-20">Title</th>
                    <th class="fs-20">Slug</th>
                    <th class="fs-20">Status</th>
                    <th class="fs-20">Category</th>
                    <th class="fs-20">Created At</th>
                    <th class="fs-20">Actions</th>
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
                        {{ book.status == 1 ? 'Active' : 'Hidden'  }}
                    </td>
                    <td>
                        {{book.category.name}}
                    </td>
                    <td>
                        {{book.createdAt | date(DATE_TIME)}}
                    </td>
                    <td class="p-2">
                        <a 
                            href="{{BASE}}book/edit/{{book.id}}" 
                            class="btn btn-warning text-black-50" 
                            title="Edit book"
                        >
                            <div class="d-flex align-items-center">
                                <i class="gg-edit-markup"></i>
                            </div>
                        </a>
                        <a 
                            href="{{BASE}}book/thumb/{{book.id}}" 
                            class="btn btn-info" 
                            title="Edit thumb"
                        >
                            <div class="d-flex align-items-center pl-1">
                                <i class="gg-image"></i>
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