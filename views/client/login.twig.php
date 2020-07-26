{% extends 'partials/main.twig.php' %}
{% block title %}Login{% endblock %}

{% block body %}
  <div class="">
    <h1 class="display-3 mb-4">Login</h1>
    <form>
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
                            class="form-control is-invalid" 
                            id="email"
                            name="email"
                            placeholder="youremail@domain.com"
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
                            class="form-control is-valid" 
                            id="password" 
                            name="password" 
                            placeholder="*********"
                        >
                        <span class="valid-feedback">
                            Success! You've done it.
                        </span>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary w-25">
                    Login
                </button>
                <a type="button" class="btn btn-outline-secondary" href="#">
                    Register
                </a>
                <a 
                    class="float-right no-text-decoration orange-hover" 
                    href="#"
                >
                    Forgot my password
                </a>
            </div>
        </fieldset>
    </form>
  </div>
{% endblock %}