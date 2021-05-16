<?php
session_start();
include_once "includes/connect.inc.php";
include "navbar.php";
$sql="SELECT * from events ";
$result= mysqli_query($conn,$sql);
$check1=mysqli_num_rows($result);
$sql1="SELECT * from relations WHERE id=".$_SESSION['id'];
                  $result1= mysqli_query($conn,$sql1);
                  $check2=mysqli_num_rows($result1);              

?>
<section id="main-content">
                  <section class="wrapper" style="padding:99px 8px 8px 8px;">
                  
                   
                    <?php if($check1>0 || $check2>0){ ?>
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
                    <th><h3><strong><center>
                    Banner
                    </center></strong></h3></th>
                    <th><h3><strong><center>
                    Register?
                    </center></strong></h3></th>
                   
                  </tr>
                  <?php
                  
                  while ($row = mysqli_fetch_array($result))
                  {
                    $row2 = mysqli_fetch_array($result1);
                   
                    
                               echo '<tr>
                              <td>'.$row["name"].'</td>
                              <td>'.$row["place"].'</td>
                              <td>'.$row["sdate"].'</td>
                              <td>'.$row["edate"].'</td>
                             
                              <td>'.$row["cost"].'</td>
                              <td><img src=images/'.$row["img"].' style="width:100%;"></td>';
                              if(strcmp("student",$_SESSION['privilege'])==0)
                {
                  if($row2['status']==1 || $row2['status']==2 || $row2['status']==3 )
                  {
                
                echo '<td>
                  Already Registered</td>';

                }
                else{
                  echo '<td><button class="btn btn-primary" onclick="window.location.href =\'includes/event_register.inc.php?mid='.$_SESSION['id'].'&eid='.$row['eid'].'\'"type="button" style="margin-right:1%;">
                  <i class="fa fa-plus"></i>
                  Register</button></td>';
                }}
                elseif(strcmp("student",$_SESSION['privilege'])!=0 && strcmp("admin",$_SESSION['privilege'])!=0)
                {
                  echo'<td><li style="padding-bottom: 5px;">Login to register</li></td>';
                }
                
                  if(strcmp("admin",$_SESSION['privilege'])==0)
                    {
                      echo'<td><button class="btn btn-primary" onclick="window.location.href =\'edit_event.php?ses='.$row['eid'].'\'" type="button"><i class="fa fa-pencil"></i>EDIT</button></td>';
                    }
                            //   echo'<td><a href="includes/event_register.inc.php?ses='.$row['id'].'">Register</a></td>
                            //       ';
                                  
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