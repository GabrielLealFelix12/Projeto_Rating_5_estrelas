<?php 
$dados = $_POST['dados'];
$obj = json_decode($dados); 
//echo $obj->cpf;

require 'config.php';

$requisicao = "SELECT * FROM colaborador WHERE NOME='$obj->nome' AND CPF='$obj->cpf' AND UNIDADE= '$obj->unidade'";
$resultado = $conexao->query($requisicao);

if ($resultado->num_rows > 0) {
  while($row = $resultado->fetch_assoc()){
    
$dadosjson = array("Nome"=>$row["NOME"], "CPF"=>$row["CPF"],"RG"=>$row["RG"], "Dat_nasc"=>$row["NASC"],"Img"=>$row["PFP"], "Unidade"=>$row["UNIDADE"]);
$mepfp = $row["PFP"];
  
  }

$reviews = "SELECT AVG(ESTRELAS) FROM reviews WHERE USERPFP='$mepfp'";
$media = $conexao->query($reviews);

if ($media->num_rows > 0) {
    while($linha = $media->fetch_assoc()){
    $resultz =  $linha["AVG(ESTRELAS)"];
    }
}
 $dadosjson["NOTA"] = $resultz;
  $dadoscolab = json_encode($dadosjson);
  echo $dadoscolab;  
  }else{
  	echo "não há colaboradores cadastrados";
  }

?>