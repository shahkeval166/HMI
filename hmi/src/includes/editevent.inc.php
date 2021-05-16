<?php 
session_start();
include_once 'connect.inc.php';
$id=$_GET['id'];

if (isset($_POST['submit'])) {
    
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
   
    $sdate = mysqli_real_escape_string($conn, $_POST['sdate']);
    $edate = mysqli_real_escape_string($conn, $_POST['edate']);
    $venue = mysqli_real_escape_string($conn, $_POST['venue']);
    
    if(empty($title) || empty ($venue) || empty($sdate) || empty($edate)) {
        header("Location:../edit_event.php?status=empty&ses=".$id);
        exit();
    } 
    else if ($title >= 90) {
        header("Location: ../edit_event.php?status=title&ses=".$id);
        exit();
    }
    else
    {   //all inputs are valid

       
                    $sql = "UPDATE events
                            SET name='$title', place='$venue', cost='$amount', sdate='$sdate', edate='$edate' WHERE eid=$id";
                    mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    header("Location: ../adminpage.php");
        exit();
                }
                
        


        
            }
            elseif (isset($_POST['delete']))
            {
               $sql1="DELETE FROM `events` WHERE `eid`=".$id;
               mysqli_query($conn, $sql1) or die(mysqli_error($conn));
               $sql2="DELETE FROM `relations` WHERE `eid`=".$id; 
               mysqli_query($conn, $sql2) or die(mysqli_error($conn));
               header("Location: ../adminpage.php");
        exit();
            }  

else
{
    header("Location: ../index.php");
    exit();
}
