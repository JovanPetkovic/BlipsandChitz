var contentForm = document.querySelector("#addnew");
var xmlHttp = new XMLHttpRequest();

setTimeout(domVarSetup, 500);


function contentSend(e){
	e.preventDefault();
	contentCheck();
	if(xmlHttp==null){
		alert("Browser ne podrzava XMLHttpRequest");
		return;
	}

	//Memorisemo podatke koje treba poslati
	var formData = new FormData(document.querySelector("#addnew"));
	var cena = contentForm.querySelector("#content-cena").value;
	var file = contentForm.querySelector("#content-file").files[0];
	var kategorija = contentForm.querySelectorAll("select")[0].value;
	var tip = contentForm.querySelectorAll("select")[1].value;

	if(!formData.get('fcena')||formData.get('fimg')==null||!formData.get('kategorija')||!formData.get('tip')){
		console.log(formData.get('kategorija'));
		return;
	}

	formData.append('fsubmit', true);

	xmlHttp.open("POST", "/add", true);
	xmlHttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	xmlHttp.send(new FormData(document.querySelector("#addnew")));

}


function contentCheck(){
	var fileField = contentForm.querySelector("#content-file");
	var file = fileField.files[0];
	if(file.size>500000){
		alert("//Ubaci normalan odgovor// File is bigger than 500kb")
	}
}

function domVarSetup(){
	contentForm = document.querySelector("#addnew");
	contentForm.addEventListener('submit', contentSend);
}