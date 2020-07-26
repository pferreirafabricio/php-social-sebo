<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{% block title %}{% endblock %} | Social Sebo</title>
    <link rel="stylesheet" href="{{BASE}}/assets/css/bootstrap.min.css" />
</head>
<body>
    {% include 'partials/header.twig.php' %}

    <main>
        {% block body %}{% endblock %}
    </main>
    
    {% include 'partials/footer.twig.php' %}
    {% block scripts %}{% endblock %}
</body>
</html>