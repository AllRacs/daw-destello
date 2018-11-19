<?php session_start();

$usu1 = "usu1@aaa";
$usu2 = "usu2@aaa";
$usu3 = "usu3@aaa";
$usu4 = "usu4@aaa";
$users = array($usu1,$usu2,$usu3,$usu4);
$pass1 = "a";
$pass2 = "aa";
$pass3 = "aaa";
$pass4 = "aaaa";
$passw = array($pass1, $pass2, $pass3, $pass4);

$flag_fin = false;
if(isset($_COOKIE["c_email"]) && isset($_COOKIE["c_pass"])){
    for ($i=0; $i < 4; $i++) {
        if($users[$i] == $_COOKIE["c_email"] && $passw[$i] == $_COOKIE["c_pass"]){
            $flag_fin = true;
            $_SESSION["user"] = $_COOKIE["c_email"];
            $_SESSION["pass"] = $_COOKIE["c_pass"];
            break;
        }
    }
}

if(!$flag_fin && isset($_COOKIE["c_email"]) && isset($_COOKIE["c_pass"]) && isset($_COOKIE["last_con"]) && isset($_COOKIE["style"])){
    setcookie("c_email", $_COOKIE["c_email"], time() - (86400 * 90), "/"); // 86400 = 1 day
    setcookie("c_pass", $_COOKIE["c_pass"], time() - (86400 * 90), "/"); // 86400 = 1 day
    setcookie("last_con", $_COOKIE["last_con"], time() - (86400 * 90), "/"); // 86400 = 1 day
    setcookie("style", $_COOKIE["style"], time() - (86400 * 90), "/"); // 86400 = 1 day
    //setcookie("flag_home", $_SESSION["flag_home"], time() - (86400 * 90), "/"); // 86400 = 1 day

    session_unset();
    session_destroy();
}

?>
