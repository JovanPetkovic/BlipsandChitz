var contactForm = document.querySelector("#contact");
var xmlHttp = new XMLHttpRequest();

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

	//Pravimo url sa varijablama i backend skriptom koju pozivamo

	var str = 'name=' + data.name + '&email=' + data.email + '&text=' +
	data.text;

	xmlHttp.open('POST', 'contact.php?' + str);

	xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlHttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	xmlHttp.send();
}


xmlHttp.onreadystatechange = function(){
	if(xmlHttp.readyState === 4){
		contactForm.style.border = '3px solid yellow';
		if(xmlHttp.status ===200){
			contactForm.style.border = '3px solid green';
		}
		else{
			contactForm.style.border = '3px solid red';
		}
	}

}