
    <div class="a-container">
        <header>
            <div id="title-register" class="classname"> Sign In</div>
        </header>
        <div class="form-entry">
            
            <?php echo form_open(base_url().'index.php/register');?>
            <h1>Create account!</h1>
            <div class="error"><?php echo validation_errors();?></div>
            <div class="form-group">
                <div class="form-controls"><?php echo form_label("Enter a valid email address");?></div>
                <div class="form-controls"><?php echo form_input("email", "");?></div>
            </div>
            <div class="form-group">
            </div>
            <div class="form-group">
                <div class="form-controls"><?php echo form_submit($data="", $content="Sign Up");?></div>
            </div>
            <?php echo form_close();?>
        </div>
        