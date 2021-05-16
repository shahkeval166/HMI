<?php
session_start();
include_once "includes/connect.inc.php";
include "navbar1.php";
$sql="SELECT * from events ";
$result= mysqli_query($conn,$sql);
$check1=mysqli_num_rows($result);

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
              <table  class="table" border ="2" align = "center" style="width:55%;" >
                <tbody>
                  <tr bgcolor="#0d3c63">
                    <th><h3><strong><center>Trip Name</center></strong></h3></th>
                    <th><h3><strong><center>
                    Place
                    </center> </strong></h3></th>
                    <th><h3><strong><center>
                      Start Date
                      </center></strong></h3></th>
                    
                    <th><h3><strong><center>
                    End Date
                    </center> </strong></h3></th>
                    <th><h3><strong><center>
                    Amount
                    </center></strong></h3></th>
                   
                   
                  </tr>
                  <?php
                  // $sql1="SELECT * from relationship";
                  // $result1= mysqli_query($conn,$sql1);
                  
                  
                  while ($row = mysqli_fetch_array($result))
                  {
                   
                               echo '<tr>
                              <td>'.$row["name"].'</td>
                              <td>'.$row["place"].'</td>
                              <td>'.$row["sdate"].'</td>
                              <td>'.$row["edate"].'</td>
                             
                              <td>'.$row["cost"].'</td>';
                              
                           
                                echo '</tr>';
                
                }
                  ?>
                </tbody>
              </table>
              <?php }else{
                echo '</div><div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert" style="margin-left: 3.333333%;">
                No session!
              </div>
                      </div>';
                } 
                ?>
               
</body>

</html>