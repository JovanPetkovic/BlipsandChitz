class Home{

	constructor(){
		this.ball = document.querySelector("#ball");
		this.shown = false;
		this.pass = false;
		this.linkForm = document.querySelector("#our-picks").children[0];
		this.xmlHttp = new XMLHttpRequest();
		this.checkScroll();
		this.scrollEvent();
		this.intervalCheck();
	}

	intervalCheck(){ // proverava da li je proslo 350 visinu i
		var self = this; // aktivira f-ju scrollEvent koja pomera loptu
		setInterval(function()
		{
			if(window.scrollY>=350)
			{
				self.pass = true;
			}
			else
			{
				self.pass = false;
			}
			self.scrollEvent();
		}
			,100);
	}

	checkScroll(){
		
		
	}

	scrollEvent()
	{
		if(this.shown)
		{
			if(!this.pass)
			{
				this.ball.style.transform = 'translate(0,0)';
				this.shown=false;
			}
		}
		else
		{
			if(this.pass)
			{
				this.shown=true;
				this.ball.style.transform = 'translate(0,220px)';
			}
		}
	}
}

var home = new Home();