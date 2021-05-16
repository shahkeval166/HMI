<?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
error_reporting(0);
if(!strcmp("admin",$_SESSION['privilege'])==0)
{
  header("Location:index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tours and Travels</title>
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

 
  <header id="header"  style="background-color: #002544">
    <div class="container-fluid">

     
      <nav id="nav-menu-container">
        <ul class="nav-menu">
        <li style="margin-top:-5.5%;">
        <a class="mt-1"style="font-size:330%;" href="javascript:history.go(-1)" title="Return to the previous page">&larr;</a></li>
        
          <li class="<?php if(strpos($url,'index.php')!==false) echo ' menu-active'; ?>"><a href="index.php">Home</a></li>
        <li class="<?php if(strpos($url,'add_event.php')!==false) echo ' menu-active'; ?>"><a href="add_event.php">Events</a></li>
        <li class="<?php if(strpos($url,'add_event.php')!==false) echo ' menu-active'; ?>"><a href="registrations.php">Registrations</a></li>
        <li class="<?php if(strpos($url,'add_event.php')!==false) echo ' menu-active'; ?>"><a href="chart.php">Charts</a></li>
                                    
          
          <li class="menu-active"><a href="includes/logout.inc.php">Log out</a></li>
            
        
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->