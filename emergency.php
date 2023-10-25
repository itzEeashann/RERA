<?php
include_once 'db.php';
if(isset($_POST['submit']))
{	 
	$username = $_POST['username'];
    $phone = $_POST['phone'];
    $emergency = $_POST['emergency'];

	 $sql = "INSERT INTO emergency (username,phone,emergency)
	 VALUES ('$username','$phone','$emergency')";
	 if (mysqli_query($conn, $sql)) {
		echo ("<script LANGUAGE='JavaScript'> window.alert('Your emergency request has been sent sucessfully. Thank you!'); window.location.href='homeuser.php';</script>");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>