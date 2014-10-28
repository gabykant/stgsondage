<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Sight Technology Group :: Admin Dashboard</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">  
  <!--<link rel="stylesheet" href="cjfksoft/admin/css/jquery-ui.theme.css">-->
  
  <!--<link rel="stylesheet" href="cjfksoft/angularjs/css/ngDialog.css">-->
  <link rel="stylesheet" href="<?=  base_url()?>cjfksoft/admin/css/templatemo_main.css">
</head>
<body>
    <script type="text/javascript">
        var base_url = "<?php echo base_url();?>"; 
    </script>
  <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>Welcome Admin dashboard</h1></div>
        <button type="button" class="navbaar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>
    <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
          <li>
            <form class="navbar-form">
              <select class="form-control">
                  <option val="0">Choose language</option>
                  <option val="fr">French</option>
                  <option val="en">English</option>
              </select>
            </form>
          </li>
          <li class="active"><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
          <li class="sub open">
              <a href="javascript:;">
                  <i class="fa fa-map-marker"></i>
                  Questionnaires
                  <div class="pull-right"><span class="caret"></span></div>
              </a>
              <ul class="templatemo-submenu">
                  <li><a href="<?= base_url()?>index.php/admin/questionnaire">Add questionnaire</a></li>
                  <li><a href="<?= base_url()?>index.php/admin/questionnaire/view_questionnaire">View questionnaires</a></li>
              </ul>
          </li>
          <li>
              <a href="<?=  base_url()?>index.php/admin/users">
                  <i class="fa fa-users"></i>
                  <span class="badge pull-right">NEW</span>
                  Manage Users
              </a>
          </li>
          <li><a href="preferences.html"><i class="fa fa-cog"></i>Preferences</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div><!--/.navbar-collapse -->
