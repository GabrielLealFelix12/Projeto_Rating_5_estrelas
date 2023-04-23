const lista = document.getElementById("lista");
var local = location.origin;
var caminho_perfil = "/Teste_Rating_5_stars/paginaperfil.html";
var caminho_colab = "/Teste_Rating_5_stars/php/listacolaboradores.php";

function MostrarColaboradores() {
  const xhttp = new XMLHttpRequest();
  

  xhttp.onload = function() {
    
    var resposta = this.responseText;
    //alert(resposta);
    
    lista.innerHTML = resposta;

var table = document.getElementsByTagName("table")[0];
var tbody = table.getElementsByTagName("tbody")[0];
/*
headrow[0].onclick = function(){
    return false;
}; 
*/
tbody.onclick = function (e) {
    e = e || window.event;
    var data = [];
    var target = e.srcElement || e.target;
    while (target && target.nodeName !== "TR") {
        target = target.parentNode;
    }
    if (target) {
        var cells = target.getElementsByTagName("td");
        for (var i = 0; i < cells.length; i++) {
            data.push(cells[i].innerHTML);
        }

    }
    console.log(data);
    var dadosColab = {
      "nome":data[0],
      "cpf": data[1],
      "data de nascimento":data[2],
      "unidade": data[3]
    };
//console.log(dadosColab.nome);
sessionStorage.setItem('dados', JSON.stringify(dadosColab));


window.location = local+caminho_perfil;
};
    
 /*
  Gerar Tabela HTML aqui;
  tabela com dados e imagens do colaboradores; 
  Tudo dentro de uma div no proprio html;
 */

  
  };
  
  xhttp.open("POST", local+caminho_colab);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();
}

