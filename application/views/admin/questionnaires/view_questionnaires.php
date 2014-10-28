<?php include 'cjfksoft/admin/includes/header.php'; ?>

<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <h1>All questionnaires</h1>
        <p>List of all the questionnaires.
            
        </p>

        <div class="row">
            <div class="col-md-6">
                
                <?php
                    if ($questions != NULL) {
                        foreach ($questions as $value) {
                            //$value['id'];
                        }
                    }
                ?>
            </div>
            <?php echo $link; ?>
        </div>
        
    </div>
</div>
      
<?php include 'cjfksoft/admin/includes/footer.php'; ?>