<?php
function start(){
  if(isset($_COOKIE["id"])){ //In a session
    //Recuperer les variables de la session
    echo "Logged in a session";
    showLogged();
  }else{ //Is not in a session
    if(isset($_POST)){
      echo "Not in a session, Form Posted"
    }else{
      echo "Not in a session, Showing Login"
      
    }
  }
}
//
// function showLogin(){

//
// function showLogged(){
//   //Form has been submitted, check if login ok
//
// }
//
// function showLoggedOut(){
//   session_unset();
//   session_destroy();
// }
?>

<!DOCTYPE html>
<html>
  <head>
  </head>

  <body>
    <?php start(); ?>
  </body>
</html>
