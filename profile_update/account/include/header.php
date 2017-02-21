<?php
   
 
 include 'connection.php';
//session check start
//$welcome_Message = '';
session_start();
$user_check=$_SESSION['login_user'];

			$pdoQuery =$con->prepare("SELECT user_id FROM user_account where user_id='$user_check'");
			
            $pdoQuery->execute();
            $rows = $pdoQuery->fetch(PDO::FETCH_ASSOC);
			$login_session =$rows['user_id'];
			if(!isset($login_session)){
				header("location:login.php");
			}
			
			
/*if($_SESSION['sid']==session_id())
{
    $welcome_Message = 'Welcome User' ;
	//$user_check = $_SESSION['login_user'];
	//$login_session = $row['username'];
}
			else{
				header("location:login.php");
			} */
			
//session check end 

?>

<header class="header">
        <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed mobileMenu" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars" aria-hidden="true"></span>
          </button>

          <a class="navbar-brand mobile-logo" href="#/" title="gaybhais logo"><img src="../src/images/gb_small_logo_en.png" alt="gaybhais logo" class="img-responsive"/></a>

        </div>
        <div id="navbar" class="navbar-collapse collapse mobileMenuBox">
          <ul class="nav navbar-nav">
            <li class=""><a href="dashboard">Dashboard</a></li>
            <li><a href="advertisment">Advertisment</a></li>
            <li><a href="volunteer">Volunteer</a></li>
            <li><a href="award">Award</a></li>
            <li><a href="adData">AD Data</a></li>
            <li><a href="volunteerList">Volunteer List</a></li>


          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Hi <span><?php echo $login_session;?></span> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="profile">Update Profile</a></li>
                <li><a href="profile">Change Password</a></li>
                <li><a href="logout">Logout</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <div class="topSpace">&nbsp;</div>








