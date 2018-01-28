<?php 
session_start();
if (isset($_SESSION['user_id'])) {
    header('location: /');
}
$message = '';
if (isset($_POST['name'])  &&  isset($_POST['email']) && isset($_POST['password']) ) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $con = new PDO('mysql:host=localhost;dbname=auth', 'root', '');
  $statement = $con->prepare("insert into users(name, email, password) values(:name, :email, :password)");
  $statement->execute([
    ":name" => $name,
    ":email" => $email,
    ":password" => $password,
  ]);
  $message = 'You have successfully register as a user';
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
  <div class="mt-5 container">
    <div class="card">
      <div class="card-header">
        <h2>Register here</h2>
      </div>
      <div class="card-body">
        <?php if(!empty($message)): ?>
          <div class="alert alert-success">
            <?= $message; ?>
          </div>
        <?php endif; ?>
        <form method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <div class="form-group">
            Already register? <a href="login.php">login here</a>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-outline-success">Register Now</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>