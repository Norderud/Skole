class Slot {
	constructor(x, y, maxSpin) {
		this.x = x;
		this.y = y;
		this.maxSpin = maxSpin;
		this.symbol = 1;
		this.teller = 0;
	}
	spin(){
		console.log(this.maxSpin);
		if(this.teller >= this.maxSpin){
			clearInterval(id);
		} else {
			this.symbol = randomSymbol();
			this.teller++;
		}
		console.log(this.teller);
	}
	static tegnSlot(slot){
		var img = new Image();
		switch(slot.symbol){
			case 1: img.src = 'spilleautomat/bilder/firkløver.png'; break;
			case 2: img.src = 'spilleautomat/bilder/hestesko.png'; break;
			case 3: img.src = 'spilleautomat/bilder/chip.png'; break;
			case 4: img.src = 'spilleautomat/bilder/ess.png'; break;
			case 5: img.src = 'spilleautomat/bilder/mynter.png'; break;
			case 6: img.src = 'spilleautomat/bilder/diamant.png'; break;
			case 7: img.src = 'spilleautomat/bilder/pengesekk.png';
		}
		img.onload = function(){
			c.drawImage(img, slot.x, slot.y, 170, 170);
		}
	}
}
var canvas = document.querySelector('canvas');
var c = canvas.getContext('2d');
c.imageSmoothingEnabled = false;
c.font = "30px Arial";

var id1;
var id2;
var id3;
var sum;

var slot1 = new Slot(20, 30, 10);
var slot2 = new Slot(215, 30, 20);
var slot3 = new Slot(400, 30, 30);
oppstart();

function oppstart(){
	c.clearRect(0, 0, canvas.width, canvas.height);
	Slot.tegnSlot(slot1);
	Slot.tegnSlot(slot2);
	Slot.tegnSlot(slot3);
}
function spill(){
	c.clearRect(0, 0, canvas.width, canvas.height);
	var radioknapper = document.getElementsByName('toggle');
	for (var i = 0, length = radioknapper.length; i < length; i++)
	{
		if (radioknapper[i].checked)
		{
			sum = radioknapper[i].value;
			break;
		}
	}
	animer();
}
function randomSymbol(){
	var random = Math.floor(Math.random()*100);
	var symbol;
	if(random < 30){
		symbol = 1;
	} else if (random < 51){
		symbol = 2;
	} else if( random < 67){
		symbol = 3;
	} else if ( random < 80){
		symbol = 4;
	} else if( random < 90){
		symbol = 5;
	} else if (random < 96){
		symbol = 6;
	} else {
		symbol = 7;
	}
	return symbol;
}
function animer(){
	id1 = setInterval(function(){
		slot1.spin();
	},200);
	id2 = setInterval(function(){
		slot2.spin();
	},200);
	id3 = setInterval(function(){
		slot3.spin();
	},200);

}
function resultat(){
	var gevinst = 0;
	var resultat = [slot1.symbol, slot2.symbol, slot3.symbol];
	if(slot1.symbol == slot2.symbol && slot1.symbol == slot3.symbol){
		gevinst = treLike(slot1.symbol);
	} else if( slot1.symbol == slot2.symbol){
		gevinst = toLike(slot1.symbol);
	} else if (slot3.symbol == 7) {
		gevinst = sum*2;
	}
	c.fillStyle = "black";
	c.fillText("Du vant s " + gevinst +"kr!", 20, 240);
}
function treLike(symbol){
	var x;
	switch(symbol){
		case 1: x = sum*3; break;
		case 2: x = sum*6; break; 
		case 3: x = sum*12; break; 
		case 4: x = sum*24; break; 
		case 5: x = sum*48; break; 
		case 6: x = sum*96; break; 
		case 7: x = sum*192; break;
	}
	return x;
}
function toLike(symbol){
	var x;
	switch(symbol){
		case 1: x = sum*1.5; break;
		case 2: x = sum*3; break; 
		case 3: x = sum*4; break; 
		case 4: x = sum*5; break; 
		case 5: x = sum*10; break; 
		case 6: x = sum*15; break; 
		case 7: x = sum*20; break;
	}
	return x;
}