
    <div class="a-container">
        <header>
            <div id="title-register" class="classname"><a href="<?php echo base_url().'index.php/register/';?>">Register</a></div>
        </header>
        <div class="form-entry">
            <?php echo form_open("index.php/login");?>
            <h1>Connect!</h1>
            <div class="form-group">
                <div class="error">
                    <?php echo validation_errors();?>
                </div>
                <div class="error">
                    <?php
                        if($login_error != NULL) {
                            echo $login_error;
                        }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="form-controls"><?php echo form_label("Username or Email address");?></div>
                <div class="form-controls"><?php echo form_input("email", isset($_POST['email'])? set_value('email', $_POST['email']): "");?></div>
            </div>
            <div class="form-group">
                <div class="form-controls"><?php echo form_label("Password");?></div>
                <div class="form-controls"><?php echo form_password("pin");?></div>
            </div>
            <div class="form-group">
                <div class="form-controls"><?php echo form_submit($data="", $content="Sign In");?></div>
            </div>
            <?php echo form_close();?>
            <div id="social" class="form-group">
                <h4><?php echo form_label('Or connect with');?></h4>
                <!-- FB starts -->
                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
                <div id="status"></div>
                <!-- End Fb -->
                <span id="signinButton">
                    <span
                      class="g-signin"
                      data-callback="signinCallback"
                      data-clientid="911530283990-jpqtbhg2kuf00k8s5606dgecn3l7ngin.apps.googleusercontent.com"
                      data-cookiepolicy="single_host_origin"
                      data-requestvisibleactions="http://schema.org/AddAction"
                      data-scope="https://www.googleapis.com/auth/plus.login">
                    </span>
                </span>
                
            </div>
        </div>
        