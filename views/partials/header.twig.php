<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary px-5">
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
            <div class="user-actions mr-5">
                <a class="text-danger dropdown-toggle d-flex align-items-center no-text-decoration">
                    <i class="gg-user d-inline-block mr-2"></i> {{userName}}
                </a>

                <div class="actions">
                    <a class="action-item no-text-decoration" href="{{BASE}}dashboard/">
                        <i class="gg-keyboard"></i> Dashboard
                    </a>
                    <a class="action-item no-text-decoration" href="{{BASE}}login/edit">
                        <i class="gg-edit-markup"></i> Edit
                    </a>
                    <a class="action-item no-text-decoration" href="{{BASE}}login/logout">
                        <i class="gg-arrow-left-o"></i> Logout
                    </a>
                </div>
            </div>
            {% endif %}
        </div>
    </nav>
</header>