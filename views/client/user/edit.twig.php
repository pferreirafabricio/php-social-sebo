{% extends 'partials/main.twig.php' %}

{% block title %}Login{% endblock %}

{% block styles %}
<link rel="stylesheet" href="{{BASE}}assets/css/login.css">
{% endblock %}

{% block body %}
  <div class="">
    <h1 class="display-3 mb-4">Edit user</h1>
    <form method="POST" action="{{BASE}}user/update" id="frmEdit">
        <fieldset> 
            <div class="form-group">
                <label class="form-control-label" for="name">
                    Name
                </label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name"
                    name="name"
                    placeholder="Ex: Brayan Jenkis"
                    required
                    autofocus
                >
                <span class="invalid-feedback"></span>
            </div>
        </fieldset>
        <fieldset>
            <div class="form-group">
                <label class="form-control-label" for="email">
                    Email address
                </label>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email"
                            name="email"
                            placeholder="youremail@domain.com"
                            required
                        >
                        <span class="invalid-feedback"></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="password">
                    Password
                </label>
                <div class="form-group">
                    <div class="input-group mb-3">
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

            <div class="form-group">
                <label class="form-control-label" for="confirmPassword">
                   Confirm Password
                </label>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input 
                            type="password" 
                            class="form-control" 
                            id="confirmPassword" 
                            name="confirmPassword" 
                            placeholder="*********"
                            required
                        >
                        <span class="invalid-feedback"></span>
                    </div>
                </div>
            </div>

            <div class="btn-actions">
                <div>
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input 
                                type="checkbox" 
                                class="custom-control-input" 
                                id="customCheck1" 
                                checked=""
                            >
                            <label class="custom-control-label" for="customCheck1">
                                I read and accept the 
                                <a class="orange-hover" href="#">use terms</a>. 
                            </label>
                        </div>
                    </div>
                </div>
                <a 
                    class="forgot-password no-text-decoration orange-hover" 
                    href="{{BASE}}login"
                >
                   I've had an account
                </a>
            </div>
        </fieldset>
    </form>
  </div>
{% endblock %}

{% block scripts %}
<script type="module" src="{{BASE}}assets/js/src/editUser.js"></script>
{% endblock %}