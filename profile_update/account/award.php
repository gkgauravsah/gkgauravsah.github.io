<?php

//session check start
$welcome_Message = '';
session_start();
if($_SESSION['sid']==session_id())
{
    $welcome_Message = 'Welcome User' ;
}
else
{
    header("location:login.php");
}
//session check end

?>
<!DOCTYPE html>
<html class="no-js" lang="en" xml:lang="en" data-ng-app="gbApp">
    <!-- Include head -->
    <?php include 'include/head.php';?>
    <body data-ng-controller="mainController">
        <?php include 'include/header.php';?>

        <main clss="main">
            <div class="container home">
                <div class="row">
                    <div class="col-md-12">
                        <div class="adRegBox">
                            <h1 class="page-header">Volunteer Award</h1>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="glyphicon glyphicon-bookmark"></i> Search Volunteer Data
                                </div>
                                <div class="panel-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="monthName" class="col-sm-2 control-label">Month Number<span class="redStar">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="monthName" placeholder="Enter Month Number">

                                            </div>
                                            <div class="col-md-7">
                                                <button type="button" class="btn btn-primary" title="Search" id="getResultButton" data-ng-click="getResultData()">Search</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-sm-12">
                               <h4>Total Data: <strong id="totalDataCount"></strong></h4>

                            </div>

                            <div class="volunteerDataTable">

                                <table class="table table-bordered ">
                                    <tr>
                                        <td>
                                            <table class="table table-responsive">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th class="hidden-xs">Vhead</th>
                                                </tr>
                                                <tr data-ng-repeat="volunteer in volunteers">
                                                    <td data-ng-bind="volunteer.index"></td>
                                                    <td data-ng-bind="volunteer.fullName" ></td>
                                                    <td data-ng-bind="volunteer.phone"></td>
                                                    <td data-ng-bind="volunteer.oFindUsOption" class="hidden-xs"></td>
                                                </tr>
                                            </table>
                                        </td>

                                        <td>
                                            <table class="table" id="vDataBox">
                                                <tr>
                                                    <th>Direct</th>
                                                </tr>
                                            </table>
                                        </td>

                                        <td>
                                            <table class="table" id="vhDataBox">
                                                <tr>
                                                    <th><span class="hidden-xs">1st </span>Level</th>
                                                </tr>
                                            </table>
                                        </td>

                                        <td>
                                            <table class="table" id="vdTotalBox">
                                                <tr>
                                                    <th>Total</th>
                                                </tr>
                                            </table>
                                        </td>

                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            var gbApp = angular.module('gbApp', []);
            gbApp.controller('mainController', function($scope, $http) {

                var vList = [];
                var pList = [];
                var tempProduct_Date = [];
                var tempProduct_Phone = [];
                var vHeadList = [];
                var volunteerArray = [];
                var monthName;
                var totalDataCount = 0;

                $scope.getResultData = function() {

                    monthName = $('#monthName').val();
                    $("#getResultButton").attr("disabled", "disabled");

                    $http.get('../include/volunteerList.php', { cache: true}).then(function(response) {
                        $scope.volunteers = response.data;

                        angular.forEach($scope.volunteers, function(obj) {
                            vList.push(obj.phone);
                            vHeadList.push(obj.oFindUsOption);
                        });



                        $http.get('../include/productsList.php', { cache: true}).then(function(response) {
                            $scope.products = response.data;
                            angular.forEach($scope.products, function(obj) {
                                tempProduct_Date.push(obj.date);
                                tempProduct_Phone.push(obj.voPhone);

                            });



                            //add data accrding to month
                            for (var d = 0; d < tempProduct_Date.length; d++) {
                                if ((tempProduct_Date[d].split('/')[1]) == monthName) {
                                    pList.push(tempProduct_Phone[d]);

                                }
                            }





                            //function filter data
                            function VolunteerDataCount(volunteerlist, productlist, volunteerHead) {
                                for (var i = 0; i < volunteerlist.length; i++) {
                                    var productArray = [];
                                    for (var j = 0; j < productlist.length; j++) {
                                        if (volunteerlist[i] === productlist[j]) {
                                            productArray.push(productlist[j]);
                                        }
                                    }
                                    volunteerArray.push(productArray.length);
                                }



                                var newHTML = [];
                                var finalRData = [];

                                $.each(volunteerArray, function(index, value) {
                                    finalRData.push(value);
                                    newHTML.push('<tr><td>' + value + '</td></tr>');

                                });



                                for(var m=0; m < finalRData.length; m++){
                                    totalDataCount  = totalDataCount +  finalRData[m];
                                }

                                $('#totalDataCount').html(totalDataCount);
                                $("#vDataBox").append(newHTML.join(""));


                            }

                            VolunteerDataCount(vList, pList, vHeadList);

                        });

                    });


                } //end function getResultdata


            })
        </script>

        <?php include 'include/footer.php';?>
    </body>
</html>
