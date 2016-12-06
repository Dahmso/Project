<?php 
$page = 'chat';
include("login.php");
?>

<?php 
     function pleaseLogIn(){
      echo '
      <dialog class="mdl-dialog" open>
    <h4 class="mdl-dialog__title mdl-color-text--primary"><i>Oops !</i></h4>
    <div class="mdl-dialog__content">
      <p>
        On dirait qu\'il n\'y a aucune <strong>session active</strong>.<br>
        Merci de vous <strong>identifier</strong> pour pouvoir utiliser le Chat.
      </p>
    </div>
    </dialog>';
      }
     ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./material/material.min.css">
  <script src="./material/material.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.pink-indigo.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <link rel="stylesheet" href="style.css" media="screen" charset="utf-8">

  <title>Home</title>
</head>
<body  <?php  if (isset($_GET['errorlog'])){ 
  
    echo 'onload="setTimeout(snackBar, 500)"';  }
?>>
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row mdl-color--primary">
      <!-- Title -->
      <i class="material-icons" id="titleicon">terrain</i>
      <a class="mdl-navigation__link" id="titlelink" href="index.php">
      <span class="mdl-layout-title">Simpl'Chat</span>
      </a>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <nav class="mdl-navigation mdl-layout--large-screen">
        <a class="mdl-navigation__link" id="hidebutton" href="chat.php">Chat</a>
        <a class="mdl-navigation__link" id="hidebutton" href="">Github</a>
         <?php 
        if (isset($_SESSION['name'])) { 
         ?>
        <a class="mdl-navigation__link" href="logout.php?chat" id="logout" >
       <button id="loginbutton" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  mdl-color--red mdl-color-text--white">
        <i class="material-icons">lock_open</i>
        <strong>Log out</strong>
        </button>
        </a>
       
        <?php 
        
         } else {
           
         ?>

         <button id="loginbutton" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  mdl-color--light-green mdl-color-text--white">
        <i class="material-icons">lock_outline</i>
        <strong>Login</strong>
        </button>

         <?php 

          
           }

          ?>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Simpl'Chat</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="chat.php">Chat</a>
      <a class="mdl-navigation__link" href="">Github</a>
      <a class="mdl-navigation__link" href="">Contact</a>
    </nav>
  </div>
  <main class="mdl-layout__content mdl-color--grey-100">
    <div id="formglobal" data-toggle="false">
    <div class="mdl-card mdl-shadow--6dp" id="globallogin">
      <div class="mdl-card__supporting-text">
        <form id="login_form"  method="post">
          <div class="mdl-textfield mdl-js-textfield" id="inputoverall">
            <i class="material-icons">person_outline</i>
            <input class="mdl-textfield__input" type="text" id="username" name="username"/>
            <label class="mdl-textfield__label" for="username">Username</label>
          </div>
          <div class="mdl-textfield mdl-js-textfield" id="inputoverall">
            <i class="material-icons">lock_outline</i>
            <input class="mdl-textfield__input" type="password" id="userpassword" name="password"/>
            <label class="mdl-textfield__label" for="userpassword">Password</label>
          </div>
          <div id="flexboard">
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--light-green mdl-color-text--white" type="submit">Log in</button>
          <div class="mdl-layout-spacer"></div>
          <span class="invalideidboard">
              <span class="invalideidinput"></span>
          </span>
          </div>
        </form>
      </div>
    </div>
    </div>
    <div class="page-content">
    <div id="toast" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>
  

     <?php 
     if (!isset($_SESSION['name'])) {
      pleaseLogIn();
     }
     else {


      ?>
    <div id="wrapper">
    <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
  <main class="mdl-layout__content">
    <div class="mdl-card mdl-shadow--6dp" id="chatwindow">
      <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text" id="bienvenue">Bienvenue, <?php echo " ".$_SESSION['name']; ?></h2>
          <div class="mdl-layout-spacer"></div>
      </div>
      <div  id="chatbox">
        <?php 
        if (file_exists("chatlog.html") && filesize("chatlog.html") > 0) {
          $receiveContent = fopen("chatlog.html", "r");  // read only
          $actualContent = fread($receiveContent, filesize("chatlog.html"));
          fclose($receiveContent);
          echo $actualContent;
        }

         ?>

      </div>
    </div>
    <div class="mdl-card2  mdl-color--white mdl-shadow--6dp" id="mdl-cardsend">
      <form name="message" action="" id="formsend" onsubmit="return false">
            <input class="mdl-textfield__input" type="text" id="usermsg" name="usermsg" />
            <div class="mdl-layout-spacer"></div>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-color--teal" name="submitmsg" type="submit" id="submitmsg">Send</button>
        </form>
      
    </div>
  </main>
</div>
</div>
    </div>
  </main>
</div>
    <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(event) {
    console.log("Document ready");
  });

    $("#submitmsg").click(function(){
        var userMessage = document.querySelector('#usermsg').value;
        $.post("post.php", { text: userMessage});             
        $("#usermsg").attr("value", "");
        loadChatLog;
        return false;
});  
function loadChatLog(){    
    $.ajax({
        url: "chatlog.html",
        success: function(html){       
            $("#chatbox").html(html);           
        },
    });
}
setInterval(loadChatLog, 2000);

    </script>
    <?php 
  }
     ?>
     <?php  if (!isset($_SESSION["name"])) {
  ?>

         <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
     <script type="text/javascript">
       var loginButton = document.querySelector("#loginbutton.mdl-button");
  loginButton.addEventListener("click", displayLogin, true);
  
  function displayLogin(e) {
      var selectForm = document.querySelector("#formglobal");
      var divWidth = document.querySelector("#globallogin").offsetWidth;
      var toggleData = selectForm.getAttribute("data-toggle");
      if (toggleData == "false") {
      selectForm.style.right ="0px";
      selectForm.setAttribute("data-toggle","true");
      return;
    } if (toggleData == "true") {
      selectForm.style.right = "-" + divWidth+4 + "px";
      selectForm.setAttribute("data-toggle","false");
      return;
    }
    //display login 
    var loginButton = document.querySelector("#loginbutton.mdl-button");
    loginButton.addEventListener("click", displayLogin, true);
  

    }
    function snackBar() {
        'use strict';
        window['counter'] = 0;
        var snackbarContainer = document.querySelector('#toast');
        snackbarContainer.style.backgroundColor = "red";
        var data = {
            message: 'Identifiant ou Mot de passe Incorrect.'
        };
        snackbarContainer.MaterialSnackbar.showSnackbar(data);
    };
     </script>
     <?php 
     } ?>

</body>
</html>