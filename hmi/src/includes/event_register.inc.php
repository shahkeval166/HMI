<?php
    session_start();
    include_once 'connect.inc.php';
    $eid = $_GET['eid'];
   // $sid = $_GET['sid'];
    $mid=$_GET['mid'];
    $sql = "INSERT INTO `relations` (`eid`,`id`,`status`) VALUES ($eid,$mid,1)";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("Location: ../events.php?stat=reg");
    exit();

?>