<!DOCTYPE html>

<html>

<?php 

 if (!empty($_SESSION['auth'])){ header('Location:  html/accueil_jeux.php');}

?>

<head>
	<title>Page d'accueil</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="http://localhost/Escape_Game/css/accueil.css"/>
	<script type="text/javascript" src="http://localhost/Escape_Game/js/accueil.js"></script>
</head>
<body>

<!--/********* Images de fond *********/-->

	<div id="imagesGauche">
		<div id="nuagediv">
			<div id="personnagemessage">
				<div id="message">
				<img id="bienvenue" src="http://localhost/Escape_Game/image/Accueil/bienvenue.png" alt="Bienvenue" width="150">
				</div>
			</div>	
		</div>

	</div>
	<div id="imageDroite">
		<img id="nuageporte" src="http://localhost/Escape_Game/image/Accueil/nuageporte.png" alt="Nuage avec une Porte" width="220">
	
	</div>

<!--/********* Inscription *********/-->

	<div class ="global">
		<div class="boutton" onclick="ouvrirInscription()" id="inscription">
			<span>Inscription</span>
		</div>
	<?php 
	
		//fichier utile
						
		require('php/app/Database.php');
      
      // déclaration des variables + initialiastion
	  
      $nomErreur = $prenomErreur = $emailErreur = $mdpErreur = $vmdpErreur = '';
      $nom = $prenom = $email = $mdp = $vmdp = '';
      $valide=true; //retourne VRAI si le formulaire est bien remplis, sinon FAUX

        if (empty($_POST['nom'])){
          $valide=false;
          $nomErreur .= '<span class="erreur">Vous devez saisir votre nom</span>';
        } elseif ((strlen($_POST['nom'])) > 16) {
          $valide=false;
          $nomErreur .= '<span class="erreur">Votre nom est trop long</span>';
        } else {
          $nom = test_input($_POST['nom']);
        }
		  if (empty($_POST['prenom'])) {
          $valide=false;
          $prenomErreur .= '<span class="erreur">Vous devez saisir votre prénom</span>';
        }elseif ((strlen($_POST['prenom'])) > 16) {
          $valide=false;
          $prenomErreur .= '<span class="erreur">Votre prenom est trop long</span>';
        } else {
          $prenom = test_input($_POST['prenom']);
        }
        if (empty($_POST['email'])) {
          $valide=false;
          $emailErreur .= '<span class="erreur">Vous devez saisir une addresse mail</span>';
        } else {
          $email = test_input($_POST['email']);
        }
        if (empty($_POST['mdp'])) {
          $valide=false;
          $mdpErreur .= '<span class="erreur">Vous devez saisir un mot de passe</span>';
        } else {
          $mdp = test_input($_POST['mdp']);
        }
        if (empty($_POST['vmdp'])) {
          $valide=false;
          $vmdpErreur .= '<span class="erreur">Vous devez saisir une confirmation de votre mot de passe</span>';
        } elseif ($_POST['vmdp']!=$mdp) {
          $valide=false;
          $vmdpErreur .= '<span class="erreur">Vous devez saisir le même mot de passe</span>';
        } else {
          $vmdp = test_input($_POST['vmdp']);
        }
        if (empty($_POST['email'])) {
          $valide=false;
          $emailErreur.='<span class="erreur">Veuillez entrer un email</span>';
        } elseif (!existe('@',$_POST['email'])|| !existe('.',$_POST['email'])){
			$valide=false;
			$emailErreur.='<span class="erreur">Veuillez entrer un email valide</span>';
        } else {
			$email= $_POST['email'];
        }
      

        //ajout de l'utilisateur si tous les champs ont été remplis correctement
        if($valide){
	      $db = new Database('escapegame');
          $db -> query('INSERT INTO utilisateur VALUE (NULL, "'.$_POST['nom'].'", "'.$_POST['prenom'].'", "'.$_POST['email'].'", "'.$_POST['mdp'].'")');
		  $user = $db -> queryR('SELECT * FROM utilisateur WHERE email = "'.$_POST['email'].'"');
		  session_start();
		  $_SESSION['auth'] = $user;
		  header('Location: html/accueil_jeux.php');
        }
      ?>
	  
            <div class="popup" id="inscription_popup">
			<h1>Inscription</h1>
		
			<form id="inscription_form" action="" method="POST">
				<div id="formulaire">
					<div class="champs">
						<label for="nom">Nom:</label>
						<input class="input" type="text" name="nom" required>
					</div>
					<div class="champs">
						<label for="prenom">Prénom:</label>
						<input class="input" type="text" name="prenom" required>
					</div>
					<div class="champs">
						<label for="email">Adresse mail:</label>
						<input class="input" type="email" name="email" required>
					</div>
					<div class="champs">
						<label for="mdp">Mot de passe:</label>
						<input class="input" type="password" name="mdp" required>
					</div>
					<div class="champs">
						<label for="vmdp">Confirmation mot de passe:</label>
						<input class="input" type="password" name="vmdp" required>
					</div>
				</div>
				<div>
					<input type="submit" name="validerform" value="Valider"/>
				</div>
			</form>	
		  </div>
		



<!--/********* Connexion *********/-->

		<div class="boutton" onclick="ouvrirConnexion()" id="connexion">
			<span>Connexion</span>
		</div>
		<?php
		if(!empty($_POST) && !empty($_POST['EMAIL']) && !empty($_POST['Mdp'])) {
			$db = new Database('escapegame');
		    $req = $db -> queryR('SELECT * FROM utilisateur WHERE email = "'.$_POST['EMAIL'].'"');
			var_dump($req);
			if(($_POST['Mdp'] = $req[0]->mdp)){
				session_start();
		        $_SESSION['auth'] = $req;
				var_dump($_SESSION['auth']);
		        header('Location: html/accueil_jeux.php');
			}
		}
		?>
		<div class="popup" id="connexion_popup">
			<h1>Connexion</h1>
			<form id="connexion_form" action="" method="POST">
				<div id="formulaire">
					<div class="champs">
						<label for="AdresseMail">Adresse mail:</label>
						<input class="input" type="text" id="EMAIL" name="EMAIL">
					</div>
					<div class="champs">
						<label for="MDP">Mot de passe:</label>
						<input class="input" type="text" id="Mdp" name="Mdp">
					</div>
				</div>
				<div>
					<input type="submit" value="Valider"/> <!-- verifier saisie-->
				</div>	
				
			</form>
		</div>
		



<!--/********* Joueur Seul *********/-->

		<div class="boutton" onclick="modeJseul()" id="jseul">
			<span>Joueur seul</span>
		</div>



<!--/********* Multi-joueurs *********/-->

		<div class="boutton" onclick="modeMultiJoueurs()" id="multijoueurs">
			<span>Multijoueur</span>
		</div>
	</div>

	<div id="barredubas">
		<div class="boutton" onclick="ouvrirRegles()" id="regles">
		<span>Règles</span>
		</div>
		<div class="boutton" onclick="revenirPageAccueil()" id="accueil">
		<span>Accueil</span>
		</div>
	</div>
<!--/********* Règles du jeu *********/-->

	

	<div class="popup" id="regles_popup">
		<h1>Règles du jeu</h1>
		<p id="paragrapheregle">
			Bienvenu(e) dans l'escape game. Pour mieux comprendre le réroulement du jeu, voici quelques explications...<br><br><ins>L'espace accueil:</ins><br>Avant de commencer une partie, vous avez la possibilité de vous connecter à votre compte ou si vous n'avez pas encore de compte, vous avez aussi la possibilité d'en créer un. Jouer en étant connecté à un compte vous permettra de sauvegarder les scores obtenus lors de vos différentes parties. Si vous souhaitez faire une partie sans être connecté à un compte, votre partie ne sera pas sauvegardée. À vous de choisir!<br><br><ins>Déroulement de la partie:</ins><br>Une fois le type de partie séléctionée, vous serez redirigé vers la première salle.<br>Pour accéder à la salle suivante, vous devez répondre correctement à la question posée.<br><br><ins>Attention aux pénalités:</ins><br>Si votre réponse est fausse ou si vous décidez d'utiliser un indice, 30 secondes seront déduites du chronomètre.<br>Si vous choisissez de passer la question, 1 minute sera déduite du chronomètre.<br><br><ins>Comment gagner une partie?</ins><br> Pour pouvoir gagner la partie, vous devez répondre correctement à la dernière question avant la fin du chronomètre! Vous avez 10 minutes à partir du lancement de la partie.<br><br><b>Bonne chance!</b>
		</p>
	</div>



<!--/********* Page D'accueil *********/-->

	

</body>

<?php
function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
function existe($x, $mot){
  for ($i=0; $i < strlen($mot); $i++) { 
    if ($mot[$i]== $x) {
      return true;
    }
  }
  return false;
}

?>

</html>
