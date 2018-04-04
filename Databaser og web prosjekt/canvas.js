class Slot {
	constructor(x, y) {
		this.x = x;
		this.y = y;
		this.symbol = 1;
	}
}
var canvas = document.querySelector('canvas');
var c = canvas.getContext('2d');
c.font = "30px Arial";

var teller;
var id;
var sum;

var slot1 = new Slot(20, 30);
var slot2 = new Slot(145, 30);
var slot3 = new Slot(270, 30);
tegnSlot(slot1);
tegnSlot(slot2);
tegnSlot(slot3);


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
	teller = 0;
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
	id = setInterval(spin, 150);

}
function spin(){
	if(teller == 10){
		clearInterval(id);
		resultat();
	} else {
		slot1.symbol = randomSymbol();
		slot2.symbol = randomSymbol();
		slot3.symbol = randomSymbol();
		tegnSlot(slot1);
		tegnSlot(slot2);
		tegnSlot(slot3);
		teller++;
	}
}
function tegnSlot(slot){
	var farge;
	switch(slot.symbol){
		case 1: farge = 'blue'; break;
		case 2: farge = 'purple'; break;
		case 3: farge = 'red'; break;
		case 4: farge = 'yellow'; break;
		case 5: farge = 'pink'; break;
		case 6: farge = 'green'; break;
		case 7: farge = 'orange';
	}
	c.fillStyle = farge;
	c.fillRect(slot.x, slot.y, 110, 130);
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
	c.fillText("Du vant " + gevinst +"kr!", 100, 200);
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