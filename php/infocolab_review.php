<?php 
$dados = $_POST['dados'];
$obj = json_decode($dados); 
//echo $obj->cpf;
require 'config.php';

$requisicao = "SELECT PFP FROM colaborador WHERE CPF='$obj->cpf'";
$resultado = $conexao->query($requisicao);

if ($resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()){
  	$prof = $row["PFP"];
  	}
}
//echo $prof;
$reviews = "SELECT COMENTARIO FROM reviews WHERE USERPFP='$prof'";
/*
mudar linha acima de modo que consulte os comentários dos envolvidos;
*/
$media = $conexao->query($reviews);

if ($media->num_rows > 0) {
    while($linha = $media->fetch_assoc()){
     echo ("<h2>".$linha["COMENTARIO"]."</h2><br>");
    }
}


?>