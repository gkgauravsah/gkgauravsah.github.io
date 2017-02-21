<?php
   
/* 
 include 'connection.php';
//session check start
//$welcome_Message = '';
session_start();
$user_check=$_SESSION['login_user'];

			$pdoQuery =$con->prepare("SELECT user_id FROM user_account where user_id='$user_check'");
			
            $pdoQuery->execute();
            $rows = $pdoQuery->fetch(PDO::FETCH_ASSOC);
			$login_session =$rows['user_id'];
			if(isset($login_session)){
				echo '<script type="text/javascript">alert("' . $login_session . '")</script>';
			}
			else{
				header("location:login.php");
			} */
//session check end 

?>


<!DOCTYPE html>
<html class="no-js" lang="en" xml:lang="en" data-ng-app="gbApp">
    <!-- Include head -->
    <?php include 'include/head.php';?>
    <body data-ng-controller="mainController">
        <?php include 'include/header.php';?>

        <main clss="main">
        <div class="container dashBoard">
            <div class="row">


                    <div class="innerBox">

                        <h1 class="page-header">Dashboard</h1>

                        <!--Notification Row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="glyphicon glyphicon-bullhorn icon-size-4"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">
                                                    <strong>{{ (products | filter:today).length }}</strong>
                                                </div>
                                                <div>New Add!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="adData">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="glyphicon glyphicon-menu-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="glyphicon glyphicon-floppy-disk icon-size-4"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">
                                                    <strong>{{ products.length }}</strong>
                                                </div>
                                                <div>Total Add!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="adData">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="glyphicon glyphicon-menu-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>


                        </div>

                        <!--dashboard content-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="glyphicon glyphicon-bookmark"></i> Today Summery
                            </div>
                            <div class="panel-body">
                                <div>

                                    <table class="table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th class="hidden-xs">Date</th>
                                                <th>Add ID</th>
                                                <th>Category</th>
                                                <th class="hidden-xs">Title</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-ng-repeat="product in products | filter:today">
                                                <td>{{$index+1}}</td>
                                                <td class="hidden-xs">{{product.date}}</td>
                                                <td>
                                                    <a data-ng-href="/en/#/productsDetails/{{product.id}}" title="View" target="_blank">{{product.id}}</a>
                                                </td>
                                                <td>{{product.category}}</td>
                                                <td class="hidden-xs">{{product.title}}</td>
                                                <td><a href="advertisment" title="Edit"><i class="glyphicon glyphicon-edit"></i></a></td>
                                                <td><a href="advertisment" title="delete"><i class="glyphicon glyphicon-remove"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!--loading Start-->
                                    <div class="loader"></div>
                                    <!--loading End-->

                                </div>

                            </div>
                        </div>
                    </div>

            </div>

        </div>
        </main>

    <?php include 'include/footer.php';?>
    </body>
</html>
