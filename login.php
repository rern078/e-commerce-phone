<?php
$pageTitle = "Sign Up Account";
include('include/header.php');
?>

<main>
    <section class="w-100">
        <div class="form-body">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="register-login">
                            <div class="authentication  d-flex justify-content-between">
                                <a href="sign_up" class="signup-acc">SIGN UP </a>
                                <a href="login" class="login-acc">LOGIN</a>
                            </div>
                        </div>
                        <h3>Login Account</h3>
                        <p>Fill in the data below.</p>
                        <form id="loginForm">

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="account_name" placeholder="Full Name">
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                        <div id="message"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    $(document).ready(function() {
        $('#loginForm').submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'login_ajax.php',
                data: $(this).serialize(),
                success: function(response) {
                    $('#message').html(response);
                }
            });
        });
    });
</script>

<?php
include('include/footer.php')
?>