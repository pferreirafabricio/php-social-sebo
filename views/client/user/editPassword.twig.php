{% extends 'partials/main.twig.php' %}

{% block title %}Login{% endblock %}

{% block styles %}
<link rel="stylesheet" href="{{BASE}}assets/css/login.css">
{% endblock %}

{% block body %}
<div>
<h1 class="display-4 mb-4">Edit your password</h1>
<form method="POST" action="{{BASE}}user/updatePassword" id="frmPasswordEdit">
    <fieldset>
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
                    >
                    <span class="invalid-feedback"></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-control-label" for="password">
                Confirm password
            </label>
            <div class="form-group">
                <div class="input-group mb-3">
                    <input 
                        type="password" 
                        class="form-control" 
                        id="confirmPasswod" 
                        name="confirmPasswod"
                        placeholder="*********"
                    >
                    <span class="invalid-feedback"></span>
                </div>
            </div>
        </div>

        <div class="btn-actions">
            <div>
                <button type="submit" class="btn btn-primary">
                    Save password
                </button>
            </div>
        </div>
    </fieldset>
</form>
</div>
{% endblock %}

{% block scripts %}
<script type="module" src="{{BASE}}assets/js/src/editPassword.js"></script>
{% endblock %}