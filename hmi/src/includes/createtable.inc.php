<?php
include "connect.inc.php";
$sql = "CREATE TABLE events(
        eid INT(2)  PRIMARY KEY, 
        name VARCHAR(30) NOT NULL,
        place VARCHAR(30) NOT NULL,
        cost INT(11) NOT NULL
        )";
        $result=mysqli_query($conn,$sql);
$sql1="ALTER TABLE `events` ADD `sdate` DATE NULL AFTER `cost`, ADD `edate` DATE NULL AFTER `sdate`;"
$result1=mysqli_query($conn,$sql1);
if ($conn->query($sql) === TRUE) {
    echo "Table employees created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql2 = "CREATE TABLE user(
    id INT(11)  PRIMARY KEY, 
    username VARCHAR(256) NOT NULL,
    password VARCHAR(256) NOT NULL,
    
    )";
    $result=mysqli_query($conn,$sql2);
$sql3="CREATE TABLE `wdl-website`.`member` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(256) NOT NULL , `mobile` VARCHAR(15) NOT NULL , `username` VARCHAR(50) NOT NULL , `address` VARCHAR(2048) NOT NULL , `pincode` INT(11) NOT NULL , PRIMARY KEY (`id`))";
$result3=mysqli_query($conn,$sql3);
$sql4="CREATE TABLE `wdl-website`.`relations` ( `eid` INT NOT NULL , `id` INT NOT NULL , `status` INT(11) NOT NULL DEFAULT '0' )";
$result3=mysqli_query($conn,$sql4);
$conn->close();
?>