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
                        <h3>Register Account</h3>
                        <p>Fill in the data below.</p>
                        <form id="registerForm" method="POST">
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="account_name" placeholder="Full Name" onblur="detect_account_name(this.value);">
                                <div id="check_account_name" class="err_div"></div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                                <div id="check_password" class="err_div"></div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="password" name="repassword" placeholder="Confirm Password">
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail Address">
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="phone" placeholder="Call Phone">
                            </div>

                            <!-- <div class="col-md-12">
                                <select class="form-select mt-3" name="position">
                                    <option selected disabled value="">Position</option>
                                    <option value="jweb">Junior Web Developer</option>
                                    <option value="sweb">Senior Web Developer</option>
                                    <option value="pmanager">Project Manager</option>
                                    <option value="other">Other</option>
                                </select>
                            </div> -->

                            <!-- <div class="col-md-12 mt-3">
                                <label class="mb-3 mr-1" for="gender">Gender: </label>

                                <input type="radio" class="btn-check" name="gender" id="male">
                                <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                                <input type="radio" class="btn-check" name="gender" id="female">
                                <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                                <input type="radio" class="btn-check" name="gender" id="secret">
                                <label class="btn btn-sm btn-outline-secondary" for="secret">Secret</label>
                            </div> -->

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                            </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary" name="create">Register</button>
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
        $('#registerForm').submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'sign_ajax.php',
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