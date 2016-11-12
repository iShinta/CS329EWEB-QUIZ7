<?php
function start(){
  if(isset($_COOKIE["id"])){ //In a session
    //Recuperer les variables de la session
    echo "Logged in a session";
    showLogged();
  }else{
    echo "Not logged";
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
  </head>

  <body>
    <?php start(); ?>
  </body>
</html>
