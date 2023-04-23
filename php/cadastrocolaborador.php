<?php
require 'config.php';
$dtnascimento = $_POST["Dat_nasc"];
$rg = $_POST["RG"];
$cpf = $_POST["CPF"];
$nome = $_POST["Nome"];
$unidade = $_POST["unidades"];


$target_dir = $_SERVER['DOCUMENT_ROOT']."/Teste_Rating_5_stars/imagens_perfil/";
$target_dir2 = $_SERVER['DOCUMENT_ROOT']."/Teste_Rating_5_stars/paginas_perfis/imagens_perfil/";

// mudar $target_dir de acordo com necessidade;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$novo_nome_img = uniqid().".".$imageFileType;

$caminho_img_novo = $target_dir.$novo_nome_img;
$caminho_img_perfil = $target_dir2.$novo_nome_img;




$cad_colab = "INSERT INTO colaborador (NOME, CPF, RG,UNIDADE, NASC, PFP) VALUES ('$nome', '$cpf', '$rg','$unidade', '$dtnascimento', '$novo_nome_img')";

//$cad_pfp = "INSERT INTO colaborador (PFP) VALUES ('".basename($_FILES["fileToUpload"]["name"])."')";




if($imageFileType == 'png' || $imageFileType == 'jpeg'||$imageFileType == 'jpg' ){

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $caminho_img_novo)) {
  
  copy($caminho_img_novo, $caminho_img_perfil);
  
  if($conexao->query($cad_colab)){
    //echo "Arquivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " guardado com sucesso.";
     echo "<script type='application/javascript'>
                alert('Dados cadastrados com sucesso;');
                var local = location.origin;
                var caminho_home = '/Teste_Rating_5_stars/cadastrocolaborador.html';
                window.location = local+caminho_home;
                </script>";;
  }else{
     echo "Erro: ".$conexao->error;  
  }
    
  
  }
  else {
   echo "Houve um erro.";
    echo "Erro: ".$conexao->error;
  }


} 
else {
  echo "Esse arquivo não é permitido";
}







?>