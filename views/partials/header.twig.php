<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#" aria-label="Social Sebo's logo">
        <img
            height="40px"
            src="{{BASE}}assets/img/logo.png" 
            alt="Social Sebo's logo"
        >
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" wfd-invisible="true">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{BASE}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{BASE}}about/">About us</a>
            </li>
        </ul>
        {% if userName == null %}
            <div>
                <a class="btn btn-outline-danger" href="{{BASE}}login/">
                    Log In
                </a>
            </div>
        {% else %}
            <div>
                <a class="text-danger" href="{{BASE}}dashboard/">
                    {{userName}}
                </a>
                <!-- <i class="gg-arrow-left-o "></i> -->
            </div>
        {% endif %}
    </div>
    </nav>
</header>