<head>
 <?php include('head_qrcode.php'); ?>
</head>


<?php 
require 'config.php';
//$dtnascimento = $_POST["Dat_nasc"];
//$rg = $_POST["RG"];
$cpf = $_POST["CPF"];
$nome = $_POST["Nome"];
$unidade = $_POST["unidades"];
$comando = $_POST["comando"];

$dir_imgperfilcriado = $_SERVER['DOCUMENT_ROOT']."/Teste_Rating_5_stars/paginas_perfis/imagens_perfil/";
$dir_imgperfiloriginal = $_SERVER['DOCUMENT_ROOT']."/Teste_Rating_5_stars/imagens_perfil/";
$dir_perfil = $_SERVER['DOCUMENT_ROOT']."/Teste_Rating_5_stars/paginas_perfis/";



//$img = $_POST["img"];


//$atual="UPDATE colaborador SET NOME='$nome', UNIDADE='$unidade' WHERE CPF='$cpf'";
//$delete="DELETE FROM colaborador WHERE CPF='$cpf'";

switch($comando){
	case "ATUALIZAR":
    UpdateQuery();
	break;
	
	case "DELETAR":
	DeleteQuery();
	break;

	case "CRIAR QR CODE":
	CreatePageQRCode();
	break;
 
 
 default:
 echo "<p>aconteceu um erro!</p>";

}





function UpdateQuery(){
global $nome, $conexao, $unidade, $cpf;

$atual="UPDATE colaborador SET NOME='$nome', UNIDADE='$unidade' WHERE CPF='$cpf'";

if($conexao->query($atual)){
echo "<script type='application/javascript'>
                alert('Dados atualizados com sucesso;');
                var local = location.origin;
                var caminho_home = '/Teste_Rating_5_stars/cadastrocolaborador.html';
                window.location = local+caminho_home;
                </script>";
}else{
	echo "Erro: ".$conexao->error;
}

}



function DeleteQuery(){
	global $cpf, $conexao, $dir_imgperfiloriginal, $dir_imgperfilcriado, $dir_perfil;
	
	$delete="DELETE FROM colaborador WHERE CPF='$cpf'";
	$delete_img="SELECT PFP FROM colaborador WHERE CPF='$cpf'";
    $html = '.html';

if ($resultado = $conexao->query($delete_img)){
	 while ($linha = $resultado->fetch_assoc()) {
         unlink($dir_imgperfiloriginal.$linha["PFP"]);
         unlink($dir_imgperfilcriado.$linha["PFP"]);
         $review_q = $linha["PFP"];


    }
}

unlink($dir_perfil.$review_q.$html);

$delreviewq = "DELETE FROM reviews WHERE USERPFP='$review_q'";
$conexao->query($delreviewq);

if($conexao->query($delete)){
echo "<script type='application/javascript'>
                alert('Dados deletados com sucesso;');
                var local = location.origin;
                var caminho_home = '/Teste_Rating_5_stars/cadastrocolaborador.html';
                window.location = local+caminho_home;
                </script>";
}else{
	echo "Erro: ".$conexao->error;
}

}

function CreatePageQRCode(){
	global $cpf, $unidade, $nome, $conexao, $dir_perfil;
	$consulta ="SELECT PFP FROM colaborador WHERE CPF='$cpf'";
$img_perfil = "imagens_perfil/";
	if ($resultado = $conexao->query($consulta)){
	 while ($linha = $resultado->fetch_assoc()) {
         $conteudo = '
         <!DOCTYPE html>
         <head>
         <meta charset="UTF-8">      
         <title> 5 star rating </title>
         </head>

         <body>

         <h1> Unidade:'.$unidade.' </h1>
         <img pfp='.$linha["PFP"].' id="pfp" class="imagem_perfil" src='.$img_perfil.$linha["PFP"].' alt="img_perfil"> <br>
         <h1> Nome:'.$nome.' </h1>

         <form id="cad-colab" action="php/review_deixada.php" method="post">

         <div class="rating">
 
         <input type="radio" name="rating" value=5 id="5"><label for="5">☆</label>
  
  
         <input type="radio" name="rating" value=4 id="4"><label for="4">☆</label>
  
  
         <input type="radio" name="rating" value=3 id="3"><label for="3">☆</label>
  
         <input type="radio" name="rating" value=2 id="2"><label for="2">☆</label>
  

         <input type="radio" name="rating" value=1 id="1"><label for="1">☆</label>


          </div>

          <br>


          <div class="comment">
          <br>
          <label for="review_empregado" style="text-align: center;">Deixe um comentário!</label>
          <br>
          </div>
          <div style="display: flex; justify-content: center;">
          <textarea id="review" name="review_empregado"
          rows="4" cols="50"></textarea>
          </div>
          </form>
           
           <input id="review_botao" form="cad-colab" type="submit" value="ENVIAR" name="pfp">

          
          <div id="qrcode">
          </div>
          
          </body>
          <link rel="stylesheet" href="css/estrelas.css">
          <script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js">
          </script>
          <script type="application/javascript" src="js/criarqrcode.js" onload="criarQrCode()">
          </script>
          

          </html>
         ';
         
         $arquivo = $dir_perfil.$linha["PFP"].'.html';
         $loc= "/Teste_Rating_5_stars/paginas_perfis/".$linha["PFP"].".html";

       }
    }

    $arquivo_pronto = fopen($arquivo, "w") or die("Unable to open file!");
    fwrite($arquivo_pronto, $conteudo);
    fclose($arquivo_pronto);

    echo "<script type='application/javascript'>
               
                var local = location.origin;
                var caminho_home= '$loc';
                window.location = local+caminho_home;
                </script>";

	/*função dedicada a criação do arquivo html o qual o qr code estará redirecionando
	o usuário para a avalição de atendimento*/
}

?>