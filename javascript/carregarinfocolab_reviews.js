var local = location.origin;
var caminho_cadcolab = "/Teste_Rating_5_stars/cadastrocolaborador.html";
var info_colab = "/Teste_Rating_5_stars/php/infocolab_review.php";
var tofill_review = sessionStorage.getItem('dados'); 

function ChecagemVariavel_review() {
if (tofill_review) {
  FillPage_Review();
  return true;
}else{
window.location = local+caminho_cadcolab;
}
}

function FillPage_Review() {
  
  var xhttp = new XMLHttpRequest();
  

  xhttp.onload = function() {
/*preencher dados da pagina com os dados recebidos da requisição AJAX*/
        //console.log(this.responseText);
        var info = this.responseText;
        document.getElementById('comments').innerHTML = info;
        //console.log(info);
  }

xhttp.open("POST", local+info_colab);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("dados="+tofill);
}