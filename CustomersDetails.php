<?php
    $servername = "";
    $username = ""; 
    $password = ""; 
    $dname = ""; 
    $con = new mysqli($servername, $username, $password, $dname); 
    if ($con->connect_error) { 
    die("Connection failed: " . $con->connect_error); 
    } 
    $sql = "SELECT * FROM accountdetails" ;
    $result = $con->query($sql);
?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>    
 
  <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
               padding-top: 60px;
               font-size:25px;
               padding-bottom: 100px;
               background: blanchedalmond;
              }
        .container{      
                padding-top:5px;
                display: block;
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
                width: 50%;    
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
  <?php include('navbar.php'); ?>
       <div class="container">
            <h2 style="text-align: center">Customer Details</h2>
            <br>                   
            <table id="Table">
                <thead>
                    <tr>
                    <th>S.No.</th>
                    <th>Account No.</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Total Balance</th>  
                    </tr>
                </thead>                     
                <?php
                while($row = $result->fetch_assoc()) { 
                ?> 
                <tr>
                    <td><?php echo $row['sno']; ?></td>
                    <td><?php echo $row['accNo']; ?></td>
                    
                    <td ><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['balance']; ?></td>
                    
                </tr>
                <?php
                }
                $con->close();
                ?> 
            </table>
        </div>
        <footer style="padding-top: 2px; text-align: center; color: white">
        <p style="font-size: 15px">Designed by: Akanksha Shukla</p>
        <p style="font-size: 15px">Contact Number: 8303.....X</p>
        <p style="font-size: 15px">E-mail: aka......@gmail.com</p> 
</footer>
</body>
</html>
