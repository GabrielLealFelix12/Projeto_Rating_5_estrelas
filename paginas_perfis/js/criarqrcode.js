

function criarQrCode(){
	new QRCode(document.getElementById("qrcode"), window.location.href);
}


function sendValores(){
	var pfp = document.getElementById("pfp").getAttribute('pfp');
	var changevalue = document.getElementById("review_botao");
	changevalue.value = pfp;
}


document.getElementById("review_botao").addEventListener("click", sendValores);