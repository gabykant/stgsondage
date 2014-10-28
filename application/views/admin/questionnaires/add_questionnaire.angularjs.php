<?php include 'cjfksoft/admin/includes/header.php'; ?>

<style>
    .elt {width: 40%;}
    .elt2 {width: 20%;}
</style>
<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <h1>Questionnaires</h1>
        <p>Fill the form below to enter a new question in English and in French
            
        </p> 
          
        <div class="row">
            <div class="col-md-6">
                <?php echo form_open(base_url()."index.php/admin/dashboard/AddQuestionnaire");?>
                    <div class="form-group">
                        <div ng-app="CategoryModal">
                        <div ng-controller="CategoryCrtl">
                            <script type="text/ng-template" id="index.html">
                                <div class="modal-header">
                                    <h3 class="modal-title">Add a new category</h3>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="catInput" class="form-control" ng-model="gab" />
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" ng-click="ok()">Continue</button>
                                    <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
                                </div>
                            </script>
                        <?php
                            $select_list = array(
                                0 => ""
                            );
                            if($array == NULL) {
                                foreach ($array as $c) {
                                    $select_list[$c->id] = $select_list[$c->name];
                                }
                            }
                            //echo "<div ng-controller='getCategoryList'>";
                            echo form_dropdown("category", $select_list, $select_list[0], 'class=" elt" ');
                            //echo "</div>";
                            echo form_button(
                                    array(
                                        "class" => "btn btn-default elt2",
                                        "ng-click" => "open()",
                                        "content" => "Add category",
                                        "name" => ""
                                    ));
                        ?>
                        </div>
                    </div></div>
                    <div class="form-group">
                    <?= form_input(
                            array(
                                "name" =>"qfr", 
                                "placeholder" => "Votre question en francais",
                        "class" => "form-control"
                        )
                    );?>
                    </div>
                    <div class="form-group">
                    <?= form_input(
                            array(
                                "name" =>"qen", 
                                "placeholder" => "Your question in english",
                        "class" => "form-control"
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

<script src="<?=  base_url()?>cjfksoft/angularjs/js/angular.js"></script>
<script src="<?=  base_url()?>cjfksoft/angularjs/js/ui-bootstrap-tpls-0.11.2.js"></script>
<script>
    angular.module("CategoryModal", ['ui.bootstrap']);
    angular.module("CategoryModal").controller("CategoryCrtl", 
        function($scope, $modal, $log) {
            $scope.items = ["items1", "items2", "item3"];
            $scope.open = function(size) {
                var modalInstance = $modal.open({
                    templateUrl : "index.html",
                    controller: "ModalCategoryCrtl",
                    size: size,
                    resolve : {
                        items: function() {
                            return $scope.items;
                        }
                    }
                });

                modalInstance.result.then(function(selectedItem) {
                    $scope.selected = selectedItem;
                    }, function() {
                        $log.info('Modal dismiss at :' + new Date());
                    });
        };
    });
    
    angular.module("CategoryModal").controller("ModalCategoryCrtl", function($scope, $modalInstance, items){
        $scope.items = items;
        
        $scope.selected = {
            item: $scope.items[0]
        };
        $scope.getCategoryList = function ($scope, $http, $templatecache) {
            
            };
        $scope.ok = function($scope, $http, $templatecache) {
            $http({
                method: "POST",
                url: base_url + "index.php/admin/category/",
                cache: $templatecache,
                params: { categoryName: 2}
            })
            .success(function(data, status) {
                $scope.status = status;
                $scope.data = data;
                alert($scope.status);
            })
            .error(function(data, status) {
                $scope.data=data || "Data failled to load";
                $scope.status = status;
                alert("dsl");
            });
            $modalInstance.close($scope.selected.item);
        };
        $scope.cancel = function() {
            $modalInstance.dismiss('cancel');
        };
    });
    
    
</script>
