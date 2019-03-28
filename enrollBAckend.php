<?php
/**
 * Created by PhpStorm.
 * User: moris
 * Date: 18/01/2019
 * Time: 12:15
 */

require 'config.php';
$id='';
$fname='';
$sname='';
$surname='';
$email='';
$contact='';
$password='';
$confirm='';
$gender='';

if (isset($_REQUEST['submit']) and $_SERVER['REQUEST_METHOD']=='post'){
	if (isset($_REQUEST['fname'],$_REQUEST['email'],$_REQUEST['password'],$_REQUEST['confirm'])){

		//session variable to hold variables
		$_SESSION['VALIDATE_ERR']='';
		/*
		$id=$_REQUEST['id'];
		sanitize($id,'number');
		$fname=$_REQUEST['fname'];
		sanitize($fname,'name');
		$surname=$_REQUEST['surname'];
		sanitize($surname,'name');
		*/
        if ( !empty( $_REQUEST['gender'] )) {
            $gender = $_REQUEST['gender'];
        }

		$username = $_REQUEST['fname'];
		sanitize($username, 'name');
		$email=$_REQUEST['email'];
		sanitize($email,$email);
		$contact=$_REQUEST['contact'];
		sanitize($contact,'number');
        $password = $_REQUEST['password'];
        sanitize($password,'password');
		$SHA1_password=sha1($_REQUEST['password']);
		$confirm=$_REQUEST['confirm'];
		sanitize($confirm,'confirm_password',$password);
		$sql='SELECT * FROM users WHERE email="'.$email.'"';
		$query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($query);
		if ($count>0) {
            $_SESSION['VALIDATE_ERR'] .= 'another user exists with the same email address';
        }
		else{
			$sql='INSERT INTO users(`username`,`email`,`mobile_number`,`password`,`signupDate`)
                  VALUES ("'.$username.'","'.$email.'","'.$contact.'","'.$SHA1_password.'","'.time().'")';
			$query=mysqli_query($conn,$sql);
			if (mysqli_error($conn)){
				include "errorLog.php";
			}
			else {
				$affected_rows = mysqli_affected_rows( $conn );
				if ( $affected_rows > 0 ) {
                    $id= mysqli_insert_id($conn);
					/*
                    if ( ! empty( $_REQUEST['sname'] ) ) {
						$sname = $_REQUEST['sname'];
						sanitize($sname,'name');
						mysqli_query( $conn, 'UPDATE users SET middleName="' . $sname . '" WHERE id="' . $id . '"' );
						if (mysqli_error($conn)){
							include "errorLog.php";
						}
					}
					*/
					if ( !empty( $_REQUEST['gender'] )) {
						$gender = $_REQUEST['gender'];
						mysqli_query( $conn, 'UPDATE users SET gender="' . $gender . '" WHERE id="' . $id . '"' );
						if (mysqli_error($conn)){
							include "errorLog.php";
						}
					}
                    $_SESSION['ENROLLED'] = 'You have been successfully enrolled to kcador.com';
					header( 'location:login' );
					echo 'click <a href="login">Here</a> to redirect if you are not automatically redirected';
					exit();
				} else {
					$_SESSION['error'] = 'There was an error while inserting records.Please try again';
					header( 'location:signUp' );
					echo 'click <a href="enroll">Here</a> to redirect if you are not automatically redirected';
					exit();
				}
			}
		}
	}
}

//sanitize inputs
function sanitize($input,$name,$password=''){
	$error=false;
	trim($input);
	stripslashes($input);
	if ($name == 'name'){
		if (!preg_match("/^[a-zA-Z\s]+$/",$input)){
			$_SESSION['VALIDATE_ERR'] .='Name should contain only letters<br>';
			$error=true;
		}

	}
	if ($name == 'email'){
		if (!filter_var($input,FILTER_VALIDATE_EMAIL)){
			$_SESSION['VALIDATE_ERR'] .= "Invalid email format<br>";
			$error=true;
		}
	}
/*	if ($name == 'number'){
		if (!filter_var($input,FILTER_VALIDATE_INT)){
			$_SESSION['VALIDATE_ERR'] .='contact is not a number<br>';
			$error=true;
		}
	}*/
	if ($name == 'password'){
	    $password =$input;
    }
	if ($name == 'confirm_password'){
	    if ($input != $password){
	        $_SESSION['VALIDATE_ERR'] = 'Password fields do not match';
        }
    }
	if ($error== true){
		header('location:enroll.php');
		echo 'redirecting...<br>if not redirected please click here';
		exit();
	}
}
