<?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Shah Tours and Travels</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="logo/favicon.jpeg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header"  style="background-color: #29716896">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        
        <a href="index.php"><img src="logo/logo.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
        <li style="margin-top:-5.5%;">
        <a class="mt-1"style="font-size:330%;" href="javascript:history.go(-1)" title="Return to the previous page">&larr;</a></li>
        
          <li class="<?php if(strpos($url,'index.php')!==false) echo ' menu'; ?>"><a href="index.php">Home</a></li>
          

          <li class="<?php if(strpos($url,'events.php')!==false) echo ' menu-active'; ?>"><a href="events.php">Events</a></li>
                                    
          </li>
          
        <li class="<?php if(strpos($url,'Contact.php')!==false) echo ' menu'; ?>"><a href="Contact.php">Contact</a></li>

        <!-- <li class="<?php // if(strpos($url,'gallery.php')!==false) echo ' menu-active'; ?>"><a href="gallery.php">Gallery</a></li> -->

        <?php
              if(isset($_SESSION['id'])) {
               
                  
                
                  
                
                echo '<li>
                        <a href="includes/logout.inc.php">Logout</a>
                      </li>
                  </ul>';
              } 
              
              else { 
               
                //User is not signed in
                echo'
                <li class="menu"><a href="register.php">Register</a></li>
                <li class="menu"><a href="login.php">Login</a></li>';
              
                
              
            }
              ?>
       
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->