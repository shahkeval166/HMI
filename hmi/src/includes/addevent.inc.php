<?php

session_start();
include_once 'connect.inc.php';
var_dump($_SESSION['privilege']);

if (isset($_POST['submit']) && strcmp("admin",$_SESSION['privilege'])==0) {
    

        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $edate = mysqli_real_escape_string($conn, $_POST['edate']); 
        $sdate = mysqli_real_escape_string($conn, $_POST['sdate']);     
        $venue = mysqli_real_escape_string($conn, $_POST['venue']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $banner = $_POST['banner'];
        

        // Form Validation / Error Handlers
        // Check for empty fields
        if(empty($title) || empty($edate) || empty($sdate)||empty($venue) || empty($amount) ) {
            header("Location: ../add_event.php?status=empty");
            exit();
        } 
        else {

            // 
            $imagename = $_FILES['banner']['name'];
            $target = "../images/".basename($imagename);
            
                //Insert the (banner & speaker_image)image name and image content in image_table
                if ((move_uploaded_file($_FILES['banner']['tmp_name'], $target))){
                    $sql = "INSERT INTO events(name, place, sdate, edate,cost,img) 
                            VALUES('$title','$venue','$sdate','$edate', '$amount','$imagename')";

                    mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    header("Location: ../adminpage.php");
                    exit();
                
                }
           
        }
     }else {
        //User is not admin
        header("Location: ../events.php");
        exit();
    }
//  else {
//     header("Location: ../events.php");
//     exit();
// }