<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location: login.php');
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h2>This is Home page <a href="logout.php" class="btn">Log out</a></h2>
      </div>
      <div class="card-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi illum illo ad nobis beatae quisquam tempore iusto quaerat autem voluptate deleniti facilis rem magnam itaque vero accusantium, esse ut ratione?</p>
      </div>
    </div>
  </div>
</body>
</html>