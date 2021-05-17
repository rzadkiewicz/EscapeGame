function ouvrirFacile(){
	document.getElementById("facile_popup").style.display="block";
}


function ouvrirMoyen(){
	document.getElementById("moyen_popup").style.display="block";
}


function ouvrirDifficile(){
	document.getElementById("difficile_popup").style.display="block";
}

function ouvrirParamètre(){
    document.getElementById("paramètre_popup").style.visibility="visible";
}

function ouvrirRegles(){
	document.getElementById("regles_popup").style.visibility="visible";
}


function revenirPageAccueil(){
	document.location.href = "http://localhost/Escape_Game/html/accueil_jeux.php";
}

function modeJseul(){
	document.location.href = "http://localhost/Escape_Game/html/salle_facile.html";
}
