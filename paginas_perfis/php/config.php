<?php
$servidor = "yourserverhere";
$db = "yourdbhere";
$senha = "yourdbpasswordhere";
$login = "youruserhere";

$conexao = new mysqli ($servidor, $login,$senha, $db);
$conexao->set_charset('utf8mb4');

if ($conexao->connect_error) {
  die("Conexao falhou: " . $conexao->connect_error);
}
//echo "Conexao bem sucedida";

?>