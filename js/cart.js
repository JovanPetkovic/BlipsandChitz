var xmlHttp = new XMLHttpRequest();
var clearBtn = document.querySelector("#clear");

clearBtn.addEventListener('click', clearCart);

function clearCart(){
	if(xmlHttp==null){
		alert("Browser ne podrzava XMLHttpRequest");
		return;
	}

	var str = 'clear=true';
	xmlHttp.open('POST', '../cartFunctionality.php?' + str);
	xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlHttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	xmlHttp.send();
	setTimeout(location.reload(), 1000);
}