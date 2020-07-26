{% extends 'partials/main.twig.php' %}

{% block title %}Login{% endblock %}

{% block styles %}
<link rel="stylesheet" href="{{BASE}}assets/css/login.css">
{% endblock %}

{% block body %}
  <div class="">
    <h1 class="display-3 mb-4">Login</h1>
    <form method="POST" action="{{BASE}}login/auth" id="frmLogin">
        <fieldset>
            <div class="form-group">
                <label class="form-control-label" for="email">
                    Email address
                </label>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="gg-mail"></i>
                            </span>
                        </div>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email"
                            name="email"
                            placeholder="youremail@domain.com"
                            required
                        >
                        <span class="invalid-feedback">
                            We'll never share your email with anyone else.
                        </span>
                    </div>
                </div>
                
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="gg-keyhole"></i>
                            </span>
                        </div>
                        <input 
                            type="password" 
                            class="form-control" 
                            id="password" 
                            name="password" 
                            placeholder="*********"
                            required
                        >
                        <span class="invalid-feedback"></span>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary w-25">
                    Login
                </button>
                <a 
                    type="button" 
                    class="btn btn-outline-secondary" 
                    href="{{BASE}}/login/register"
                >
                    Register
                </a>
                <a 
                    class="float-right no-text-decoration orange-hover" 
                    href="{{BASE}}/login/forgot"
                >
                    Forgot my password
                </a>
            </div>
        </fieldset>
    </form>
  </div>
{% endblock %}

{% block scripts %}
<script src="{{BASE}}assets/js/src/login.js"></script>
{% endblock %}