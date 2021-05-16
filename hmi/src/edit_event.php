<?php
session_start();
include "navbar.php";
include_once "includes/connect.inc.php";
$id=$_GET['ses'];

?>
<section id="login">
    <header class="section-header wow fadeInUp">
      <h3>Edit Event</h3>
    </header>
    <?php
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    
    if(strpos($url, "status=empty") !== false) {
        echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
                Fill out all the fields!
              </div>';}
              else if(strpos($url, "status=title") !== false) {
                echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
                        Title too long (more than 90 characters)
                      </div>';}
    $query= "SELECT * FROM events where eid=$id";
    $result=mysqli_query($conn, $query) or die(mysqli_error($conn));

    $row = mysqli_fetch_array($result);
    echo '<div class="container col-sm-8 offset-sm-2 px-10">';
    echo '<form action="includes/editevent.inc.php?id='.$id.'" method="POST" >
        <input type="hidden" name="size" value="1000000">';
    ?>

    <?php
    echo'<div style="padding-top:15px;align="center"><strong><center><label>Tour Title:</label></center></strong></div>';?>
    <center><input class="in" type="text" name="title" value="<?php echo $row['name'];?>" ></center>
    <?php
    echo '<div style="padding-top:15px;"><strong><center><label>Venue</label></center></strong></div>';
    echo '<div style="padding-top:15px;"><center><input type="text" class="in" name="venue" value=' . $row['place'] . '></center></div>';
    echo '<div style="padding-top:15px;"><strong><center>Amount</center></strong></div>';
    echo "<center><input type='text' class='in' name=\"amount\" value=" . $row['cost'] . "></center>";
   
    echo '<strong><center><div style="padding-top:15px;">Start date:</div></center></strong>';
    echo "<center><input class='in' type=\"date\" name=\"sdate\" value=" . $row['sdate'] . "></center>";
    echo '<strong><center><div style="padding-top:15px;">End date:</div></center></strong>';
    echo "<center><input class='in' type=\"date\" name=\"edate\" value=" . $row['edate'] . "></center>";
    
    echo '<center><div style="padding-top:15px;"><button name="submit" value="submit">Update</button></div></center>';
    echo '<center><div style="padding-top:15px;"><button name="delete" value="delete">Delete</button></div></center>';
    echo "<br>";
    echo "<br>";
    echo "</form>";
    echo '</div>';
  
  ?>