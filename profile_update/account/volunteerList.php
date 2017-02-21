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
            <div class="container volunteer">
            <div class="row">
                <div class="col-md-12">
                    <div class="innerWrapper">

                        <h1 class="page-header">Volunteer</h1>

                        <!--loader start-->
                        <div class="loader"></div>
                        <!--loader end-->

                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12 volunteerItem" ng-repeat="vlist in vlists">
                                <img data-ng-src="{{vlist.profImage}}" alt="{{vlist.fullName}}" class="img-thumbnail">
                                <p class="img-caption">
                                    <span><i class="glyphicon glyphicon-tag"></i> {{vlist.index}}</span><br/>
                                    <span><i class="glyphicon glyphicon-user"></i> {{vlist.fullName}}</span><br/>
                                    <span><i class="glyphicon glyphicon-earphone"></i> {{vlist.phone}}</span><br/>
                                    <span><i class="glyphicon glyphicon-envelope"></i>
                                    {{vlist.eBlock}},
                                    {{vlist.eDistrict}},
                                    {{vlist.eState}}
                                    </span>
                                </p>
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
