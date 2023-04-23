/*
function loadDoc(){
console.log("pain");
}

*/
var local = location.origin;
var caminho_home = "/Teste_Rating_5_stars/login.html";
var caminho_saida = "/Teste_Rating_5_stars/php/sair.php";
var caminho_check = "/Teste_Rating_5_stars/php/checagem.php";

function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    
    var resposta = this.responseText;
    if (resposta === "logado"){
      return true;
    }else{
      window.location = local+caminho_home;    
    };

  };
  
  xhttp.open("POST", local+caminho_check);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();
}

function SaidaPage() {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log("Saindo...");
    }
  };
  xhttp.open("POST", local+caminho_saida);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();
}
