<?php
function start(){
  if(isset($_COOKIE["id"])){ //In a session
    //Recuperer les variables de la session
    showLogged();
  }else{ //Is not in a session
    if(isset($_POST)){

    }else{
      showLogin();
    }
  }
}

function showLogin(){ ?>
  <form>
    <input type="text" name="username" />
    <input type="text" name="password" />
    <input type="submit" name="submit" value="Submit" />
    <input type="reset" name="reset" value="Reset" />
  </form>
<?php }

function showLogged(){
  //Form has been submitted, check if login ok

}

function showLoggedOut(){
  session_unset();
  session_destroy();
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
