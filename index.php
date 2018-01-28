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
  <title>Home page</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h1>This is home page <a class="btn" href="logout.php">Logout</a></h1>
      </div>
      <div class="card-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, voluptatum velit repudiandae alias temporibus accusantium asperiores explicabo non id, incidunt exercitationem aperiam, similique! Illum aperiam expedita accusamus vero harum, laboriosam.</p>
      </div>
    </div>
  </div>
</body>
</html>