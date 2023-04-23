<?php
require 'config.php';

/*
Este documento será dedicado a criação de uma requisição SQL que irá popular
uma resposta em formato JSON com todas as unidades cadastradas no banco de dados;
*/


$ListarUnidades = "SELECT * FROM unidade"; 
$resultado = $conexao->query($ListarUnidades);
$listadenomesunidades = array();

if ($resultado->num_rows > 0) {
  while($row = $resultado->fetch_assoc()){
  //echo "<p>".$row["NOME"]."</p>";  
    $listadenomesunidades[] = $row["NOME"];
  }
  
  }else{
  	echo "não há unidades cadastradas";
  }
echo json_encode($listadenomesunidades);
?>