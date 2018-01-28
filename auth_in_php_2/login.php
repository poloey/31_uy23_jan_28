<?php 
session_start();
if (isset($_SESSION['user_id'])) {
  header('location: /');
}
$message = '';
if (
  isset($_POST['email']) &&
  isset($_POST['password'])
) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $con = new PDO('mysql:dbname=auth;host=localhost', 'root', '');
  $statement = $con->prepare('select * from users where email=:email');
  $statement->execute([
    ":email" => $email
  ]);
  $user = $statement->fetch(PDO::FETCH_OBJ);
  if (!$user) {
    $message = 'email not found in database';
  } else {
    if (password_verify($password, $user->password)) {
      $_SESSION['user_id'] = $user->id;
      header('location: /');
    }
  }
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
        <h2>Login</h2>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <div class="form-group">
            Don't have account yet? <a href="register.php" class="btn">Register here</a>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-outline-info">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>