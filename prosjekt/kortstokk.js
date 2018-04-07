
class Kortstokk {
	
	constructor() {
		this.kortstokk = [];
	}

	lagKortstokk() {

		let kort = (farge, tall) => {
			this.farge = farge;
			this.tall = tall;
			this.navn = farge + "-" + tall;

			return {navn:this.navn, farge:this.farge, tall:this.tall} 
		}

		let tall = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Knekt', 'Dame', 'Konge'];
		let farge = ['K', 'S', 'H', 'R'];

		for (let f = 0; f < farge.length; f++){
			for (let t = 0; t<tall.length; t++){
				this.kortstokk.push(kort(farge[f], tall[t]));
			}
		}

	}
	printKortstokk(){
		let print = "<h1>";
		for (let i=0; i<this.kortstokk.length; i++){
			print += "<p>" + this.kortstokk[i].navn + "</p>";
		}
		print += "</h1>";
  		document.getElementById("utdata").innerHTML = print;
	}
	stokk(){
		for (let i=0; i<this.kortstokk.length; i++){
			var rand = Math.floor(Math.random() * this.kortstokk.length);
			let temp = this.kortstokk[i];
			this.kortstokk[i] = this.kortstokk[rand];
			this.kortstokk[rand] = temp;
		}

	}
	
	deal() {
		var navn = this.kortstokk[0].navn;
		this.kortstokk.shift();
		return navn;
	}


}

/// KLASSE FOR SPILLER OG DEALER
class Spiller{
	constructor(){
		this.kort = [];
		this.poeng = 0;
	}

	sjekkPoeng(){
		let poeng = 0;
		var vinn = false;
		for (var i=0; i<this.kort.length; i++){
			var temp = this.kort[i].split("-")[1];
			if (temp == "Knekt" || temp == "Dame" || temp == "Konge"){
				poeng += 10;
			} else {
				poeng += parseInt(temp);
			}
		}
		return poeng;
	}
}

function init() {
	startSpill();
	
	//outprint
	//document.getElementById("utdata").innerHTML = tekst;

	//kortstokk.stokk();
	//kortstokk.printKortstokk();

}

//globale variabel
var kortstokk;
var spiller;
var dealer;
var slutt=false;

function startSpill(){
	slutt = false;
	//Instansierer spillere og kortstokk
	kortstokk = new Kortstokk();
	spiller = new Spiller();
	dealer = new Spiller();
	//Oppretter kortstokk
	kortstokk.lagKortstokk();
	kortstokk.stokk();
	//Oppretter spiller og dealer
	spiller.kort.push(kortstokk.deal(), kortstokk.deal());
	dealer.kort.push(kortstokk.deal(), kortstokk.deal());
	update();
}

//Trykk hit knapp - få et kort
function hit(){
	if (slutt != true){
		spiller.kort.push(kortstokk.deal());
		update();
		if (spiller.sjekkPoeng() > 21){
			tapte();
		}
	}
}

function stand() {
	if (slutt != true){
		slutt = true;
		dealeren();
	}
	if (dealer.sjekkPoeng() > 21){
		vinn();
	} else if (dealer.sjekkPoeng() < spiller.sjekkPoeng()){
		vinn();
	} else {
		tapte();
	}
}

//Dealers turn
function dealeren(){
	while (dealer.sjekkPoeng() < 17){
		dealer.kort.push(kortstokk.deal());
	}
	update();
}

//Oppdaterer spillet
function update(){
	/*var txt = "SPILLER:"
	for (var i=0; i<spiller.kort.length; i++){
		txt += "<p>" + spiller.kort[i] + "</p>";
	}
	txt += "<p> Poeng: " + spiller.sjekkPoeng() + "</p>";
	txt += "<p>DEALER:</p>";
	for (var x=0; x<dealer.kort.length; x++){
		txt += "<p>" + dealer.kort[x] + "</p>";
	}
	txt += "<p> Poeng: " + dealer.sjekkPoeng() + "</p>";
	document.getElementById("utdata").innerHTML = txt; */
	//SPILLER
	var txt = "<p>Spiller:<br>Poeng: " + spiller.sjekkPoeng() + "</p>";
	document.getElementById("utdata").innerHTML = txt;
	for (var i=0; i<spiller.kort.length; i++){
		var kortNavn = spiller.kort[i];
		var img = document.createElement("img");
		img.src = "Kort/" + kortNavn + ".png";
		img.height = "100";
		document.getElementById("utdata").appendChild(img);
	}
	//DEALER
	var txt1 = "<p>Dealer:<br>Poeng: " + dealer.sjekkPoeng() + "</p>";
	document.getElementById("dealerdata").innerHTML = txt1;
	for (var i=0; i<dealer.kort.length; i++){
		var kortNavn = dealer.kort[i];
		var img = document.createElement("img");
		img.src = "Kort/" + kortNavn + ".png";
		img.height = "100";
		document.getElementById("dealerdata").appendChild(img);
	}
}

function tapte(){
	slutt = true;
	alert('Du tapte');
}

function vinn(){
	slutt = true;
	alert('Du vant!');
}

document.addEventListener('DOMContentLoaded', init, false);