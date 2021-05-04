function ouvrirRegles(){
	document.getElementById("regles_popup").style.display="block";
}

function ouvrirInscription(){
	document.getElementById("inscription_popup").style.display="block";
}

function ouvrirConnexion(){
	document.getElementById("connexion_popup").style.display="block";
}

function revenirPageAccueil(){
	document.location.href = "accueil.html";
}

function modeJseul(){
	document.location.href = "http://localhost/Escape_Game/html/accueil_jeux.html";
}

function verifInscription(){
	//enlever tous les messages d'erreurs
	enleverMessages();
	//verifier prenom
	if (Prenom.value.length > 16){
    creerMessage(Prenom, "Votre prenom est trop long.");
  	}
  	if (Prenom.value.length < 1){
    creerMessage(Prenom, "Votre prenom est trop court.");
  	}

  	//verifier nom
  	if (Nom.value.length > 16){
    creerMessage(Nom, "Votre nom est trop long.");
  	}
  	if (Nom.value.length < 1){
    creerMessage(Nom, "Votre nom est trop court.");
  	}

  	//verifier email
  	if (!AdresseMail.value.includes("@",0) || !AdresseMail.value.includes(".",0)){
    creerMessage(AdresseMail, "L'adresse mail n'est pas valide.");
 	}





 	//verifier les mots de passe
 	if (MDP.value.length < 6){
    createErrorMessage(MDP, "Votre mot de passe est trop court.");
  	}
  
 	// Identical passwords
  	if (MDP.value != VMDP.value){
    createErrorMessage(VMDP, "Vos mots de passe ne sont pas identiques.");
 	}
}

function creerMessage(champs, message){
	var erreurDiv = document.createElement("div");
	erreurDiv.className = "erreur";
	erreurDiv.innerHTML = message;
	champs.parentNode.appendChild(erreurDiv);
}
function enleverMessages(){
	var messages= document.getElementsByClassName("erreur");
	while(messages.length > 0){
    var parent = messages[0].parentNode;
    parent.removeChild(messages[0]);
  }
}
