

/* ------------ MANIPULER LE DOM 	PART 1/2 -------------*/

// Cette méthode permet d'accéder à un élément en connaissant son ID qui est simplement l'attribut id de l'élément.
var div = document.getElementById('myDiv');
// Cette méthode permet de récupérer, sous la forme d'un tableau, tous les éléments de la famille. Si, dans une page, on veut récupérer tous les <div>, il suffit de faire comme ceci :
var tabName = document.getElementsByTagName('div');
// Cette méthode est semblable à getElementsByTagName() et permet de ne récupérer que les éléments qui possèdent un attribut name que vous spécifiez.
var name = document.getElementsByName('sonNom');

// querySelecto() renvois le premier element trouver correspondant au selecteur CSS
// querySelectorAll() renvois tous les elements (sous forme de tableau) correspondant au selecteur CSS
var query = document.querySelector('#menu .item span'),
    queryAll = document.querySelectorAll('#menu .item span');
    queryAllProperty = document.querySelectorAll('span[property]');

// Pour interagir avec les attributs, l'objet Element nous fournit deux méthodes, getAttribute() et setAttribute() permettant respectivement de récupérer et d'éditer un attribut. Le premier paramètre est le nom de l'attribut, et le deuxième, dans le cas de setAttribute() uniquement, est la nouvelle valeur à donner à l'attribut
var link = document.getElementById('myLink');
    var href = link.getAttribute('href'); // On récupère l'attribut « href »

    link.setAttribute('href', 'http://www.siteduzero.com'); // On édite l'attribut « href »

    // DEUXIEME METHODE 

    var link = document.getElementById('myLink');
        var href = link.href;

        alert(href);

        link.href = 'http://www.siteduzero.com';

        /*
        Attention cependant ! Un attribut auquel on accède par le biais de la méthode getAttribute() renverra la valeur exacte de ce qui est écrit dans le code HTML (sauf après une éventuelle modification) tandis que l'accès par le biais de sa propriété peut entraîner quelques changements. Prenons l'exemple suivant :
		<a href="/">Retour à l'accueil du site</a>
		L'accès à l'attribut href  avec la méthode getAttribute() retournera bien un simple slash tandis que l'accès à la propriété retournera une URL absolue. Si votre nom de domaine est « mon_site.com » vous obtiendrez alors « http://mon_site.com/ »
		*/


// Dans cet exemple, on définit la classe CSS .blue à l'élément myColoredDiv, ce qui fait que cet élément sera affiché avec un arrière-plan bleu et un texte blanc.
document.getElementById('myColoredDiv').className = 'blue';

	/*
	Faites attention : si votre élément comporte plusieurs classes (exemple : <a class="external red u">) et que vous récupérez la classe avec className, cette propriété ne retournera pas un tableau avec les différentes classes, mais bien la chaîne « external red u », ce qui n'est pas vraiment le comportement souhaité. Il vous faudra alors couper cette chaîne avec la méthode split() pour obtenir un tableau, comme ceci : */
	var classes = document.getElementById('myLink').className;
	var classesNew = [];
	classes = classes.split(' ');

	for (var i = 0, c = classes.length; i < c; i++) {
	    if (classes[i]) {
	        classesNew.push(classes[i]);
	    }
	}

	alert(classesNew);

	// classList est une propriété qui permet de consulter les classes sous forme de tableau 
		var div = document.querySelector('div');

		// Ajoute une nouvelle classe
		div.classList.add('new-class');

		// Retire une classe
		div.classList.remove('new-class');

		// Retire une classe si elle est présente ou bien l'ajoute si elle est absente
		div.classList.toggle('toggled-class');

		// Indique si une classe est présente ou non
		if (div.classList.contains('old-class')) {
		    alert('La classe .old-class est présente !');
		}

		// Parcourt et affiche les classes CSS
		var result = '';

		for (var i = 0; i < div.classList.length; i++) {
		    result += '.' + div.classList[i] + '\n';
		}

		alert(result);


//innerHTML permet de récupérer le code HTML enfant d'un élément sous forme de texte. Ainsi, si des balises sont présentes, innerHTML les retournera sous forme de texte :
var div = document.getElementById('myDiv');
alert(div.innerHTML);

// Pour éditer ou ajouter du contenu HTML, il suffit de faire l'inverse, c'est-à-dire de définir un nouveau contenu :

document.getElementById('myDiv').innerHTML = '<blockquote>Je mets une citation à la place du paragraphe</blockquote>';
// Si vous voulez ajouter du contenu, et ne pas modifier le contenu déjà en place, il suffit d’utiliser += à la place de l'opérateur d'affectation :

document.getElementById('myDiv').innerHTML += ' et <strong>une portion mise en emphase</strong>.';
// Toutefois, une petite mise en garde : il ne faut pas utiliser le += dans une boucle ! En effet, innerHTML ralentit considérablement l'exécution du code si l'on opère de cette manière, il vaut donc mieux concaténer son texte dans une variable pour ensuite ajouter le tout via innerHTML. Exemple :
var text = '';

	while ( /* condition */ ) {
	    text += 'votre_texte'; // On concatène dans la variable « text »
	}

	element.innerHTML = text; // Une fois la concaténation terminée, on ajoute le tout à « element » via innerHTML


/* Le fonctionnement de textContent est le même qu'innerHTML excepté le fait que seul le texte est récupéré, 
et non les balises. C'est pratique pour récupérer du contenu sans le balisage, petit exemple :*/
/*<body>
    <div id="myDiv">
        <p>Un peu de texte <a>et un lien</a></p>
    </div>

    <script>*/
        var div = document.getElementById('myDiv');

        alert(div.Content);
   /*</script>
</body>*/

// Ce qui nous donne bien « Un peu de texte et un lien », sans les balises




/*
Le DOM va servir à accéder aux éléments HTML présents dans un document afin de les modifier et d'interagir avec eux.
L'objet window est un objet global qui représente la fenêtre du navigateur. document, quant à lui, est un sous-objet 
de window et représente la page Web. C'est grâce à lui que l'on va pouvoir accéder aux éléments HTML de la page Web.
Les éléments de la page sont structurés comme un arbre généalogique, avec l'élément <html> comme élément fondateur.
Différentes méthodes, comme getElementById(), getElementsByTagName(), querySelector() ou querySelectorAll(), sont 
disponibles pour accéder aux éléments.
Les attributs peuvent tous être modifiés grâce à setAttribute(). Certains éléments possèdent des propriétés qui 
permettent de modifier ces attributs.
La propriété innerHTML permet de récupérer ou de définir le code HTML présent à l'intérieur d'un élément.
De leur côté, textContent et innerText ne sont capables que de définir ou récupérer du texte brut, sans aucunes 
balises HTML.
*/





/* ------------- MANIPULER LE DOM 	PART 2/2 -------------*/

// La propriété parentNode permet d'accéder à l'élément parent d'un élément. Regardez ce code :
/*<blockquote>
    <p id="myP">Ceci est un paragraphe !</p>
</blockquote>

Admettons qu'on doive accéder à myP, et que pour une autre raison on doive accéder à l'élément <blockquote>, 
qui est le parent de myP. Il suffit d'accéder à myP puis à son parent, avec parentNode*/
var paragraph = document.getElementById('myP');
var blockquote = paragraph.parentNode;


/* Concrètement, qu'est-ce qui change par rapport au DOM-0 ? Alors tout d'abord nous n'utilisons 
plus une propriété mais une méthode nommée addEventListener(), et qui prend trois paramètres 
(bien que nous n'en ayons spécifié que deux) :

- Le nom de l'événement (sans les lettres « on ») ;
- La fonction à exécuter ;
- Un booléen optionnel pour spécifier si l'on souhaite utiliser la phase de capture ou bien celle de bouillonnement. 
Nous expliquerons ce concept un peu plus tard dans ce chapitre.*/
var element = document.getElementById('clickme');

var myFunction = function() {
    alert("Vous m'avez cliqué !");
};

element.addEventListener('click', myFunction);


/*En testant cet exemple, vous avez sûrement remarqué que la propriété target renvoyait toujours l'élément déclencheur de 
l'événement, or nous souhaitons obtenir l'élément sur lequel a été appliqué l'événement. Autrement dit, on veut connaître 
l'élément à l'origine de cet événement, et non pas ses enfants.

La solution est simple : utiliser la propriété currentTarget au lieu de target. Essayez donc par vous-mêmes 
après modification de cette seule ligne, l'ID affiché ne changera jamais :*/

// Récupérer l'élément de l'événement actuellement déclenché
result.innerHTML = "L'élément déclencheur de l'événement \"mouseover\" possède l'ID : " + e.target.id;
// Récupérer l'élément à l'origine du déclenchement de l'événement
result.innerHTML = "L'élément déclencheur de l'événement \"mouseover\" possède l'ID : " + e.currentTarget.id;








// Annule l'évènement s'il est annulable, sans stopper sa propagation.
event.preventDefault();



/* --------------- LISTE DES EVENEMENTS

onabort		: 	Se déclenche lorqu'une image n'arrive pas à être complètement chargée 
				ou si son chargement est interrompu par l'utilisateur 
				Evènement s'appliquant uniquement à la balise <img>
onblur		: 	Se déclenche lorque l'élément perd le focus
onchange	: 	Se produit lorqu'une modification a lieu sur un champ de saisie
onclick		: 	Se déclenche lorsqu'un clic est fait sur l'élément
ondblclick	: 	Se déclenche lorsqu'un double clic est fait sur l'élément
ondragdrop	: 	Se déclenche lorque l'utilisateur essaie de glisser déplacer un élément dans la fenêtre. 
				Cet évènement s'applique à l'objet "window" : window.ondragdrop
onerror		: 	Se déclenche lorsqu'une erreur est rencontrée au chargement de la page. 
				Cet évènement s'applique à l'objet "window" : window.onerror
onfocus		: 	Se déclenche lorsque l'élément à le focus
onkeydown	: 
onkeypress	:
onkeyup		: 	Ces trois évènements constituent ensemble la saisie d'une touche du clavier : 
				"onkeydown" correspond à l'action d'appuyer sur une touche 
				"onkeypress" correspond à l'action de maintenir enfoncer la touche 
				"onkeyup" correspond à l'action de relacher la touche
onload		: 	Cet évènement se déclenche lorsque le document a terminé son chargement complet
onmouseover	: 
onmouseout	: 	Ces évènement se déclenchent losrque le curseur de la souris survole l'élément (onmouseover) ou bien quitte l'élément (onmouseout)
onmousemove	: 	Se déclenche losrque le curseur de la souris se déplace sur le document html
onmousedown	: 
onmouseup	: 	Ces évènement se déclenchent losrqu'un bouton de la souris est appuyé (onmousedown) ou bien relaché (onmouseup)
onreset		: 	Permet de réinitialiser les champs d'un formulaire
onresize	: 	Se déclenche lorsque l'utilisateur redimensionne la fenêtre du navigateur. 
				Cet évènement s'applique à l'objet "window" : window.onresize
onselect	: 	Se déclenche lorque l'utilisateur sélectionne du texte sur la page (si l'évènement est associé au <body> ou dans une zone de texte
onsubmit	: 	Permet de soumettre le formulaire
onunload	: 	Se déclenche lorsque le navigateur va quitter la page courante

---- */




// ---------------- AJAX -------------- 


// Creation de l'instance XHR 
// - 0 : L'objet XHR a été créé, mais pas encore initialisé (la méthode open n'a pas encore été appelée)
var xhr = new XMLHttpRequest();
// URL de destinattion
var url = "verification_user.php";
// Parametre envoyer (ex: url.php?var=1&var=2)
var params = "lorem=ipsum&name=binny";
// Objet initialisé
xhr.open("POST", url, true);
	/*
	open s'utilise de cette façon : open(sMethod, sUrl, bAsync)

	sMethod : la méthode de transfert : GET ou POST;
	sUrl : la page qui donnera suite à la requête. Ça peut être une page dynamique (PHP, CFM, ASP) ou une page statique (TXT, XML...);
	bAsync : définit si le mode de transfert est asynchrone ou non (synchrone). Dans ce cas, mettez true . 
	Ce paramètre est optionnel et vaut true par défaut, mais il est courant de le définir quand même (je le fais par habitude).

//Si vous utilisez la méthode POST, vous devez absolument changer le type MIME de la requête avec la méthode setRequestHeader , 
sinon le serveur ignorera la requête :
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

xhr.onreadystatechange = function() {// Appel de la fonction au changement d'état de l'appel Ajax
	/*
	Il faut savoir que quand on envoie une requête HTTP via XMLHttpRequest, celle-ci passe par plusieurs états différents :

	0 : L'objet XHR a été créé, mais pas encore initialisé (la méthode open n'a pas encore été appelée)
	1 : L'objet XHR a été créé, mais pas encore envoyé (avec la méthode send )
	2 : La méthode send vient d'être appelée
	3 : Le serveur traite les informations et a commencé à renvoyer des données
	4 : Le serveur a fini son travail, et toutes les données sont réceptionnées
	*/
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			reception(xhr.responseText);
			document.getElementById("loader").style.display = "none";
		} else if (xhr.readyState < 4) {
			document.getElementById("loader").style.display = "inline";
		}
}
// Envoi des parametre 
xhr.send(params);



// ---------------------------------------------------------- //

// - Manipulation du parametre 'this'

	var maFonction = function() { 
		alert("attribut: " + this.attribut); 
	}; 
	
	maFonction(); // Affiche la valeur undefined car this.attribut ne peut être résolu 
	
	// Création de l'objet obj1 et affectation de maFonction 
	var obj1 = { 
		attribut: "valeur1", 
		methode: maFonction 
	} 
	
	obj1.methode(); // Affiche la valeur de attribut, à savoir valeur1 
	
	// Création de l'objet obj2 et affectation de maFonction 
	var obj2 = { 
		attribut: "valeur2", 
		methode: maFonction 
	} 
	
	obj2.methode(); // Affiche la valeur de attribut2, à savoir valeur2 


// ----------------------------------------------------------//



// - Creation d'objet en JS


	var obj = { 
		attribut: "valeur", 
		methode: function(parametre1, parametre2) { 
			alert("parametres: " + parametre1 + ", " + parametre2); 
		} 
	} 
	
	// Affichage de la valeur de attribut de obj 
	alert("Valeur de attribut: " + obj.attribut); 
	
	// Exécution de la méthode methode de obj 
	obj.methode("valeur1", "valeur2"); 