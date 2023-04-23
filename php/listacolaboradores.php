<?php
require 'config.php';
$query = "SELECT * FROM colaborador ORDER BY NOME";


?>



<?php
$result = $conexao->query($query);

if ($result->num_rows > 0) {
  
  echo(
"<table>
    <caption> Lista de colaboradores (clique em um para alterar seus dados)</caption>
  <tbody>"
  );
  
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
  	 echo "<td>".$row["NOME"]."</td>";
     echo "<td>".$row["CPF"]."</td>";
     echo "<td>".$row["NASC"]."</td>";
     echo "<td>".$row["UNIDADE"]."</td>";
     echo "<td> Foto: <img src='imagens_perfil/".$row["PFP"]."' style='max-width: 100%;max-height: 100%;'></td>";
  	echo "</tr>";

  }
  echo "</tbody>";
  echo "</table>";
}
  else{
  	echo "<p>Nenhum resultado encontrado</p>";
  }
?> 
