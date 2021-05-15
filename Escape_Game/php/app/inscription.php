<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="http://localhost/Escape_Game/css/accueil.css"/>
  <script type="text/javascript" src="http://localhost/Escape_Game/js/accueil.js"></script>
</head>
<body>

<div class ="global">
		<div class="popup" id="inscription_popup">
			<?php  
      //connecter à la bdd
      require('Database.php');
      // déclaration des variables + initialiastion
      $nomErreur = $prenomErreur = $emailErreur = $mdpErreur = $vmdpErreur = '';
      $nom = $prenom = $email = $mdp = $vmdp = '';
      $valide=true; //retourne VRAI si le formulaire est bien remplis, sinon FAUX

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['nom']){
          $valide=false;
          $nomErreur .= '<span class="erreur">Vous devez saisir votre nom</span>';
        } elseif (strlen($_POST['nom'])) > 16) {
          $valide=false;
          $nomErreur .= '<span class="erreur">Votre nom est trop long</span>';
        } else {
          $nom = test_input($_POST['nom']);
        }
        if (!isset($_POST['prenom'])) {
          $valide=false;
          $prenomErreur .= '<span class="erreur">Vous devez saisir votre prénom</span>';
        }elseif (strlen($_POST['prenom'])) > 16) {
          $valide=false;
          $prenomErreur .= '<span class="erreur">Votre prenom est trop long</span>';
        } else {
          $prenom = test_input($_POST['prenom']);
        }
        if (!isset($_POST['email'])) {
          $valide=false;
          $emailErreur .= '<span class="erreur">Vous devez saisir une addresse mail</span>';
        } else {
          $email = test_input($_POST['email']);
        }
        if (!isset($_POST['mdp'])) {
          $valide=false;
          $mdpErreur .= '<span class="erreur">Vous devez saisir un mot de passe</span>';
        } else {
          $mdp = test_input($_POST['mdp']);
        }
        if (!isset($_POST['vmdp'])) {
          $valide=false;
          $vmdpErreur .= '<span class="erreur">Vous devez saisir une validation de votre mot de passe</span>';
        } elseif ($_POST['vmdp']!=$mdp) {
          $valide=false;
          $vmdpErreur .= '<span class="erreur">Vous devez saisir le même mot de passe</span>';
        } else {
          $vmdp = test_input($_POST['vmdp']);
        }
        if (!isset($_POST['email']|| !existe('@',$_POST['email'])||!existe('.',$_POST['email']))) {
          $valide=false;
          $emailErreur.='<span class="erreur">Votre email est invalide</span>';
        } else{
          $email= $_POST['email'];
        }

        //ajout de l'utilisateur si tous les champs ont été remplis correctement
        if($valide){
          echo 'Bienvenu(e)' .$prenom. .$nom. '!';
          $idaleatoire= idAleatoire();
          $nouvutilisateur=ajoutUtilisateur($idaleatoire, $nom, $prenom, $email, $mdp);
        }
      }
      ?>
			
		</div>
	</div>
</body>
</html>

//php functions
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
//generer un identifiant aleatoire
function idAleatoire($Taille = 6){
  $char= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $taillechar= strlen($char);
  $idaleatoire='';
  while (existeid($idaleatoire)) {
   for ($i=0; $i <$Taille ; $i++) { 
        $idaleatoire .= $char[rand(0, $taillechar -1)];
      }
 }
  return $idaleatoire;
}
//verifi si l'id existe dans la bdd
function existeid($idaleatoire){
  $ligne= $mypdo->query("SELECT identifiant FROM utilisateur WHERE identifiant = '$idaleatoire'");
  if ($ligne==0) {
    return false;
  }else{
    return true;
  }
}
//ajouter un identifiant pour chaque utilisateur
function ajoutUtilisateur ($idaleatoire, $nom, $prenom, $email, $mdp){
  $query= "INSERT INTO utilisateur (identifiant, nom, prenom, email, mdp) VALUES (:identifiant, :nom, :prenom, :email, :mdp)";
  $statement = $connection->prepare($query);
  $statement->bindValue(":identifiant", $idaleatoire, PDO::PARAM_STR);
  $statement->bindValue(":nom", $nom, PDO::PARAM_STR);
  $statement->bindValue(":prenom", $prenom, PDO::PARAM_STR);
  $statement->bindValue(":email", $email, PDO::PARAM_STR);
  $statement->bindValue(":mdp", $mdp, PDO::PARAM_STR);
  $OK = $statement->execute();
  return $OK;
}
?>
