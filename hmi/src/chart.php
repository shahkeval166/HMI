<?php
session_start();
include_once "includes/connect.inc.php";
include "navbar1.php";
 if (0) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT eid,COUNT(eid) FROM `relations` GROUP BY eid";
         $result = mysqli_query($conn,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
            $sql1="SELECT * FROM events WHERE eid=".$row['eid'];
            // var_dump($row['COUNT(eid)']);
            $res1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_array($res1);
            $productname[]  = $row1['name']  ;
            $sales[] = $row['COUNT(eid)'];
            // var_dump($productname);
            // var_dump($sales);
        }
 
 
 }
 
 
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="width:60%;hieght:20%;text-align:center;margin-top:10%;">
            <h2 class="page-header" >Registrations Reports </h2>
            <div> </div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
                    scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
                }
                });
    </script>
</html>