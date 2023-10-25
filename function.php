<?php 
session_start();
 
$testconfig = mysqli_connect('localhost', 'root', '', 'ers');
 
$username = $_POST['username'];
$password = $_POST['password'];
 
 
$login = mysqli_query($testconfig,"select * from account where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	if($data['role']=="Response"){
 
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "Response";
		header("location:homeResponse.php");

	}elseif($data['role']=="user"){
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "user";
		header("location:homeuser.php");
	}
	else
	{
		
	echo ("<script LANGUAGE='JavaScript'> window.alert('Wrong Credential'); window.location.href='login.php';</script>");
	}	

}else{
	echo ("<script LANGUAGE='JavaScript'> window.alert('Wrong Credential'); window.location.href='login.php';</script>");
}
?>