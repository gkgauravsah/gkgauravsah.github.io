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
<html class="no-js" lang="en" xml:lang="en">
    <!-- Include head -->
    <?php include 'include/head.php';?>
    <body data-ng-controller="mainController">
        <?php include 'include/header.php';?>

        <main clss="main">
            <div class="container home">
                <div class="row" ng-controller="validForm">
                    <div class="col-md-12">
                        <div class="adRegBox">
                            <h1 class="page-header">Profile</h1>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="glyphicon glyphicon-bookmark"></i> Update Password
                                </div>

                                <div class="panel-body">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="oldPassword" class="col-sm-2 control-label">
                                                Old Password<span class="redStar">*</span>
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="oldPassword" placeholder="Enter Password">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="newPassword" class="col-sm-2 control-label">
                                                New Password<span class="redStar">*</span>
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="newPassword" placeholder="Enter Password">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="confirmPassword" class="col-sm-2 control-label">
                                                Confirm Password<span class="redStar">*</span>
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="confirmPassword" placeholder="Enter Password">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">

                                                <input type="submit" class="btn btn-primary" name="reset" value="Reset">
                                                <input type="submit" class="btn btn-primary" name="update" value="Update">


                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>




                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="glyphicon glyphicon-bookmark"></i> Update Profile
                            </div>

                            <div class="panel-body">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="userName" class="col-sm-2 control-label">
                                            User Name<span class="redStar">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="userName" placeholder="Enter Name">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="userPassword" class="col-sm-2 control-label">
                                            Password<span class="redStar">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="userPassword" placeholder="Enter Password">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="userEmail" class="col-sm-2 control-label">
                                            Email<span class="redStar">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="userEmail" placeholder="Enter Email">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="userPhone" class="col-sm-2 control-label">
                                            Phone<span class="redStar">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="userPhone" placeholder="Enter Phone">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">

                                            <input type="submit" class="btn btn-primary" name="reset" value="Reset">
                                            <input type="submit" class="btn btn-primary" name="update" value="Update">


                                        </div>
                                    </div>
                                </form>
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
