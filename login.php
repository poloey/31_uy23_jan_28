<?php 
session_start();
if (isset($_SESSION['user_id'])) {
    header('location: /');
}
$message = '';
if (isset($_POST['email']) && isset($_POST['password']) ) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $con = new PDO('mysql:host=localhost;dbname=auth', 'root', '');
  $statement = $con->prepare("select * from users where email=:email");
  $statement->execute([
    ":email" => $email,
  ]);
  $user = $statement->fetch(PDO::FETCH_OBJ); 
  if (!$user) {
    $message = 'Email not found in database';
  } else {
    if ($user->password === $password) {
      $_SESSION['user_id'] = $user->id;
      header('location: /');
    }else {
      $message = 'Login failed for wrong password';
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
  <div class="mt-5 container">
    <div class="card">
      <div class="card-header">
        <h2>Login here</h2>
      </div>
      <div class="card-body">
        <?php if(!empty($message)): ?>
          <div class="alert alert-success">
            <?= $message; ?>
          </div>
        <?php endif; ?>
        <form method="post">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <div class="form-group">
            Don't have account? <a href="register.php">register here</a>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-outline-success">Login Now</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>