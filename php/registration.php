<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' or email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken');</script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('', '$name', '$username', '$email', '$password')";
      mysqli_query($conn,$query);
      echo
      "<script> alert('Registration Successful');</script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match');</script>";
    }
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="../css/registration.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
  <h2>Registration</h2>
  <form class="" action="" method="post" autocomplete="off" >
    <label for="name" >Name : </label>
    <input type="text" name="name" id="name" required value="" > <br>

    <label for="username">Username : </label>
    <input type="text" name="username" id="username" required value=""> <br>

    <label for="email">Email : </label>
    <input type="email" name="email" id="email" required value=""> <br>

    <div class="password-container">
      <label for="password">Password :</label>
      <input type="password" name="password" id="password" required value="">
      <span class="eye-icon" onclick="togglePasswordVisibility('password', 'eye-icon')">
        <i id="eye-icon" class="fas fa-eye fa-eye-slash"></i>
      </span>
    </div>

    <label for="confirmpassword">Confirm Password : </label>
    <div class="password-container">
      <input type="password" name="confirmpassword" id="confirmpassword" required value="">
      <span class="eye-icon" onclick="togglePasswordVisibility('confirmpassword', 'eye-icon-confirmpassword')">
        <i id="eye-icon-confirmpassword" class="fas fa-eye fa-eye-slash"></i>
      </span>
    </div>

    <button type="submit" name="submit" >REGISTER</button>
  </form>
  <br>
  <a href="login.php">Login</a>


  <script>
    function togglePasswordVisibility(inputId, iconId) {
      var passwordInput = document.getElementById(inputId);
      var eyeIcon = document.getElementById(iconId);

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
      }
    }
  </script>
</body>
</html>