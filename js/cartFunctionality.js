var xmlHttp = new XMLHttpRequest();
var items = document.querySelectorAll(".buyBtn");
items.forEach( function(element, index) {
	element.addEventListener('click', addToCart);
	console.log(element);
});

//Funkcija prevenira formu da posalje podatke odmah

function addToCart(event){
	event.preventDefault();
	if(xmlHttp==null){
		alert("Browser ne podrzava XMLHttpRequest");
		return;
	}

	var itemDom = this.parentNode;

	var data = {
		id : itemDom.querySelector('#productID').getAttribute('value'),
		img : itemDom.querySelector('.slika').getAttribute('src'),
		cena : itemDom.querySelector('.cena').getAttribute('value')
	}
	
	var str = 'id=' + data.id + '&img=' + data.img + '&cena=' + data.cena;

	str = str.replace(/ /g, '');
	


	xmlHttp.open('POST', 'cartFunctionality.php?' + str);

	xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlHttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	xmlHttp.send();
}