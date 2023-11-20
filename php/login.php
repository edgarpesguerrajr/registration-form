<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' or email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row["password"]){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else
      echo
      "<script> alert('Wrong Password');</script>";
  }
  else{
    echo
    "<script> alert('User Not Registered');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    .password-container {
      position: relative;
    }

    .eye-icon {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h2>Login</h2>
  <form action="" method="post" autocomplete="off">
    <label for="usernameemail">Username or Email:</label>
    <input type="text" name="usernameemail" id="usernameemail" required value=""> <br>
    
    <div class="password-container">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required value="">
      <!-- Add the eye icon for password visibility toggle -->
      <span class="eye-icon" onclick="togglePasswordVisibility()">
        👁️
      </span>
    </div>
    <br>

    <button type="submit" name="submit">LOGIN</button>
  </form>
  <br>
  <a href="registration.php">Register</a>

  <script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById('password');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
      }
    }
  </script>
</body>
</html>
