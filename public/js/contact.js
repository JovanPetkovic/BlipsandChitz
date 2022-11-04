var contactForm = document.querySelector("#contact");
var xmlHttp = new XMLHttpRequest();
var form = document.querySelector("#contact");
contactForm.addEventListener('submit', contactSend);

//Funkcija prevenira formu da posalje podatke odmah

function contactSend(event){
	event.preventDefault();
	if(xmlHttp==null){
		alert("Browser ne podrzava XMLHttpRequest");
		return;
	}

	//Pamtimo podatke iz forme uz pomoc atributa value

	var data = {
		name: contactForm.querySelectorAll("input")[0].value,
		email: contactForm.querySelectorAll("input")[1].value,
		text: contactForm.querySelector("textarea").value
	}

	//Proveravamo podatke koji se salju i dajemo odgovor ukoliko dodje do greske pri unosu
	//i prekidamo unos
	if(!checkData(data.name,data.email)){
		return;
	}
	

	//Pravimo url sa varijablama i backend skriptom koju pozivamo

	var str = 'name=' + data.name + '&email=' + data.email + '&text=' +
	data.text;

	//Otvaramo post zahtev i contact.php kod vrsi prenos parametra koji se nalaze u str
	//u bazu podataka

	xmlHttp.open('POST', 'contact?' + str);

	xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlHttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	xmlHttp.send();
}


xmlHttp.onreadystatechange = function(){
	if(xmlHttp.readyState === 4){
		contactForm.style.border = '3px solid yellow';
		if(xmlHttp.status ===200){
//Funckija za odgovor
			contactForm.style.border = '3px solid green';
		}
		else{
			contactForm.style.border = '3px solid red';
		}
	}

}

function checkEmail(email){
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if(email.match(emailRegex)){
		return true;
	}
	else{
		form.querySelector("#contact-email").insertAdjacentHTML("afterend", 
		"<p class='contact-error'>Your email is not in right format</p>");
		return false;
	}
}

function checkName(name){
	var nameRegex = /^[a-zA-Z ]{2,30}$/;
	console.log("RADI");
	if(name.match(nameRegex)){
		return true;
	}
	else{
		form.querySelector("#contact-name").insertAdjacentHTML("afterend", 
		"<p class='contact-error'>You are using a fakename :P, type another name :D</p>");
		return false;
	}

}

function checkData(name,email){
	if(!checkEmail(email)){
		checkName(name);
		return false;	
	}
	else{
		if(!checkName(name)){
			return false;
		}
	}
	return true;
}