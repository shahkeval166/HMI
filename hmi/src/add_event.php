<?php
    session_start();

    if(isset($_SESSION['privilege'])) {
      if(strcmp($_SESSION['privilege'], "admin") !== 0) {
          // User is not an admin
        //   header("Location: events.php");
        //   exit();
      }
    } 
    include "navbar1.php";
?>

  <section id="login">
    <header class="section-header wow fadeInUp">
      <h3>Add Event</h3>
    </header>

    <div class="container col-sm-8 offset-sm-2 px-10">
      <form action="includes/addevent.inc.php" class="form-signin" method="POST" enctype="multipart/form-data">
          
        <div class="row">
          <input type="hidden" class="hundred" name="size" value="1000000">
        </div>
        <div class="row">
          <input name="title" class="hundred mx-3 mb-3" type="text" placeholder="Title">
        </div>
        
        <div class="row">
          <input name="sdate" class="hundred mx-3 mb-3" type="date" placeholder="Start Date">
        </div>
        <div class="row">
          <input name="edate" class="hundred mx-3 mb-3" type="date" placeholder="End Date">
        </div>
        <div class="row">
          <input name="venue" class="hundred mx-3 mb-3" type="text" placeholder="Venue">
        </div>
        
        <div class="row">
          <input name="amount" class="hundred mx-3 mb-3" type="text" placeholder="Amount">
        </div>
        
        
        
        <div class="row">
         Banner:<input name="banner" class="hundred mx-3 mb-3" type="file">
        </div>
        <!-- <div class="row">
          Speaker's Image:<input name="speaker_image" class="hundred mx-3 mb-3" type="file">
        </div> -->
        <div class="row">
          <button name="submit" class="top mx-auto mb-5">Submit</button>
        </div>
      </form>
    </div>


