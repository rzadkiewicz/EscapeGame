var btn = document.querySelector('button');
var numsalle = 1;

var reponse_attendue;
var reponse_user;

var enigmes_fac = ['Que signifie CSS ?',
'Que signifie PHP ?',
'Que signifie PNG ?',
'Que signifie AJAX ?',
'En CSS, est-il possible de sélectionner plusieurs éléments différents en même temps?',
'Que signifie " || " ?',
'Citez 2 type de variables en javascript',
'Pour définir une fonction, faut-il utiliser fonction ou function ?',
'Comment afficher un message dans la console ?',
'Quelle est la balise pour une saisie ?',
'Que signifie " && " ?',
'Quelle est la balise pour insérer un paragraphe en HTML ?',
'Quelle est la syntaxe de récupération d’un ID en javascript ?',
"Quelle est la syntaxe pour ajouter un écouteur d évènement ?",
'Quel symbole est caractéristique du jQuery ?',
'Quel est le langage correspondant aux bases de données ?',
"En CSS, quel symbole permet d'identifier une classe ?",
"En CSS, quel symbole permet d'identifier une div ?",
"Vrai ou faux : L'événement 'mouseout' permet d'empêcher la souris de sortir de l'écran",
'En CSS, quelle propriété permet de modifier la taille de la police ?',
'Quel est le langage côté serveur le plus utilisé ?',
"Quel est l'animal correspondant au logo de php ?",
'Quelle est la requête SQL qui permet de choisir une colonne',
"Quelle fonction retourne la longueur d'une chaîne de texte ?",
'Que faut-il écrire pour que le document soit au format html ?',
'Combien de niveaux de titre y a-t-il en html?',
'Comment faire un retour à la ligne en html?',
'Quelles sont les balises qui te permettent d’écrire du javascript dans ton code html ?',
'Comment changer un texte en italique ?',
'Comment sélectionner tous les éléments?',
"Dans l’exemple suivant, que représente le '28': var d= new Date ( 2021, 06, 18, 10, 28, 03)",
'Quelle méthode faut-il utiliser pour ajouter un élément à la fin d’une liste?',
'Quelle méthode faut-il utiliser pour supprimer le dernier élément d’une liste?',
'Quelle balise représente une ligne dans un tableau ?',];



var reponses_fac =['Cascading Style Sheets',
'PHP Hypertext Preprocessor',
'Portable Network Graphic',
'Asynchronous JavaScript and XML',
'oui',
'ou',
'let var',
'function',
'console.log',
'input',
'et',
'p',
'getElementById',
'addEventListener',
'$',
'SQL',
'.',
'#',
'faux',
'font-size',
'php',
'éléphant',
'SELECT',
'length',
'<!DOCTYPE html>',
'6',
'<br>',
'<script></script>',
'font-style: italic',
'*',
'minutes',
'push',
'pop',
'<tr>',];

var indices_fac = ['Cascading St..e Sh....',
'PHP Hypert..t Pre.........',
'Portable Net...k Gr.....',
'Asynchronous Java...... and ...',
'Peut-être',
"C'est un opérateur de comparaison",
'2 mots de 2 lettres',
'Un indice pour ça ?',
'Mon premier est dans la question, mon deuxième est un terme mathématique',
'Ressemble à "mettre dedans" en anglais',
'Wallace & Gromit',
'Une seule lettre',
'Les initiales sont G E B I',
'AddE.........ner',
"Ce n'est ni € ni £",
"C'est le langage de requête structurée",
"Egalement utilisé à la fin d'une phrase",
'Ressemble à une grille de morpion',
'Bleu ?',
'f...-s...',
'Langage en 3 lettres',
'Il vit en Afrique ou en Asie',
'Permet de SELECTionner une colonne',
'Longueur en anglais',
'!type de document html',
"C'est plus que 5, mais moins de 10",
'Break ?',
's....> /s....',
'f...-s.... : le style voulu !',
"C'est aussi le symbole de la multiplication",
'Il y en a 525600 en une année',
'Pousser en anglais',
"C'est également un style de musique",
'initiales de lignes de table en anglais',];

var x = Math.floor(Math.random() * enigmes_fac.length);

document.getElementById("quest").innerHTML = enigmes_fac[x];
document.getElementById('indice-body').innerHTML = indices_fac[x];

function timer() {
    var compteur=document.getElementById('compteur');
    s=duree;
    m=0;h=0;
    if(s<0) {
        compteur.innerHTML="perdu<br />"
        document.location.href="gameover.html";
    }
    else {
        if(s>59){
            m=Math.floor(s/60);
           	s=s-m*60
        }
        if(m>59){
            h=Math.floor(m/60);
            m=m-h*60
        }
        if(s<10){
            s="0"+s
       	}
        if(m<10){
            m="0"+m
        }
        compteur.innerHTML=h+":"+m+":"+s
    }
    duree=duree-1;
    window.setTimeout("timer();",1000);
}

duree="600";
timer();



function valider(){
    reponse_user = document.getElementById("reponse").value;
    reponse_attendue = reponses_fac[x];
    console.log(reponse_attendue);
    reponse_user = reponse_user.replace(/ /g, '');
    reponse_attendue = reponse_attendue.replace(/ /g, '');
    reponse_user = reponse_user.toLowerCase();
    reponse_attendue = reponse_attendue.toLowerCase();
    if(reponse_attendue == reponse_user) { 
        SalleFinie();
    }
    else {
        duree = duree - 30;
    }
}

function skip(){
    reponses_fac.splice(x,1);
    enigmes_fac.splice(x,1);
    indices_fac.splice(x,1);
    x = Math.floor(Math.random() * enigmes_fac.length);
    document.getElementById("quest").innerHTML = enigmes_fac[x];
    document.getElementById('indice-body').innerHTML = indices_fac[x];
    duree=duree-60;
    document.getElementById("livre").style.visibility ="visible";
}

function SalleFinie() {
    document.getElementById("portail").style.visibility ="visible";
    document.getElementById("bonhommeContent").style.visibility ="visible";
    document.getElementById("cadenasouvert").style.visibility ="visible";
    document.getElementById("cadenas").style.visibility ="hidden";
    document.getElementById("boutonskip").style.visibility ="hidden";
    reponses_fac.splice(x,1);
    enigmes_fac.splice(x,1);
    indices_fac.splice(x,1);
}

function NvSalle(){
    
    document.getElementById("reponse").value ="";

    document.getElementById("livre").style.visibility ="visible";
    document.getElementById("boutonskip").style.visibility ="visible";
    document.getElementById("cadenasouvert").style.visibility ="hidden";
    document.getElementById("cadenas").style.visibility ="visible";
    document.getElementById("bonhommeContent").style.visibility ="hidden";
    numsalle = numsalle + 1;
    document.getElementById("salle").innerHTML = "Salle N°" + numsalle;
    document.getElementById("portail").style.visibility ="hidden";

    x = Math.floor(Math.random() * enigmes_fac.length);

    document.getElementById("quest").innerHTML = enigmes_fac[x];
    document.getElementById('indice-body').innerHTML = indices_fac[x];
    Fin();
}

function revenirPageAccueil(){
    document.location.href = "accueil.html";
}

function Fin(){
    if (numsalle > 10) {
        //var score_final = duree;
        //document.location.href="victoire.html";

        document.getElementById("cadenas").style.visibility ="hidden";
        document.getElementById("bonhommeContent").style.visibility ="visible";
        document.getElementById("imageBulle").style.visibility ="hidden";
        document.getElementById("quest").style.visibility ="hidden";
        document.getElementById("compteur").style.visibility ="hidden";
        document.getElementById("boutonskip").style.visibility ="hidden";
        document.getElementById("porte").style.visibility ="hidden";
        document.getElementById("indices").style.visibility ="hidden";
        document.getElementById("zoneReponse").style.visibility ="hidden";
        document.getElementById("coupe").style="visibility: visible";
        document.getElementById("livre").style.visibility ="hidden";

        var m = Math.floor(duree % 3600 / 60);
        var s = Math.floor(duree % 3600 % 60);

        m = 9-m
        s = 59-s

        var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : "m, ") : "";
        var sDisplay = s > 0 ? s + (s == 1 ? " second" : "s") : "";

        var temps_final = mDisplay.toString() + "m et " + sDisplay.toString() + "s";
        //console.log(hDisplay + mDisplay + sDisplay); 
        document.getElementById("salle").innerHTML = "Félicitations ! Temps mis : " + mDisplay + sDisplay;
    }
}


const openIndiceButtons = document.querySelectorAll('[data-indice-target]')
const closeIndiceButtons = document.querySelectorAll('[data-close-button]')

openIndiceButtons.forEach(button => {
  button.addEventListener('click', () => {
    duree=duree-30;
    const indice = document.querySelector(button.dataset.indiceTarget)
    openIndice(indice)

  })
})
closeIndiceButtons.forEach(button => {
  button.addEventListener('click', () => {
    const indice = button.closest('.indice')
    closeIndice(indice)
  })
})

function openIndice(indice) {
document.getElementById("livre").style.visibility ="hidden";
  if (indice == null) return
  indice.classList.add('active')
  overlay.classList.add('active')
}
function closeIndice(indice) {
  if (indice == null) return
  indice.classList.remove('active')
  overlay.classList.remove('active')
}
