<?php
  session_start();
  include "navbar.php"
?>

  <section id="login">
    <header class="section-header wow fadeInUp">
      <h3>Login</h3>
    </header>
    <?php
      if (isset($_SESSION['u_id'])) {
        header("Location: index.php");
      } else {
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if (strpos($url, "login=error") !== false) {
          echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
                  Invalid Email / Password
                </div>';
        } elseif (strpos($url, "login=empty") !== false) {
          echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
                  Fill out all the fields!
                </div>';
        } elseif (strpos($url, "login=blocked") !== false) {
          echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
                  User Blocked, Please Pay the fee to continue
                </div>';
        }

        echo 
        "<form class=\"center\" action=\"includes/login.inc.php\" method=\"POST\">
          <div>
            <label class=\"padding\" for=\"email\">
              <b>Email</b>
            </label>
            <br>
            <input type=\"text\" style=\"text-align: center;\" placeholder=\"Enter Email\" name=\"email\">
            <br>
            <label class=\"padding\" for=\"psw\">
              <b>Password</b>
            </label>
            <br>
            <input type=\"password\" style=\"text-align: center;\" placeholder=\"Enter Password\" name=\"pass\">
            <br>
            <br>
          </div>
          <button class=\"top mt-4 mb-3\" name=\"submit\">Login</button><br>
          <a href=\"register.php\">Register</a><br>
          </form>"; 
      }
    ?>



