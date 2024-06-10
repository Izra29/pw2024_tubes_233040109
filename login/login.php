<?php
require('../admin/functions.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = koneksi();
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $sql = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username' && password = '$password'");

    if (mysqli_num_rows($sql) > 0) {
        // Redirect to dashboard or home page
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location: ../admin/admin.php");
        exit;
    } else {
        echo "<script>alert('Invalid credentials. Please try again.')</script>";
      
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="login.php" />
    <title>Login</title>
  </head>
  <body>
    <div class="login-container">
      <h1>Login</h1>
      <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Username" required />
        <input type="text" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />

        <button type="submit">Login</button>
        <div class="register-link">
        </div>
      </form>
    </div>
  </body>
</html>
