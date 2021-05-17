<!DOCTYPE HTML>
<html>

<?php 

 if (isset($_SESSION['auth'])){ 
 
     header('Location:  ../accueil.php');

 } else { session_start();
   }


 ?>
 
<head>
	<title>Page d'accueil</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="http://localhost/Escape_Game/css/accueil_jeux.css"/>
	<script type="text/javascript" src="http://localhost/Escape_Game/js/accueil_jeux.js"></script>
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




	<div class ="global">
	
	<!--/********* Joueur Seul *********/-->

		<div class="boutton" onclick="modeJseul()" id="jseul">
			<span>Joueur seul</span>
		</div>

	
<!--/********* Paramètre *********/-->

<?php 
	
		//fichier utile
						
		require('../php/app/Database.php');
		
      
      // déclaration des variables + initialiastion
	  
	 
	  $db = new Database('escapegame'); // initialisation de la BDD
      $NomErreur = $PrenomErreur = $EmailErreur = $MdpErreur = $VmdpErreur = '';
      $Nom = $Prenom = $Email = $MDP = $VMDP = '';
      $valide=true; //retourne VRAI si le formulaire est bien remplis, sinon FAUX

        if (empty($_POST['Nom'])){
          $Nom="NULL";
        } elseif ((strlen($_POST['Nom'])) > 16) {
          $valide=false;
          $nomErreur .= '<span class="erreur">Votre nom est trop long</span>';
        } else {
          $nom = test_input($_POST['Nom']);
          $db -> query('UPDATE utilisateur SET nom = "'.$_POST['Nom'].'" WHERE idUser = "'.$_SESSION['auth'][0]->idUser.'"');
        }
		  if (empty($_POST['Prenom'])) {
          $Prenom="NULL";
        }elseif ((strlen($_POST['Prenom'])) > 16) {
          $valide=false;
          $PrenomErreur .= '<span class="erreur">Votre Prenom est trop long</span>';
        } else {
          $Prenom = test_input($_POST['Prenom']);
		  $db -> query('UPDATE utilisateur SET prenom = "'.$_POST['Prenom'].'" WHERE idUser = "'.$_SESSION['auth'][0]->idUser.'"');
        }
        if (empty($_POST['Email'])) {
          $valide=false;
          $EmailErreur .= '<span class="erreur">Vous devez saisir une addresse mail</span>';
        } else {
          $Email = test_input($_POST['Email']);
        }
        if (empty($_POST['MDP'])) {
          $valide=false;
          $MdpErreur .= '<span class="erreur">Vous devez saisir un mot de passe</span>';
        } else {
          $MDP = test_input($_POST['MDP']);
		  $db -> query('UPDATE utilisateur SET mdp = "'.$_POST['MDP'].'" WHERE idUser = "'.$_SESSION['auth'][0]->idUser.'"');
        }
        if (empty($_POST['VMDP'])) {
          $valide=false;
          $VmdpErreur .= '<span class="erreur">Vous devez saisir une confirmation de votre mot de passe</span>';
        } elseif ($_POST['VMDP']!=$MDP) {
          $valide=false;
          $VmdpErreur .= '<span class="erreur">Vous devez saisir le même mot de passe</span>';
        } else {
          $VMDP = test_input($_POST['VMDP']);
        }
        if (empty($_POST['Email'])) {
          $valide=false;
          $EmailErreur.='<span class="erreur">Veuillez entrer un Email</span>';
        } elseif (!existe('@',$_POST['Email'])|| !existe('.',$_POST['Email'])){
			$valide=false;
			$EmailErreur.='<span class="erreur">Veuillez entrer un Email valide</span>';
        } else {
			$Email= $_POST['Email'];
			$db -> query('UPDATE utilisateur SET Email = "'.$_POST['Email'].'" WHERE idUser = "'.$_SESSION['auth'][0]->idUser.'"');
        }
      
      ?>
	
		<div class="boutton" onclick="ouvrirParamètre()" id="paramètre">
			<span>Paramètre</span>
		</div>
		<div class="popup" id="paramètre_popup">
			<h1>Paramètre</h1>
			<form action="" method="post" id="paramètre_form">
		        <div id="formulaire">
					<div>
						<label for="Nom">Changer de Nom:</label>
						<input type="text" id="Nom" name="Nom">
					</div>
					<div>
						<label for="Prenom">Changer de Prénom:</label>
						<input type="text" id="Prenom" name="Prenom">
					</div>
					<div>
						<label for="AdresseMail">Changer l'Adresse mail:</label>
						<input type="email" id="Email" name="Email">
					</div>
					<div>
						<label for="MDP">Changer le Mot de passe:</label>
						<input type="text" id="MDP" name="MDP">
					</div>
					<div>
						<label for="VMDP">Confirmation du mot de passe:</label>
						<input type="text" id="VMDP" name="VMDP">
					</div>
					
				</div>
				<div>
					 <input type="submit" value="Valider" id="submit_paramètre" class="boutton"/>
			    </div>
				
			</form>
		</div>
		

		<!--/********* Déconnexion *********/-->

		<div id = "submit_déconexion">
		<form action="" method="post">
        <input type="submit" id="déconexion" value="Déconexion" class="boutton" name="déconexion" />
        </form>
		</div>
		
		
		<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['déconexion']))
    {
        func();
    }
    function func()
    {
        session_destroy();
        header('Location: ../accueil.php');		
    }
?>

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
			Bienvenu(e) dans l'escape game. Pour mieux comprendre le réroulement du jeu, voici quelques explications...<br><br>Avant de commencer une partie, vous avez la possibilité de vous connecter à votre compte ou d'en créer un, si vous n'avez pas encore de compte. Jouer en étant connecté à votre compte vous permettra de sauvegarder les scores obtenus lors de vos différentes parties, ou de joueur avec vos amis grâce au mode multijoueur. Si vous souhaitez faire une partie sans être connecté à un compte, votre partie ne sera pas sauvegardée. À vous de choisir!<br>Une fois le type de partie séléctionée, vous serez redirigé vers les modes de difficulté de la partie... 3 modes s'offrent à vous:<br><br><b><i>Facile:</i></b><br>pour accéder à la salle suivante, vous devez répondre correctement à une seule question. Dans ce mode, vous ne serz pas pénalisé par vos fautes ou par le manque de temps!<br><br><b><i>Moyen:</i></b><br>dans ce mode, vous pouvez avoir jusqu'à deux énigmes à résoudre avant de pouvoir accéder à la salle suivante. Vous serez pénalisé lors de la saisie d'une mauvaise réponse!<br><br><b><i>Difficile:</i></b><br>vous pouvez avoir jusqu'à quatre énigmes par salle! Là aussi une mauvaise réponse vous sera pénalisée.<br><br><ins>Bonne chance!</ins>
		</p>
	</div>



	

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

