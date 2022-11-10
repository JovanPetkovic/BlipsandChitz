var contentForm = document.querySelector(".update-add");
var xmlHttp = new XMLHttpRequest();
var formData;
setTimeout(domVarSetup, 500);


function contentSend(e){
	e.preventDefault();
	contentCheck();
	if(xmlHttp==null){
		alert("Browser ne podrzava XMLHttpRequest");
		return;
	}
	formData = new FormData(contentForm);
	console.log(contentForm);
	var cena = contentForm.querySelector("#content-cena").value;
	var file = contentForm.querySelector("#content-file").files[0];
	var kategorija = contentForm.querySelectorAll("select")[0].value;
	var tip = contentForm.querySelectorAll("select")[1].value;

	if(!formData.get('fcena')||formData.get('fimg')==null||!formData.get('kategorija')||!formData.get('tip')){
		console.log(formData.get('kategorija'));
		return;
	}

	if(contentForm.querySelectorAll("input[name=fsubmit]").length > 0)
	{
		formData.append('fsubmit', true);
		console.log("add");
	}
	else if (contentForm.querySelectorAll("input[name=update]").length > 0)
	{
		formData.append('update', true);
		console.log("update");
	}
	var output = document.querySelector("#output");
	xmlHttp.open("POST", "/BlipsandChitz/item", true);
	xmlHttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	xmlHttp.send(formData);
	xmlHttp.onreadystatechange = function()
	{
		if(this.readyState != 4) return;
		output.style.visibility = "visible";
		if(xmlHttp.readyState == XMLHttpRequest.DONE && xmlHttp.status == 200)
		{
			output.querySelector("#succ").style.display = "block";
			setTimeout(function(){
				window.location.href = "/BlipsandChitz/";
			},1000);
		}
		else
		{
			output.querySelector("#fail").style.display = "block";
			setTimeout(function(){
				window.location.href = "/BlipsandChitz/";
			},1000);
		}

	}

}



function contentCheck(){
	var fileField = contentForm.querySelector("#content-file");
	var file = fileField.files[0];
	if(file.size>500000){
		alert("//Ubaci normalan odgovor// File is bigger than 500kb")
	}
}

function domVarSetup(){
	contentForm = document.querySelector("form");
	contentForm.addEventListener('submit', contentSend);
}