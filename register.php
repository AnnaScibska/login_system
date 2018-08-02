<?php
//require_once ('db.php');
//require_once('User.php');

require_once 'Autoloader.php';
Autoloader::register();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $userPassword = $_POST["password"];

    $user = new \Entities\User();
    $user->userRegister($username, $email, $userPassword);
    header('Location: login.php');
    die;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>register</title>
</head>
<body>
<h1>register</h1>
<form method="post" action="register.php">
    <p>name<input type="text" name="username"></p>
    <p>email<input type="text" name="email"></p>
    <p>password <input type="password" name="password"></p>
    <p>repeat password <input type="password" name="password_r"></p>
    <p><input type="submit" value="Register" name="login"></p>

</form>

</body>
</html>