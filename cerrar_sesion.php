<?php
session_start();
$user = $_SESSION["email"];
$user_login = "user";
$user_email = $user;
setcookie("c_email", $c_email, time() - (86400 * 90), "/"); // 86400 = 1 day
setcookie("c_pass", $c_pass, time() - (86400 * 90), "/"); // 86400 = 1 day
setcookie($last_con, $_SESSION["last_con"], time() - (86400 * 90), "/"); // 86400 = 1 day
setcookie("style", $_SESSION["style"], time() - (86400 * 90), "/"); // 86400 = 1 day

session_unset();
session_destroy();
header("Location: index.php");
 ?>
