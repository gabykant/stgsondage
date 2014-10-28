<?php include 'cjfksoft/admin/includes/header.php'; ?>

<style>
    .sep { margin-top: 50px;}
    .elt {width: 50%;}
    .elt2 {width: 20%;}
</style>
<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <h1>Manage category</h1>
          
        <div class="row">
            <div class="col-md-6">
                <form method="POST">
                    <fieldset>
                        <div class="form-group">
                            <input type="text" name="catInput" id="catInput" class="form-control elt" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add category" class="form-control elt2 btn btn-primary pull-right" />
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        
        <div class="row sep">
            <div class="col-md-6">
                <!-- List of categories -->
                <table class="table-responsive table-bordered">
                    <thead widh="100%"> 
                        <tr><td class="elt">Name</td><td class="elt">Action</td></tr>
                    </thead>
                    <!-- Script here -->
                    <?php
                        foreach ($categories as $category) {
                            echo "<tr><td>";
                            echo $category["name"];
                            echo "<td><a href='index.php/admin/category/delete/".$category["id"]."'>Delete</a></td></tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'cjfksoft/admin/includes/footer.php'; ?>
