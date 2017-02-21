<?php
        include 'connection.php';
        $error_Message = '';

        if(isset($_POST['submit']))
        {
            $user_id = $_POST['user_id'];
            $password = $_POST['password'];

            $pdoQuery =$con->prepare("SELECT * FROM user_account WHERE (user_id ='$user_id' OR user_name ='$user_id') AND password ='$password'");
            $pdoQuery->execute();
            $rows = $pdoQuery->fetch(PDO::FETCH_NUM);

            if($rows > 0){

                session_start();
                //$_SESSION['sid']=session_id();
				$_SESSION['login_user']=$user_id;
                header("location:dashboard.php");

                }else{

                    $error_Message = '<div class="alert alert-danger fade in alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
                                    <strong>Error!</strong> Enter the correct user ID and Password.</div>';
            }
        }
?>


<!DOCTYPE html>
<html  lang="en" xml:lang="en" >
    <!-- Include head -->
    <?php include 'include/head.php';?>


        <header class="container header">
            <div class="row">
                <div class="logo">
                    <a href="/hi/index.html" title="gaybhais logo">
                        <img src="../src/images/logo_gaybhais_english.png" alt="gaybhais logo" class="img-responsive">
                    </a>
                </div>
            </div>
        </header>

        <main clss="main">
        <div class="container aLogin">
            <div class="row">
                <div class="panel panel-default">
                  <div class="panel-heading">Login</div>
                  <div class="panel-body">
                    <form name="loginform" action="login.php" method="POST">

                        <div class="form-group">
                            <?php echo $error_Message; ?>
                        </div>

                          <div class="form-group">
                            <label for="user_name">User Name</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User Name" required >
                          </div>
                          <div class="form-group">
                            <label for="user_password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required >
                          </div>

                        <input type="submit"class="btn btn-primary" name="submit" value="Submit">
                        <br/><br/>
                        <div id="errorMsg">

                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>

        </main>

    <?php include 'include/footer.php';?>




    </body>
</html>
