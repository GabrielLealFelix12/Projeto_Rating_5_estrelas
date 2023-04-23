<?php
// este script define o comportamento da pagina home.html
session_start();
$_SESSION["loggedin"] = false;

require 'config.php';

$usuario = $_POST["usuario"]; 
$senha = $_POST["senha"];
 
 $queril = "SELECT * FROM users WHERE usuario='$usuario'";
 $resultado = $conexao->query($queril);
 $linha = $resultado->fetch_array();
/*
$loc = "location:";
$redirect = $local."/Teste_Rating_5_stars/cadastrocolaborador.html";
$final = $loc.$redirect;
*/

if ($senha == $linha['senha'] && $usuario == $linha['usuario']) {
   $_SESSION["loggedin"] = true;
    

    echo "<script type='application/javascript'>
                var local = location.origin;
                var caminho_home = '/Teste_Rating_5_stars/cadastrocolaborador.html';
                window.location = local+caminho_home;
                </script>";
    
    }

else {
	echo "<script type='application/javascript'>
                alert('senha ou usuarios incorretos');
                var local = location.origin;
                var caminho_home = '/Teste_Rating_5_stars/login.html';
                window.location = local+caminho_home;
                </script>";
                $_SESSION["loggedin"] = false;
} 


?>

