<?php
function start(){
  if(isset($_COOKIE["id"])){ //In a session
    //Recuperer les variables de la session
    echo "Logged in a session";
    showLogged();
  }else{ //Is not in a session
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      echo "Not in a session, Form Posted";
      if(isset($_POST["username"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        if($username == "guest" && $password == "welcome"){
          echo $username;
          echo $password;
          echo "Logged in";
          showLogged();
        }else{
          echo "Username".$username;
          echo "Pw".$password;
          echo "Bad username or password";
        }
      }else if(isset($_POST["logout"])){
        echo "logout";
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

function showLogged(){ ?>
  <form method="post" action="#">
    <input type="submit" name="logout" value="Log Out" />
  </form>
  <?php
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
