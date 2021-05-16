<!DOCTYPE html>
<html>
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
		<div class="popup" id="inscription_popup">
				<h1>Inscription</h1>
				<form id="inscription_form" action="" method="POST">
					<div id="formulaire">
						<div class="champs">
							<label for="nom">Nom:</label>
							<input class="input" type="text" name="nom" required placeholder="e.g. Kevin" pattern="[a-zA-Z]{1,}" title="Votre nom n'est pas valide!">
						</div>
						<div class="champs">
							<label for="prenom">Prénom:</label>
							<input class="input" type="text" name="prenom" required placeholder="e.g. Blanc" pattern="[a-zA-Z]{1,}" title="Votre prénom n'est pas valide!">
						</div>
						<div class="champs">
							<label for="email">Adresse mail:</label>
							<input class="input" type="email" name="email" required placeholder="e.g. kevin.blanc@gmail.com" pattern="[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]+.[a-zA-Z.]{2,15}" title="Votre adresse mail n'est pas valide!">
						</div>
						<div class="champs">
							<label for="mdp">Mot de passe:</label>
							<input class="input" type="password" name="mdp" required>
						</div>
						<div class="champs">
							<label for="vmdp">Confirmation mot de passe:</label>
							<input class="input" type="password" name="vmdp" required title="La confirmation n'est pas valide!">
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
		<div class="popup" id="connexion_popup">
			<h1>Connexion</h1>
			<form id="connexion_form" action="connection.php" method="POST">
				<div id="formulaire">
					<div class="champs">
						<label for="AdresseMail">Adresse mail:</label>
						<input class="input" type="email" id="AdresseMail" name="AdresseMail" required placeholder="e.g. kevin.blanc@gmail.com" pattern="[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]+.[a-zA-Z.]{2,15}" title="Votre adresse mail n'est pas valide!">
					</div>
					<div class="champs">
						<label for="MDP">Mot de passe:</label>
						<input class="input" type="password" id="MDP" name="MDP" required>
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
</html>
