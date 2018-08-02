<?php
//require_once ('db.php');
//

require_once 'Autoloader.php';

//require_once('User.php');

Autoloader::register();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $userPassword = $_POST["password"];

    $user = new \Entities\User();
    $user->userLogIn($email, $userPassword);
    if($user->username != "") {
        session_start();
        $_SESSION['user'] = $user;
        header("Location: index.php");
        die;
    } else {
        echo "nope";
    }
}

function dd($var) {
    echo '<pre>';
    print_r ($var);
    echo '</pre>';
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>login</title>
</head>
<body>
<h1>login</h1>
<form method="post" action="login.php">
    <p>email<input type="text" name="email"></p>
    <p>password <input type="password" name="password"></p>
    <p>
        <input type="submit" value="Login" name="login">
        <a href="register.php">Register</a>
    </p>

</form>

<br/>
<?php
//    if (isset($_SESSION)) {
//        dd($_SESSION['user']);
//    }
//?>

</body>
</html>
