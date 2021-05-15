<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="accueil.css"/>
	<script type="text/javascript" src="accueil.js"></script>
</head>
<body>
<div class ="global">
	<div class="popup" id="connexion_popup">
		<?php 
		//connecter à la bdd
		require('Database.php');
		// déclaration des variables + initialiastion
		$emailErreur = $mdpErreur = '';
		$nom = $prenom = $email = '';
		$valide=true; //retourne VRAI si le formulaire est bien remplis, sinon FAUX

		if ($_SERVER['REQUEST_METHOD']== 'POST') {
			if (!isset($_POST['email'])|| existeEmail($_POST['email'])==0){
				$valide=false;
				$emailErreur .= '<span class="erreur">Aucun compte existe à cette adresse mail</span>';
			}else {
          $email = test_input($_POST['email']);
			}
			if (!isset($_POST['mdp'])||) {
				# code...
			}
		}
		?>
	</div>

</div>
</body>
</html>
<?
//function
function utilisateur($mdp, $email){
	$ligne= $mypdo->query("SELECT email FROM utilisateur WHERE email = '$email' AND mdp='$mdp");
	if ($ligne==0) {
		echo "ce compte n'existe pas!";
		
	}
}
function mdpCorrect($mdp){
	$mdp= $mypdo-> query("SELECT mdp FROM utilisateur WHERE mdp = '$mdp' AND ");

}



