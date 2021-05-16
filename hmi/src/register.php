<?php
  session_start();
  if(isset($_SESSION['u_id'])) {
    //User is logged in
    header("Location: index.php");
    exit();
  }
  include "navbar.php"
?>

  <section id="login">
    <header class="section-header wow fadeInUp">
      <h3>Membership Form</h3>
    </header>

    <?php
    
      $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      if (strpos($url, "signup=empty") !== false) {
        echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
                Fill out all the fields!
              </div>';
      } elseif (strpos($url, "signup=invalid")!== false) {
        echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                Invalid Characters in Name
              </div>';
      } elseif (strpos($url, "signup=email")!== false) {
        echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                Invalid Email
              </div>';
      } elseif (strpos($url, "signup=taken")!== false) {
        echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                User already exists
              </div>';
      } elseif (strpos($url, "signup=pass")!== false) {
        echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                The passwords do not match
              </div>';
      } elseif (strpos($url, "signup=len")!== false) {
        echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                Password too short (min. 8 char)
              </div>';
      } elseif (strpos($url, "signup=contact")!== false) {
        echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                Invalid Phone no
              </div>';
      } elseif (strpos($url, "signup=address")!== false) {
        echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                Address too long (max. 70)
              </div>';
      } elseif (strpos($url, "signup=pincode")!== false) {
        echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                Invalid Pincode
              </div>';
      } elseif (strpos($url, "signup=success")!== false) {
        // Wait for 5 seconds and then redirect user to login page
        header("refresh:2; url=login.php");
        echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-success">Account created, Redirecting..</div>';
      } 
      //Focus on ip tag and add div container

    ?>

      
      <form class="contact-form center" action="includes/register.inc.php" method="POST" enctype="multipart/form-data">
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="form">
          <div class="form-row">
            <div class="form-group offset-md-1 col-md-3 mt-2">
              <label for="lastname">Name</label>
    </div>
              <div class="form-group col-md-6">
              <?php
              if(isset($_SESSION['formFilled']))
              echo'<input id="lastname" type="text" name="lastname" class="form-control" value="'.$_SESSION['lastname'].'" placeholder="Enter Lastname"/>';
              else
              echo'<input id="lastname" type="text" name="lastname" class="form-control" placeholder="Enter name"/>' 
              ?>
              </div>
    </div>
                  <div class="form-row">
    <div class="form-group offset-md-1 col-md-3 mt-2">
              <label for="email">Email</label>
    </div>
                        <div class="form-group col-md-6">
                        <?php if(isset($_SESSION['formFilled']))
                          echo'<input type="email" class="form-control" name="email" value="'.$_SESSION['email'].'" placeholder="Enter Email Id"/>';
                          else
                          echo'<input type="email" class="form-control" name="email" placeholder="Enter Email Id"/>';
                          ?>
    </div>
                        </div>
                        <div class="form-row"> 
    <div class="form-group offset-md-1 col-md-3 mt-2">
              <label for="password">Password</label>
    </div>
                        <div class="form-group col-md-3">
                          <input type="password" name="pass" class="form-control" placeholder="Enter Password (min. 8)"/>
             
                        </div>
                        <div class="form-group col-md-3">
                          <input type="password" class="form-control" name="repass" placeholder="Confirm Password"/>
             
                        </div>
          
                    </div>
                    <div class="form-row">
                    <div class="form-group offset-md-1 col-md-3 mt-2">
              <label for="contact">Mobile Number</label>
    </div>   
                            <div class="form-group col-md-6">
                            <?php if(isset($_SESSION['formFilled']))
                              echo'<input type="text" title="Enter a Valid Phone Number" value="'.$_SESSION['contact'].'" class="form-control" name="contact" placeholder="Enter Mobile Number"/>';
                              else
                              echo'<input type="text" title="Enter a Valid Phone Number" class="form-control" name="contact" placeholder="Enter Mobile Number"/>';
                              ?>
                     
                            </div>
    </div>
    <div class="form-row">
                    <div class="form-group offset-md-1 col-md-3 mt-4">
              <label for="address">Address</label>
    </div>
                            <div class="form-group col-md-6">
      
                                    <textarea class="form-control" name="address" rows="3" placeholder="Enter Your Address"></textarea>
                     
                            </div>
    </div>
    <div class="form-row">
                    <div class="form-group offset-md-1 col-md-3 mt-2">
              <label for="pincode">Pincode</label>
    </div>   
                            <div class="form-group col-md-6">
                            <?php if(isset($_SESSION['formFilled']))
                              echo'<input type="text" title="Enter a Valid Pincode" value="'.$_SESSION['pincode'].'" class="form-control" name="pincode" placeholder="Pincode"/>';
                              else
                              echo'<input type="text" title="Enter a Valid Pincode" class="form-control" name="pincode" placeholder="Pincode"/>';
                              ?>
                     
                            </div>
              
                          </div>
            <div class="form-row mt-5">
            
            <button class="top col-md-2 offset-md-3" type="reset">Reset</button>
          
            <div class="col-md-1">

            </div>
            
            <button class="top col-md-2" onclick="myFunction()" style="padding: 5px 20px" type="submit" name="submit">Register</button>
    
          </div>
    </form>
      </div>
    </section><!-- #contact -->


