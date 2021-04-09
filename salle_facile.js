var btn = document.querySelector('button');

function SalleFinie() {

	btn.addEventListener('click', event => {

		var x = document.getElementById('cadenas');
		var v = x.getAttribute("src");
		if(v == "Salle/cadenas.png")
			v = "SalleFinie/cadenasOuvert.png";
		x.setAttribute("src", v);

		var x = document.getElementById('bonhomme');
		var v = x.getAttribute("src");
		if(v == "Salle/bonhomme.png")
			v = "SalleFinie/BonhommeContent.png";
		x.setAttribute("src", v);

		var x = document.getElementById('porte');
		var v = x.getAttribute("src");
		if(v == "Salle/porte.png")
			v = "SalleFinie/portail.png";
		x.setAttribute("src", v);


		var img = document.createElement("img");
		img.src = "SalleFinie/sallesuivtxt.png";
		img.style = "margin-left:70%;position:absolute;width: 350px;margin-top: 40px;";
		var div = document.getElementById("bulle");
		div.parentNode.appendChild(img);
	});
}


SalleFinie();