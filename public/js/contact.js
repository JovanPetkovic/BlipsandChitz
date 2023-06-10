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

	var formData = new FormData(contactForm);
	if(!checkData(formData.get('name'), formData.get('email'))){
		output.querySelector("#fail").style.display = "block";
		return;
	}
	var output = document.querySelector("#output");
	formData.append('submitContact', 'true');

	xmlHttp.open('POST', '/BlipsandChitz/contact');

	xmlHttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	xmlHttp.send(formData);
	xmlHttp.onreadystatechange = function()
	{
		if(this.readyState !== 4) return;
		output.style.visibility = "visible";
		if(xmlHttp.readyState === XMLHttpRequest.DONE && xmlHttp.status === 200) {
			output.querySelector("#succ").style.display = "block";
		}
		else {
			output.querySelector("#fail").style.display = "block";
		}
		setTimeout(function(){
			output.style.visibility = "hidden";
			output.querySelector("#succ").style = "";
			output.querySelector("#fail").style = "";
		},1000);
	}
}

function checkEmail(email){
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if(email.match(emailRegex)){
		return true;
	}
	else{
		if(form.querySelector('.contact-error')===null) {
			form.querySelector("#contact-email").insertAdjacentHTML("afterend",
				"<p class='contact-error'>Your email is not in right format</p>");
		}
		return false;
	}
}

function checkName(name){
	var nameRegex = /^[a-zA-Z ]{2,30}$/;
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