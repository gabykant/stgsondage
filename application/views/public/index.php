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
        <div class="col-lg-6">
            <?php ?> % of your survey is complete.
            <div id="progressbar">
                
            </div>
        </div>
        <div class="col-lg-6"></div>
    </div>
    <!-- /.row -->
</div>
<?php include 'cjfksoft/public/includes/footer.php'; ?>


<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
  $(function() {
    $( "#progressbar" ).progressbar({
      value: <?=$percentage;?>
    });
  });
</script>