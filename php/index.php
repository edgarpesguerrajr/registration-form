<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link rel="stylesheet" href="../css/index.css">
</head>
<body>
  <div class="container">
    <h1>Welcome <span class="highlight"><?php echo $row["name"]; ?></span>! Your email is <span class="highlight"> <?php echo $row["email"]; ?></span></h1>
    <a href="logout.php">LOGOUT</a>
  </div>
</body>
</html>