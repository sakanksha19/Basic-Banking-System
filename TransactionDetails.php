<?php
$servername = "fdb34.awardspace.net";
    $username = "3986264_akanksha19"; 
    $password = "u-nudn587BdR72a}"; 
    $dname = "3986264_akanksha19";  
$con = new mysqli($servername, $username, $password, $dname); 
if ($con->connect_error) { 
  die("Connection failed: " . $con->connect_error); 
} 
$sql = "SELECT * FROM history" ;
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History Details</title>
        <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
               padding-top: 100px;
               font-size:24px;
               padding-bottom: 100px;
               background: blanchedalmond;
              }
        .container{      
            padding-top:5px;
            display: block;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            width: 60%; 
        }
        td,th { border: 1px solid #ddd; padding: 8px;}
        #Table{ font-family: Arial, sans-serif; border-collapse: collapse; margin-bottom: 15px;}
        #Table tr:nth-child(even){ background-color: #d2d3d4; }
        #Table tr:nth-child(odd){ background-color: #dee2e3; }
        #Table tr:hover{ background-color: green; }
        #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color: #608fb3; color:white; }
        footer {
            background-color: black;
            position: absolute;
            left: 0;
            bottom: 0;
            height: 120px;
            width: 100%;
        }
    </style>
</head>

<body>
<img src="bankinghub.jpg" alt="bank" style= "width:100%; height: 85%; position: absolute; z-index:-1; opacity: 0.7; padding-top: 0px">
  <?php include('navbar.php'); ?>
	<div class="container">
        <h2 style="text-align: center; padding-top: 0px; font-size: 50px">Transaction History Details</h2>
       <br>
       <div>
    <table id = "Table">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Payer Name</th>
                <th>Payer Acc No</th>
                <th>Payee Name</th>
                <th>Payee Acc No</th>
                <th>Amount Paid</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
        <?php
    while($row = $result->fetch_assoc()) { 
  ?> 
 <tr>
        <td><?php echo $row['sno']; ?></td>
        <td><?php echo $row['payer']; ?></td>
        <td><?php echo $row['payerAcc']; ?></td>
        <td><?php echo $row['payee']; ?></td>
        <td><?php echo $row['payeeAcc']; ?></td>
        <td><?php echo $row['amount']; ?></td>
        <td><?php echo $row['time']; ?></td>
        </tr>
 <?php
    }
  
$con->close();
?> 
</
</table>
    </div>
</div>
<footer style="padding-top: 2px; text-align: center; color: white">
    <p style="font-size: 15px">Designed by: Akanksha Shukla</p>
    <p style="font-size: 15px">Contact Number: 8303.....X</p>
    <p style="font-size: 15px">E-mail: aka......@gmail.com</p> 
</footer>
<body>
</html>
