<?php
session_start();
$user = $_SESSION["email"];
$user_login = "user";
$user_email = $user;
setcookie($user_login, $cookie_value, time() - 4800, "/"); // 86400 = 1 day
session_unset();
session_destroy();
header("Location: index.php");
 ?>
