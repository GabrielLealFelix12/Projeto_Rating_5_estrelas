<?php
//comandos
session_start();


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
$_SESSION["loggedin"] = false;
}
session_destroy();
exit();

?>