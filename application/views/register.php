
    <div class="a-container">
        <header>
            <div id="title-register" class="classname"><a href="<?php echo base_url().'index.php/login/';?>">Sign In</a></div>
        </header>
        <div class="form-entry">
            
            <?php echo form_open( 'index.php/register');?>
            <h1>Create account!</h1>
            <div class="error"><?php echo validation_errors();?></div>
            <div class="error"><?php if($unique === FALSE): echo 'This Email address is not available'; endif;?></div>
            <div class="form-group">
                <div class="form-controls"><?php echo form_label("Enter a valid email address");?></div>
                <div class="form-controls"><?php echo form_input("email", "");?></div>
            </div>
            <div class="form-group">
                <div class="form-controls"><?php echo form_password("password", "");?></div>
            </div>
            <div class="form-group">
                <div class="form-controls"><?php echo form_submit($data="", $content="Sign Up");?></div>
            </div>
            <?php echo form_close();?>
        </div>
        