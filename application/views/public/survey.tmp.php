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
            <div ng-app="QuestionList">
                <div ng-controller="CtrlQuestion">
                    <form>
                        <div class="form-group">
                                <label>{{question}}</label><br />
                                <input type='text' name='value_input' class='form-control' id="value_input" />
                        </div>
                            <br />
                        <div class="form-group">
                            <div class="col-lg-4 text-left"><button class="btn btn-default">Previous</button></div>
                            <div class="col-lg-8 text-right">
                                <div class="col-lg-6"><button class="btn btn-warning" ng-click="saveok()">Save</button></div>
                                <div class="col-lg-6"><button class="btn btn-primary" ng-click="next()">Continue</button></div>
                            </div>
                        </div>
                               
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6"></div>
    </div>
    <!-- /.row -->
</div>
<?php include 'cjfksoft/public/includes/footer.php'; ?>


<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="<?=  base_url()?>cjfksoft/angularjs/js/angular.js"></script>
<script src="<?=  base_url()?>cjfksoft/angularjs/js/ui-bootstrap-tpls-0.11.2.js"></script>

<script>
  var base_url ="<?=  base_url()?>";
  var moduleapp = angular.module("QuestionList",['ui.bootstrap']);
  moduleapp.controller("CtrlQuestion", function($scope, $http){
      $scope.loadQuestion = function() {
          var httprequest = $http.post(
              base_url + "index.php/public/survey/question",
              JSON.stringify({question_id: <?= $this->session->userdata("question_id");?>})
          )
          .success(function(data, status) {
                //$scope.question = "";
                $scope.question = data[0]['label'];
                alert(<?= $this->session->userdata("question_id");?>);
          })
          .error(function(data, status) {
                $scope.data = data || "Data failled to load";
                $scope.status = status;
                alert("dsl");
          });
      };
      $scope.loadQuestion();
      $scope.next = function() {
          var addEvalution = $http.post(
              base_url + "index.php/public/survey/addEvaluation",
              JSON.stringify(
                      {
                  user_id : <?= $this->session->userdata("user_id");?>,
                  question_id: <?= $this->session->userdata("question_id");?>,
                  value_input: "fj"
                      })
            )
            .success(function(data, status){
                $scope.loadQuestion();
            })
            .error(function(data, status){alert(status);});
      };
      //$scope.loadQuestion();
  });
</script>