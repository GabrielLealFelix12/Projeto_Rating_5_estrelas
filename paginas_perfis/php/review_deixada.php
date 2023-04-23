<html !DOCTYPE>

<head>
<meta charset="UTF-8">      
<title> OBRIGADO! </title>
</head>

<?php
require 'config.php';
/*
$comment = $_POST['review_empregado'];
$estrela = $_POST['rating'];
*/
$pfp = $_POST['pfp'];

if(isset($_POST['rating'])){

    $estrela = $_POST['rating'];

}else{

    $estrela = 0;

}

if(isset($_POST['review_empregado'])){

    $comment = $_POST['review_empregado'];

}else{

    $comment = 'Nada a declarar.';

}


$cad_review = "INSERT INTO reviews (USERPFP, COMENTARIO, ESTRELAS) VALUES ('$pfp', '$comment','$estrela')";

if ($conexao->query($cad_review)){
	echo "<script type='application/javascript'>
                alert('Review cadastrada com sucesso. Vamos agora redirecionar você a outro site;');
                var local = 'https://www.google.com/';
                window.location = local;
                </script>";
}
else{
	echo "Erro: ".$conexao->error;
}

?>