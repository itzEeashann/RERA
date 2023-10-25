<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $_POST["password"];

    if($username == "" || $phone == "" || $email == "" || $role == "" || $password == ""){
    echo ("<script LANGUphone='JavaScript'> window.alert('Please fill out all the column!'); window.location.href='login.php#'; </script>");
    }else{
        $conn = mysqli_connect("localhost", "root", "", "ers");

    if(!$conn){
      die("Could not connect to database: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO account (username,phone,email,role,password) VALUES (?, ?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "sssss", $username, $phone, $email, $role, $password);

    if(mysqli_stmt_execute($stmt)){
      echo ("<script LANGUphone='JavaScript'> window.alert('Registered Sucessfully!'); window.location.href='login.php';</script>");
      } else {
        echo "Error registering: " . mysqli_stmt_error($stmt);
      }
  
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }
  }
?>
<form action="" method="POST">
  <div class="container">
    <h1>Register for an Account Here!</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" id="username" required>

    <label for="phone"><b>Phone</b></label>
    <input type="text" placeholder="Enter phone" name="phone" id="phone" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="email"><b>Role</b></label>
    <input type="text" placeholder="Enter role" name="role" id="role" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>