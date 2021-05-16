<?php
session_start();
include_once "includes/connect.inc.php";
include "navbar1.php";
$sql="SELECT * from relations";
$result= mysqli_query($conn,$sql);
$check1=mysqli_num_rows($result);
$row= mysqli_fetch_array($result);

?>

<section id="main-content">
                  <section class="wrapper" style="padding:97px 8px 8px 8px;">
                  
                    <div class="row">
                      <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Admin Page</h3>
                        <ol class="breadcrumb">
                          <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                          <li><i class="fa fa-laptop"></i><a href="adminpage.php">Dashboard</a></li>
                        </ol>
                      </div>
                    </div>
                    <?php if($check1>0){ ?>
                      <h2 style="color:#007aff;"><center> <strong>Events</strong></center></h2>
                    <div class="table-responsive">
              <table  class="table1" border ="2" align = "center" style="width:55%;" >
                <tbody>
                  <tr bgcolor="#0d3c63">
                    <th><h3><strong><center>Trip Name</center></strong></h3></th>
                    <th><h3><strong><center>
                    Place
                    </center> </strong></h3></th>
                    <th><h3><strong><center>
                      Start Date
                      </center></strong></h3></th>
                    
                    
                    </center> </strong></h3></th>
                    <th><h3><strong><center>
                    Member Name
                    </center></strong></h3></th>
                    <th><h3><strong><center>
                    Member Contact
                    </center></strong></h3></th>
                   
                  </tr>
                  <?php
                  // $sql1="SELECT * from relationship";
                  // $result1= mysqli_query($conn,$sql1);
                  
                  $result= mysqli_query($conn,$sql);
                  while ($row = mysqli_fetch_array($result))
                  {
                    $sql2="SELECT * from events WHERE `eid`=".$row['eid'];
$result2= mysqli_query($conn,$sql2);
$sql3="SELECT * from member WHERE `id`=".$row['id'];
$result3= mysqli_query($conn,$sql3);
$row2=mysqli_fetch_array($result2);
$row3=mysqli_fetch_array($result3);
// var_dump($sql3);
                               echo '<tr>
                              <td>'.$row2["name"].'</td>
                              <td>'.$row2["place"].'</td>
                              <td>'.$row2["sdate"].'</td>
                              <td>'.$row3["name"].'</td>
                              <td>'.$row3["mobile"].'</td>';
                              
                           
                                echo '</tr>';
                
                }
                  ?>
                </tbody>
              </table>
              <?php }else{
                echo '</div><div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert" style="margin-left: 3.333333%;">
                No registrations!
              </div>
                      </div>';
                } 
                ?>
               
</body>

</html>