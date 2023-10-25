<?php
	include('db.php'); 
	if (isset($_POST['submit'])){
		$id = $_POST['id'];
		$sql = "UPDATE emergency SET status='Help on the Way!' WHERE id = '$id'";
		$run = mysqli_query($conn,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Sent Sucessfully!');
					window.open('homeResponse.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Sent Unsucessfully!');
			</script>";
		}
	}
 ?>