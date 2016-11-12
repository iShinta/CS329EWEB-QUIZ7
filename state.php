<?php
function start(){
  if(isset($_COOKIE["id"])){ //In a session
    //Recuperer les variables de la session
    echo "Logged in a session";
    showLogged();
  }else{ //Is not in a session
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      echo "Not in a session, Form Posted";
      $username = $_SERVER[$POST["id"]];
      $password = $_SERVER[$POST["password"]];

      if($username == "guest" && $password == "welcome"){
        echo "Logged in";
      }else{
        echo "Bad username or password";
      }
    }else{
      echo "Not in a session, Showing Login";
      showLogin();
    }
  }
}

function showLogin(){ ?>
  <form method="post" action="#">
    <input type="text" name="username" />
    <input type="text" name="password" /><br />
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
