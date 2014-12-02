<?php include 'cjfksoft/public/includes/header.php'; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<style>
    .up{ height: 600px;}
    .ui-widget-header {
        border: 1px solid #aaaaaa;
        background: red;
        color: #222222;
        font-weight: bold;
    }
    .ui-progressbar .ui-progressbar-value {
        height: 110%;
    }
    .form-group ul li { display: inline-block; list-style: none;}
    .form-group ul li label { text-align: center;}
</style>
<div class="up">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                My Dashboard <small>survey</small>
            </h2>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> My survey status
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div>
                    <form method="POST">
                        <div class="form-group">
                                <label><?=$question?></label><br />
                        </div>
                        <div class="form-group text-center">
                            <ul>
                                <?php
                                    if(isset($listoption)) {
                                        foreach ($listoption as $list) {
                                            ?>
                                            <li>
                                                <label><?=$list['name'];?></label><br />
                                                <input type="radio" value="<?=$list['id'];?>" name="value_input" />
                                            </li>
                                <?php
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                            <br />
                        <div class="form-group">
                            <div class="col-lg-4 text-left"><button class="btn btn-default" name="btnquestion" value="previous">Previous</button></div>
                            <div class="col-lg-8 text-right">
                                <div class="col-lg-6"><button class="btn btn-warning" name="btnquestion" value="save">Save</button></div>
                                <div class="col-lg-6"><button class="btn btn-primary" name="btnquestion" value="next">Continue</button></div>
                            </div>
                        </div>
                               
                    </form>
            </div>
        </div>
        
    </div>
    <!-- /.row -->
</div>
<?php include 'cjfksoft/public/includes/footer.php'; ?>


<script src="//code.jquery.com/jquery-1.10.2.js"></script>