
var local = location.origin;
var caminho_unidades = "/Teste_Rating_5_stars/php/listaunidades.php";

function ListarUnidades() {
  const xhttp = new XMLHttpRequest();
  

  xhttp.onload = function() {
    console.log("teste");

    var resposta = this.responseText;
    var jotason = JSON.parse(this.responseText);
    //alert(resposta);
    
    console.log(jotason);
  
  var x = document.getElementById("estasunidades");
  
  for(var i = 0; i < jotason.length; i++){
  var option = document.createElement("option");
  var obj = jotason[i];
  option.text = obj;
  x.add(option);
  }
    

  
  };
  
  xhttp.open("POST", local+caminho_unidades);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();
}
/*
var thisbody = document.getElementsByTagName("body");
thisbody[0].addEventListener("load", ListarUnidades);
*/

	/*
função que realiza um requisição ajax, que retorna uma lista de todas as unidades presentes
no banco de dados. O texto será retornado em formato JSON, e esta resposta irá popular as opções
presentes no documento cadastrocolaborador.html;
	*/