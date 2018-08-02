<?php
//require_once ('db.php');
//require_once('User.php');

require_once 'Autoloader.php';

Autoloader::register();

session_start();

function dd($var) {
    echo '<pre>';
    print_r ($var);
    echo '</pre>';
}
?>
<h1>Hello: <?php echo $_SESSION['user']->username; ?></h1>
<h3>Your ID is: <?php echo $_SESSION['user']->id; ?></h3>
<a href="logout.php">Logout</a>
<br/>
<?php //dd($_SESSION['user']);
