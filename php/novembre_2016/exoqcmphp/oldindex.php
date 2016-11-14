<?php 
 session_start();
 if((!isset($_SESSION['score'])) || (isset($_GET['pageId']) == 0))  
 $_SESSION['score'] = 0;
$questions = [
    [
        "question" => 'De quelle couleur est le cheval blanc d\'Henri ?',
        "choix" => 
        [
    "https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=150", "https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=150", "https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=150"
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
    "https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=150", "https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=150", "https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=150"
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
    "https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=150", "https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=150", "https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=150"
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
    <!doctype html>
    <html lang="fr">
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    
    <?php 
    if ($pageId < count($questions) ){
    $currentQuestion = $questions[$pageId];
    echo "<h1>" . $questions[$pageId]['titre'] . "</h1>";
    echo "<h1>" . $currentQuestion['question'] . "</h1>";

    ?>
    <form action="" method="get">
      <label>
     <input type="radio" name="reply" value='<?php echo $questions[$pageId]["valeur"][0]; ?>' />
    <img src='<?php echo $questions[$pageId]["choix"][0]; ?>' >
  </label>
    <label>
     <input type="radio" name="reply" value='<?php echo $questions[$pageId]["valeur"][1]; ?>' />
    <img src='<?php echo $questions[$pageId]["choix"][1]; ?>'>
  </label>
    <label>
     <input type="radio" name="reply" value='<?php echo $questions[$pageId]["valeur"][2]; ?>' />
    <img src='<?php echo $questions[$pageId]["choix"][2]; ?>'>
  </label>
        <input type="hidden" name="pageId"
               value="<?php echo $pageId; ?>">
        <button class="validation" type="submit" name="add" value="add">Valider</button>
    </form>

<?php 
}
 ?>
</body>
</html>