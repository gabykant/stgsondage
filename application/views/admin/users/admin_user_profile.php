<?php include 'cjfksoft/admin/includes/header.php'; ?>

<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="index.php.html">Admin Panel</a></li>
            <li><a href="#">Manage Users</a></li>
            <li class="active">Tables</li>
        </ol>
        <h1>User profile</h1>
        <p>Give all details for a specific user.</p>
          
        <div class="row">
            <div class="col-md-12">
                <?php
                    if(is_null($user_info)) {}
                    else {    
                        foreach($user_info as $s) {
                            echo $s["gender"] ." ". $s["start_year"] ." ". $s["end_year"] ." ". $s["student_status"]. " TIME";
                        }
                    }
                ?>
                
            </div>
        </div>
        
    </div>
</div>

<?php include 'cjfksoft/admin/includes/footer.php'; ?>