var btn = document.querySelector('button');
var numsalle = 1;

var enigmes_fac = ['Que signifie CSS ?','Que signifie PHP ?','Que signifie PNG ?','Que signifie AJAX ?','Dans quelle balise se trouve un paragraphe ?','En CSS, est-il possible de sélectionner plusieurs éléments différents en même temps?','Que signifie " || " ?'];
var reponses_fac =['Cascading Style Sheets','PHP: Hypertext Preprocessor','Portable Network Graphic','Asynchronous JavaScript and XML','body','oui','ou'];
var indices_fac = ['Cascading St..e Sh....','PHP: Hypert..t Pre.........','Portable Net...k Gr.....','Asynchronous Java...... and ...','signifie corps en anglais','peut-être','c est un opérateur de comparaison'];

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
    var reponse_user = document.getElementById("reponse").value;
    var reponse_attendue = reponses_fac[x];

    if(reponse_user == reponse_attendue) { 
        SalleFinie();
    }
    else {
        duree = duree - 30;
    }
    Fin();
}

function SalleFinie() {
    document.getElementById("portail").style.visibility ="visible";
    document.getElementById("bonhommeContent").style.visibility ="visible";
    document.getElementById("cadenasouvert").style.visibility ="visible";
    document.getElementById("cadenas").style.visibility ="hidden";
    reponses_fac.splice(x,1);
    enigmes_fac.splice(x,1);
}

function NvSalle(){
    document.getElementById("reponse").value ="";

    document.getElementById("cadenasouvert").style.visibility ="hidden";
    document.getElementById("cadenas").style.visibility ="visible";
    document.getElementById("bonhommeContent").style.visibility ="hidden";
    numsalle = numsalle + 1;
    document.getElementById("salle").innerHTML = "Salle N°" + numsalle;
    document.getElementById("portail").style.visibility ="hidden";

    x = Math.floor(Math.random() * enigmes_fac.length);

    document.getElementById("quest").innerHTML = enigmes_fac[x];
    document.getElementById('indice-body').innerHTML = indices_fac[x];
}

function Fin(){
    if (numsalle == 7) {
    document.location.href="victoire.html";
    }
}


const openIndiceButtons = document.querySelectorAll('[data-indice-target]')
const closeIndiceButtons = document.querySelectorAll('[data-close-button]')

openIndiceButtons.forEach(button => {
  button.addEventListener('click', () => {
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
  if (indice == null) return
  indice.classList.add('active')
  overlay.classList.add('active')
}
function closeIndice(indice) {
  if (indice == null) return
  indice.classList.remove('active')
  overlay.classList.remove('active')
}