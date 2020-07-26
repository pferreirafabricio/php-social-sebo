<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{% block title %}{% endblock %} | Social Sebo</title>
    <link href='https://css.gg/css' rel='stylesheet'>
    <link rel="stylesheet" href="{{BASE}}assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{BASE}}assets/css/main.css" />
    {% block styles %}{% endblock %}
    <link rel="shortcut icon" href="{{BASE}}/assets/img/logo.ico" type="image/x-icon">
</head>
<body>
    {% include 'partials/header.twig.php' %}

    <main class="container py-4">
        {% block body %}{% endblock %}
    </main>
    
    {% include 'partials/footer.twig.php' %}
    
    <script type="module" src="{{BASE}}assets/js/src/index.js"></script>
    {% block scripts %}{% endblock %}
</body>
</html>