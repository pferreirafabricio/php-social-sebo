{% extends 'partials/main.twig.php' %}
{% block title %}Categories{% endblock %}

{% block body %}
<div>
    <h1>List categories</h1>

    <a href="{{BASE}}category/new" class="btn btn-success mb-5 mt-3">
        <div class="d-flex align-items-center">
            <i class="gg-stark d-inline-block mr-3"></i> 
            New category
        </div>
    </a>

    <div class="overflow-auto">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>?</th>
                </tr>
            </thead>
            <tbody>
                <tr class="d-flex align-items-center justify-content-between">
                    <td>
                        Horror
                    </td>
                    <td>
                        <a href="{{BASE}}category/edit" class="btn btn-warning text-black-50">
                            <div class="d-flex align-items-center">
                                <i class="gg-edit-markup mr-2"></i>
                                Edit
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger">
                            <div class="d-flex align-items-center">
                                <i class="gg-trash-empty mr-2"></i>
                                Remove
                            </div>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
{% endblock %}