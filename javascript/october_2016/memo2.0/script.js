var compareColor = [];
var i = 0;
//var card;
var lastCards = [];
var ultimatum;
var timerStatus = false;
var etat = 0;
var stockRightAnswer = [];
var resetOneCardTimer;
var colorCard = ["blue", "blue", "yellow", "yellow", "green", "green", "red", "red"];
var flipCardParam1;
var flipCardParam2;

function createCard() {
    var cardBox = document.getElementById("memoCard");
    for (var e = colorCard.length - 1; e >= 0; e--) {
        var chooseColor = Math.floor(Math.random() * colorCard.length);
        var colorChosen = colorCard[chooseColor];
        var divCard = document.createElement('div');
        divCard.setAttribute('class', "card");
        cardBox.appendChild(divCard);
        var frontCard = document.createElement('div');
        frontCard.setAttribute('class', "front");
        var backCard = document.createElement('div');
        backCard.setAttribute('class', "back");
        divCard.setAttribute('data-id', colorChosen);
        divCard.appendChild(frontCard);
        divCard.appendChild(backCard);
        backCard.style.backgroundColor = colorChosen;
        colorCard.splice(chooseColor, 1);
        divCard.addEventListener('click', function(event) {
            var thisDiv = event.currentTarget;
            var selectedBackgroundName = event.currentTarget.dataset.id;
            var divEventName = new CustomEvent(
                'divNameSelection', {
                    bubbles: true,
                    detail: {div : thisDiv, bg:selectedBackgroundName}
                });
            document.body.addEventListener('divNameSelection', function(event) {
                flipCardParam1 = event.detail.div;
                flipCardParam2 = event.detail.bg;
                flipCard(flipCardParam1, flipCardParam2);
            });
            event.currentTarget.dispatchEvent(divEventName);
        });
    }
}
function flipCard(element, color) { // au clique retourne la carte;
    var card = element;
    timerStatus = true;
    etat++;
    card.style.transform = "rotateY(180deg)";
    card.style.pointerEvents = "none";
    compareColor.push(color); // stock la couleur reçu en paramètre dans le tableau compareColor.
    i++;
    lastCards.push(card);
    compareCard();
    resetOneCardTimer = setTimeout(function() {
        resetCard();
    }, 4000);
    if ((timerStatus === true) && (etat == 1)) {
        var remainingTime = 20;
        ultimatum = setInterval(function() { //affiche le timer sur le html avec changement des données du span.
            var divTimer = document.querySelector("#timer");
            remainingTime = remainingTime - 1; // on actualise la valeur du chrono sinon on serait constamment bloqué remainingTime = 20;
            divTimer.innerHTML = remainingTime;
            etat = 3;
            if ((remainingTime == 0) && (stockRightAnswer.length < 8)) { //si chrono est à 0 et stockRightAnswer comprend moins de valeurs que le nombre de carte.
                clearInterval(ultimatum);
                var blockCard = document.querySelectorAll(".card");
                for (var o = 0; o < blockCard.length; o++) {
                    blockCard[o].style.pointerEvents = "none"; // bloque le clique sur cartes et donc supprime l'interaction onclick().
                    var resultat = document.querySelector("#finalResult");
                    resultat.innerHTML = "<h3>" + "Vous avez Perdu" + "<h3>"; // le jeu est fini.
                    reloadGame();
                }
            }
            if (stockRightAnswer.length == 8) { // si stockRightAnswer comprend 8 valeurs = le nombre de cartes du memo
                clearInterval(ultimatum); //clear le chrono
                var resultat = document.querySelector("#finalResult");
                resultat.innerHTML = "<h3>" + "Vous avez Gagné" + "<h3>"; // affiche le resultat.
                reloadGame()
            }
        }, 1000);
    }
}

function compareCard() {
    clearTimeout(resetOneCardTimer); //reset le timeout à sa valeur d'origine pour relaisser 4s avant que la première carte se retourne.
    if (i == 2) { // i++ = un clique utilisateur sur une carte
        for (var x = 0; x < compareColor.length; x++) { //compare la couleur envoyé via la fonction flipCard
            if (compareColor[0] === compareColor[1]) {
                console.log("même couleur");
                for (var z = 0; z < compareColor.length; z++) { //boucle dans le tableau compareColor et les stock dans stockRightAnswer pour compté le nombre de pair trouvée.
                    stockRightAnswer.push(compareColor[z]);
                }
                compareColor = [];
                lastCards = [];
                i = 0; // remise à zéro du clique.
            } else {
                console.log("pas la même couleur");
                setTimeout(function() {
                    resetCard();
                }, 500); // setTimeout est présent pour laisser à l'utiisateur le temps de voir la seconde carte.
                setTimeout(function() {
                    lastCards = [];
                }, 500);
            }

        }
    }
}

function reloadGame() { //recharge la page apres avoir fini le jeu.
    setTimeout(function() {
        location.reload();
    }, 3000);
}

function resetCard() { //reset les cartes ;
    for (var y = 0; y < lastCards.length; y++) {
        lastCards[y].style.transform = "rotateY(0deg)";
        lastCards[y].style.pointerEvents = "auto";
        compareColor = [];
        i = 0;
    }
}
createCard();
