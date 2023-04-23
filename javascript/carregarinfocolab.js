var local = location.origin;
var caminho_cadcolab = "/Teste_Rating_5_stars/cadastrocolaborador.html";
var info_colab = "/Teste_Rating_5_stars/php/infocolab.php";
var tofill = sessionStorage.getItem('dados'); 

function ChecagemVariavel() {
if (tofill) {
  FillPage();
  return true;
}else{
window.location = local+caminho_cadcolab;
}
}



function FillPage() {
  
  var xhttp = new XMLHttpRequest();
  

  xhttp.onload = function() {
/*preencher dados da pagina com os dados recebidos da requisição AJAX*/
        //console.log(this.responseText);
        var info = this.responseText;
        let jsoninfo = JSON.parse(info);
        console.log(jsoninfo.Unidade);
        InputFill(jsoninfo);
       yikes = JSON.parse(info);

  }

xhttp.open("POST", local+info_colab);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("dados="+tofill);
}

function InputFill(json){

 var nome = document.querySelectorAll("input[name=Nome]");
 var cpf = document.querySelectorAll("input[name=CPF]");
 var rg = document.querySelectorAll("input[name=RG]");
 var dtnsc = document.querySelectorAll("input[name=Dat_nasc]");

 nome[0].value = json.Nome;
 cpf[0].value = json.CPF;
 rg[0].value = json.RG;
 dtnsc[0].value = json.Dat_nasc;

var options = document.getElementById("estasunidades").options;
for (var i = 0; i < options.length; i++) {
  if (options[i].text == json.Unidade) {
    options[i].selected = true;
    break;
  }
}


var pfp = document.getElementById("output");
var pathimg = 'imagens_perfil/' + json.Img;
pfp.setAttribute("src", pathimg);
//console.log(json.NOTA);
document.getElementById('nota').innerHTML = json.NOTA + ' ☆';

}


