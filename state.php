<?php
function start(){
  if(isset($_COOKIE["id"])){ //In a session
    //Recuperer les variables de la session
    // echo "Logged in a session";
    showLogged();
  }else{ //Is not in a session
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      //echo "Not in a session, Form Posted";
      if(isset($_POST["username"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        if($username == "guest" && $password == "welcome"){
          echo "Login Succeeded. Welcome ".$username. ".";
          showLogged();
        }else{
          echo "Login Failed.<br />Bad username or password";
          echo "<br />You entered username: ".$username;
          echo "<br />and Password: ".$password;
          echo "<br /><a href=\"http://zweb.cs.utexas.edu/users/cs329e-fa16/minhtri/quiz7/state.php\"> Back to the form </a>";
        }
      }else if(isset($_POST["logout"])){
        // echo "logout";
        showLoggedOut();
      }
    }else{
      // echo "Not in a session, Showing Login";
      showLogin();
    }
  }
}

function showLogin(){ ?>
  <p>Please Log In</p>
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
  echo "<p>Thank You. You are now logged out</p>";
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
