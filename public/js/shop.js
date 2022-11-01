function filterButton(){
	this.btn = document.querySelector("#filter-btn");
	this.filterScreen = document.querySelector("#select");
	console.log(this.filterScreen);
	this.clicked = true;
	this.btn.addEventListener('click', filterClick.bind(this));
}

function filterClick(){
	console.log(this.clicked);
	if(this.clicked){
		this.filterScreen.style.opacity = 1;
		this.clicked=false;
	}
	else{
		this.filterScreen.style.opacity = 0;
		this.clicked=true;
	}
}

filterButton();