<?php
require 'config.php';
$nome = $_POST["Nome"];
$endereco = $_POST["Endereco"];
$cod_uni = $_POST["Cod-unidade"];

$cad_unidade = "INSERT INTO unidade (NOME, ENDERECO, COD) VALUES ('$nome', '$endereco','$cod_uni')";

if ($conexao->query($cad_unidade)){
	echo "<script type='application/javascript'>
                alert('Dados cadastrados com sucesso;');
                var local = location.origin;
                var caminho_unidade = '/Teste_Rating_5_stars/cadastrounidade.html';
                window.location = local+caminho_unidade;
                </script>!";
}
else{
	echo "Erro: ".$conexao->error;
}

?>