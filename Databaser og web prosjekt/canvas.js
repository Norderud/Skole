class Slot {
	constructor(x, y) {
		this.x = x;
		this.y = y;
		this.symbol = 1;
	}
}
var canvas = document.querySelector('canvas');
var c = canvas.getContext('2d');


var slot1 = new Slot(20, 40);
var slot2 = new Slot(110, 40);
var slot3 = new Slot(200, 40);

tegnSlot(slot1);
	animer();

function spill(mynter){
	var resultat;
	slot1.symbol = randomSymbol();
	slot2.symbol = randomSymbol();
	slot3.symbol = randomSymbol();
	console.log();
	tegnSlot(slot1);
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
	setTimeout(function(){
	requestAnimationFrame(animer);
	spill(10);
	tegnSlot(slot1);
	console.log(slot1.symbol);
	}, 1000/5);

}
function tegnSlot(slot){
	console.log(slot.symbol);
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
	c.fillRect(slot.x, slot.y, 80, 70);

}