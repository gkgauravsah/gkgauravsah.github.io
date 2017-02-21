<?php
/*
	$dsn = 'mysql:host=182.50.133.77:3306;dbname=gaaybhais_db_beta';
    $username ='gaaybhaisDBeta';
    $password ='gaaybhaisDB@123';
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);

    try{
        $con = new PDO($dsn,$username,$password,$options);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(Exception $ex){
                echo 'Not Connected'.$ex->getMessage();
        }
		*/
		
	$dsn = 'mysql:host=localhost;dbname=gaaybhais_db';
	$username ='root';
	$password ='';
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);


	try{
		$con = new PDO($dsn,$username,$password,$options);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		}
	catch(Exception $ex){
		echo 'Not Connected'.$ex->getMessage(); 
		}	
		
		
		?>