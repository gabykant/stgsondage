<?php include 'cjfksoft/admin/includes/header.php'; ?>

<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="index.php.html">Admin Panel</a></li>
            <li><a href="#">Manage Users</a></li>
            <li class="active">Tables</li>
        </ol>
        <h1>Manage Users</h1>
        <p>List of all registered users.</p>
          
        <div class="row">
            <div class="col-md-12">
                <table class="table table-condensed table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Last login</th>
                            <th>Email address</th>
                            <th>Banned</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table table-hover">
                <?php
                    if(is_null($users)) {echo '<tr><td>No data was found</td></tr>';}
                    else {
                        foreach ($users as $u) {
                            $ban = "<font style='color: green; font-weigth: bold'>TRUE</font>";
                            if($u["isbanned"]==0) $ban = "<font style='color: red; font-weigth: bold'>FALSE</font>";
                            $active = "<font style='color: green; font-weigth: bold'>TRUE</font>";
                            if($u["isactivated"]==0) $active = "<font style='color: red; font-weigth: bold'>FALSE</font>";
                            echo "<tr><td>". $u["last_login"]."</td>";
                            echo "<td>".$u["email"]."</td>";
                            echo "<td>".$ban."</td>";
                            echo "<td>".$active."</td>";
                            echo "<td>
                                <a href='".  base_url()."index.php/admin/users/profile/".$u['id']."' class='btn btn-primary'>Details</a>
                                </td></tr>";
                        }
                    }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

<?php include 'cjfksoft/admin/includes/footer.php'; ?>