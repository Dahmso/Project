
<!doctype html>
    	<html lang="fr">
    	<head>
    	<link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.brown-amber.min.css" />
    	<link rel="stylesheet" href="./material.min.css">
		<script src="./material.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    	<link rel="stylesheet" href="style.css" media="screen" charset="utf-8">
		<title>QCM - PHP</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row mdl-color--brown">
      <span class="mdl-layout-title">
         | PHP - QCM |
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
        "question" => 'De quelle couleur est le cheval blanc d\'Henri ?',
        "choix" => 
        [
    "https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97150&w=150&h=150", "https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97150&w=150&h=150", "https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97150&w=150&h=150"
        ],
        "valeur"=>
        [ 
            "blanc", "rouge", "vert"
        ],
        "reponse"=> "blanc",
        "titre" => "Le Cheval d'Henri"
    ],
     [
        "question" => 'Combien y a t\'il de 7 nains ?',
        "choix" => [
    "https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97150&w=150&h=150", "https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97150&w=150&h=150", "https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97150&w=150&h=150"
        ],
        "valeur"=>
        [    
            "deux", "sept", "cinq"
        ],
        "reponse"=> "sept",
        "titre" => "Les Nains"
    ], [
        "question" => 'Combien y a t\'il de 40 voleurs ?',
        "choix" => [
    "https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97150&w=150&h=150", "https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97150&w=150&h=150", "https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97150&w=150&h=150"
        ],
        "valeur"=>
        [    
            "huit", "sept", "quarante"
        ],
        "reponse"=> "quarante",
        "titre" => "Les Voleurs"
    ]
];

$pageId = isset($_GET['pageId']) ? intval($_GET['pageId']) : 0;
if ($pageId == count($questions) ) {
    echo "<p>Votre Score sur cette Session est de ".$_SESSION['score']."</p>";
    session_reset();
    session_unset();
    session_destroy();
    echo "<h1>Terminé</h1>";
} else {
    if( isset($_GET['reply'])){
        $nextPageId = $pageId + 1;
        $reponseDonnee = $_GET['reply'];
        // echo "<p>Réponse donnée à la question $pageId : ".$reponseDonnee."</p>";
        $reponseAttendue = $questions[$pageId]["reponse"];

        if ($reponseAttendue == $reponseDonnee) { 
            $_SESSION['score'] ++;
            $success = true;
            header('location:index.php?pageId='.$nextPageId);
        } else { 
            $success = false;
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
      <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
     <input  checked class="mdl-radio__button "  type="radio" name="reply" value='<?php echo $questions[$pageId]["valeur"][0]; ?>' />
    <img src='<?php echo $questions[$pageId]["choix"][0]; ?>' >
  </label>
    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
     <input  checked class="mdl-radio__button "  type="radio" name="reply" value='<?php echo $questions[$pageId]["valeur"][1]; ?>' />
    <img src='<?php echo $questions[$pageId]["choix"][1]; ?>'>
  </label>
    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
     <input  checked class="mdl-radio__button "  type="radio" name="reply" value='<?php echo $questions[$pageId]["valeur"][2]; ?>'/>
    <img src='<?php echo $questions[$pageId]["choix"][2]; ?>' >
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