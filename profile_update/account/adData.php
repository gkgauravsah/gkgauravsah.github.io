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
    header("location:login");
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
                            <h1 class="page-header">Ad Data</h1>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="glyphicon glyphicon-bookmark"></i> Search Advertisment Data
                                </div>
                                <div class="panel-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="monthName" class="col-sm-2 control-label">Enter Date<span class="redStar">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="monthName" placeholder="DD/MM/YYYY" data-ng-model="searchAdData">

                                            </div>
                                            <div class="col-md-7">
                                                <button type="button" class="btn btn-primary" title="Search" id="getAdResultButton" data-ng-click="getAdResultData()">Search</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="adDataTable table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>SN</th>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>District</th>
                                        <th>Block</th>
                                        <th>Grampanchyat</th>
                                        <th>VoName</th>
                                        <th>VoPhone</th>

                                    </tr>

                                    <tr data-ng-repeat="product in products | filter:searchAdData">
                                        <td data-ng-bind="product.index"></td>
                                        <td>
                                           <a data-ng-href="/en/#/productsDetails/{{product.id}}" title="View" target="_blank">{{product.id}}</a>
                                        </td>
                                        <td data-ng-bind="product.date"></td>
                                        <td data-ng-bind="product.name"></td>
                                        <td data-ng-bind="product.phone"></td>
                                        <td data-ng-bind="product.category"></td>
                                        <td data-ng-bind="product.title"></td>
                                        <td data-ng-bind="product.description"></td>
                                        <td data-ng-bind="product.price"></td>
                                        <td data-ng-bind="product.district"></td>
                                        <td data-ng-bind="product.block"></td>
                                        <td data-ng-bind="product.grampanchyat"></td>
                                        <td data-ng-bind="product.voName"></td>
                                        <td data-ng-bind="product.voPhone"></td>

                                    </tr>
                                </table>
                                <!--loading Start-->
                                <div class="loader"></div>
                                <!--loading End-->
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </main>



        <?php include 'include/footer.php';?>
    </body>
</html>
