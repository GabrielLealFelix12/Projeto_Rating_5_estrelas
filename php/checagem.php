<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo "logado";
} else {
  echo "not logado";
};
?>