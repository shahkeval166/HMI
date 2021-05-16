<?php
session_start();
include_once "connect.inc.php";

if(isset($_POST['submit'])) {
    
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $n=2;
      
    if(empty($email) || empty($pass)) {
      header("Location: ../login.php?login=empty");
      exit(); 
    }
    else{
        $sql="SELECT * FROM user WHERE username='$email';"; 
         $result=mysqli_query($conn,$sql)or die("connection failed");
         $sql1="SELECT * FROM member WHERE username='$email';"; 
         $result1=mysqli_query($conn,$sql1)or die("connection failed");
         
        if($row = mysqli_fetch_assoc($result)) {
          
            // Dehashing the password
            $hashedPassCheck = password_verify($pass, $row['password']);
            if($hashedPassCheck == true) {
                $_SESSION['privilege'] = "admin";
                $_SESSION['id'] = $row['id'];
                header("Location: ../adminpage.php");
                exit();

                }else{
                    header("Location: ../login.php?login=error");
                    exit();
                }
    
            }
        elseif($row1 = mysqli_fetch_assoc($result1)){
            
            $hashedPassCheck = password_verify($pass, $row1['password']);
            if($hashedPassCheck == true) {
                $_SESSION['privilege'] = "student";
                $_SESSION['id'] = $row1['id'];
                $_SESSION['name'] = $row1['name'];
                
                $_SESSION['mobile'] = $row1['mobile'];
                $_SESSION['email'] = $row1['username'];
               
                header("Location: ../events.php");
                exit();
           
                }
                else{
                    header("Location: ../login.php?login=error");
                    exit();
                }
    }
    else{
        header("Location: ../login.php?login=error");
        exit();
    }
}
}
else{
    header("Location: ../login.php");
    exit();
}
?>
