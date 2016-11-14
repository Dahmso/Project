
<!doctype html>
        <html lang="fr">
        <head>
        <link rel="stylesheet" href="./material.min.css">
        <script src="./material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="styles.css" media="screen" charset="utf-8">
        <title>QCM - PHP</title>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row mdl-color--brown">
      <span class="mdl-layout-title">
        | PHP - Question à Choix Multiple |
      </span>
    </div>
    </header>
    
    <main class="mdl-layout__content">
    <div class="page-content">
<?php 
 session_start();
 if((!isset($_SESSION['score'])) || (isset($_GET['pageId']) == 0))  
 $_SESSION['score'] = 0;
$questions = [
    [
        "question" => 'De quelle couleur est le cheval blanc d\'Henri IV ? :',
        "choix" => [
    	"Blanc",
    	"Rouge",
    	"Vert"
        ],
        "valeur"=>
        [ 
            "blanc", "rouge", "vert"
        ],
        "reponse"=> "blanc",
        "titre" => "Le Cheval d'Henri"
    ],
     [
        "question" => 'Combien y a t\'il de 7 nains ? :',
        "choix" => [
    	"42", 
    	"7", 
    	"5"
        ],
        "valeur"=>
        [    
            "deux", "sept", "cinq"
        ],
        "reponse"=> "sept",
        "titre" => "Les Nains"
    ], 
    [
        "question" => 'lequel de ces symboles est celui de la tour Eiffel ?',
        "choix" => [
    	"arc.png", 
    	"liberte.png", 
    	"eiffel.png"
        ],
        "valeur"=>
        [    
            "arc", "liberte", "eiffel"
        ],
        "reponse"=> "eiffel",
        "titre" => "Les Monuments"
    ],
    [
        "question" => 'Combien y a t\'il de 40 voleurs ? :',
        "choix" => [
    8, 7, 40
        ],
        "valeur"=>
        [    
            "huit", "sept", "quarante"
        ],
        "reponse"=> "quarante",
        "titre" => "Les Voleurs"
    ],
    [
        "question" => 'Lequels de ces drapeaux est le drapeaux de la France ?',
        "choix" => [
    "france.png", "algerie.png", "niger.png"
        ],
        "valeur"=>
        [    
            "France", "Algerie", "Niger"
        ],
        "reponse"=> "France",
        "titre" => "les Drapeaux :"
    ]
];
$pageId = isset($_GET['pageId']) ? intval($_GET['pageId']) : 0;
if ($pageId == count($questions) ) {
    echo "<div class=\"mdl-card mdl-cell mdl-cell--12-col\" style=\"margin-top:5%;\">Votre Score sur cette Session est de ".$_SESSION['score']." bonne(s) réponse(s) sur ".count($questions) ;
    echo " <a class=\"reset\"href=\"index.php\">Restart</a>"."</div>";
    session_reset();
    session_unset();
    session_destroy();
} else {
    if( isset($_GET['reply'])){
        $nextPageId = $pageId + 1;
        $reponseDonnee = $_GET['reply'];
        $reponseAttendue = $questions[$pageId]["reponse"];

        if ($reponseAttendue == $reponseDonnee) { 
            $_SESSION['score'] ++;
            header('location:index.php?pageId='.$nextPageId);
        } else { 
            header('location:index.php?pageId='.$nextPageId);  
        }

        $currentQuestion = $questions[$pageId];

    }
}
    ?> 
    <?php 
    if ($pageId < count($questions) ){
    $currentQuestion = $questions[$pageId];
    ?>
    <div class="mdl-card mdl-cell mdl-cell--12-col">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text"><?php echo  $questions[$pageId]['titre']  ?></h2>
  </div>
  <div class="mdl-card__supporting-text">
    <h4> <?php echo $currentQuestion['question'] ?></h4>
    <form class="qcm" action="" method="get">
    <?php 
    for ($i=0; $i < count($questions[$pageId]["choix"]) ; $i++) {
        if (preg_match("/png/i" , $questions[$pageId]["choix"][$i])) {
        ?>
        <label class="mdl-radio mdl-js-radio">
            <input  checked class="mdl-radio__button"  type="radio" name="reply" value='<?php echo $questions[$pageId]["valeur"][$i]; ?>' />
            <span class="mdl-radio__label"><img src='<?php echo $questions[$pageId]["choix"][$i]; ?>'></span>
        </label>
        <?php          
        } else {
        	?>
             <label class="mdl-radio mdl-js-radio">
            <input  checked class="mdl-radio__button"  type="radio" name="reply" value='<?php echo $questions[$pageId]["valeur"][$i]; ?>' />
            <h2><?php echo $questions[$pageId]["choix"][$i]; ?> </h2>
        	</label>
        <?php
        } 
    }
   	?>
  </label>
        <input type="hidden" name="pageId"
               value="<?php echo $pageId; ?>">
               <div class="mdl-layout-spacer"></div>
               <div class="mdl-card__actions mdl-card--border">
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-color--amber mdl-color-text--white" type="submit">Valider</button>
    </form>
  </div>
  </div>
</div>
<?php 
}
 ?>
</div>
  </main>
  </div>
</body>
</html>