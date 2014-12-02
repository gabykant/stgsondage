<?php include 'cjfksoft/admin/includes/header.php'; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<style>
    select.elt {width: 40%;}
    form-control.elt { width: 40%;}
    .elt2 {width: 30%;}
</style>
<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <h1>Questionnaires</h1>
        <p>Fill the form below to enter a new question in English and in French
            
        </p> 
          
        <?php if(isset($done)):?>
        <p class="bg-success">
             <?php echo "Save succefully";?>
        </p>
        <?php endif;?>
        <div class="row">
            <div class="col-md-6">
                <div id="AddCategory" title="Add new category">
                    <form>
                        <fieldset>
                            <input type="text" name="catInput" id="catInput" class="form-control" />
                        </fieldset>
                    </form>
                </div>
                <?php echo form_open("index.php/admin/questionnaire");?>
                    <div class="form-group">
                            
                        <?php
                            $select_list = array(
                                1 => "Choose a category"
                            );
                            if($categories != NULL) {
                                foreach ($categories as $key => $c) {
                                    $select_list[$c["id"]] = $c["name"];
                                }
                            }
                            echo form_dropdown("category", $select_list, $select_list[1], 'class="form-control elt" id="category-list"');
                            echo form_button(
                                    array(
                                        "class" => "btn btn-default elt2",
                                        "content" => "Add category",
                                        "name" => "",
                                        "onClick" => "javascript:document.location()",
                                        "id" => "add-category"
                                    ));
                        ?>
                    </div>
                    <div class="form-group">
                    <?= form_input(
                            array(
                                "name" =>"qfr", 
                                "placeholder" => "Votre question en francais",
                                "class" => "form-control",
                                "required" => TRUE
                        )
                    );?>
                    </div>
                    <div class="form-group">
                    <?= form_input(
                            array(
                                "name" =>"qen", 
                                "placeholder" => "Your question in english",
                                "class" => "form-control",
                                "required" => TRUE
                        )
                    );?>
                    </div>
                <div class="form-group">
                    <?= form_submit(
                            array(
                                "name" => "btn",
                                "value" => "Save",
                                "class" => "btn"
                            ));?>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
        
    </div>
</div>
      
<?php include 'cjfksoft/admin/includes/footer.php'; ?>

<script src="<?=  base_url()?>cjfksoft/admin/js/jquery.js"></script>
<script src="<?=  base_url()?>cjfksoft/admin/js/jquery-ui.js"></script>
<script type="text/javascript">
    $(function() {
        var dialog;
        
        function addCat() {
            $.post( 
                base_url + "index.php/admin/category/",
                {   inputCategory : $("#catInput").val() },
                function(result) {
                    var data = result;
                    if(data !== NULL) {
                        var i = 0;
                        for(i=0; i<data.lenght();i++){
                            $("#category-list").change();
                        }
                    }
                }
            );
        }
        
        dialog = $( "#AddCategory" ).dialog({
            autoOpen: false,
            height: 200,
            width: 350,
            modal: true,
            buttons: {
                "Save": addCat,
                Cancel: function() {
                    dialog.dialog( "close" );
                }
            },
            close: function() {
                form[ 0 ].reset();
                allFields.removeClass( "ui-state-error" );
            }
        });
        
        $( "#add-category" ).button().on( "click", function() {
            //dialog.dialog( "open" );
            window.location.href="category"
        });
    });
</script>