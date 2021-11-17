<?php

header("Cache-Control: private, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat,26 Jul 1997 05:00:00 GMT");
   $servername = "";
    $username = ""; 
    $password = ""; 
    $dname = ""; 
    $con = new mysqli($servername, $username, $password, $dname); 
    if ($con->connect_error) { 
    die("Connection failed: " . $con->connect_error); 
    } 
?>
<html>
<head> 
    <title>Transaction Page</title>
    <style>
    body {
               padding-top: 60px;
               font-size:25px;
               background: blanchedalmond;
        }
    .center{
        background: #c1506a;
        padding-top:5px;
        display: block;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        width: 50%;    
    }
    .center2{
        font-size:20px;
        width:100%;
    }
    table {
    margin: 0 auto;
  }
    td,th { border: 1px solid #ddd; padding: 8px;}
    #Table{ font-family: Arial, sans-serif; border-collapse: collapse;}
    #Table tr:nth-child(even){ background-color: #d2d3d4; }
    #Table tr:nth-child(odd){ background-color: #dee2e3; }
    #Table tr:hover{ background-color: #b5d0eb; }
    #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color:  #608fb3; color:white; }

    </style>    
     <script type="text/javascript">
    
    if(window.history.replaceState){
        
        window.history.replaceState(null, null, window.location.href); 
    }
    
</script>
</head>
<body>
<?php include('navbar.php'); ?>
<?php 
  if(isset($_POST['form_submitted'])){
      $PAYER_ACCNO = $_POST['payerACCNO'];
      $PAYEE_ACCNO = $_POST['payeeACCNO'];
      $AMOUNT = $_POST['amount'];

      if(empty($PAYER_ACCNO) || empty($PAYEE_ACCNO) || empty($AMOUNT)){       
        echo "<script> alert('Empty Fields !!');
        window.location.href='FundTransferDetails.php';
        </script>";  
        exit() ;           
      }
      if($AMOUNT <=0){
        echo "<script> alert('Amount must be greater than zero !!');
        window.location.href='FundTransferDetails.php';
        </script>";  
        exit() ;  
      }

      if(!ctype_digit($AMOUNT) || !ctype_digit($PAYER_ACCNO) || !ctype_digit($PAYEE_ACCNO)){
        echo "<script> alert('Entered value can only contain digit!!');
        window.location.href='FundTransferDetails.php';
        </script>";  
        exit() ;  
      }

      $sqlcount = "SELECT COUNT(1) FROM accountdetails where accNo='$PAYER_ACCNO'";
      $r =  $con->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]<1){
        echo "<script> alert('Payer Acc. number does not exists !!');
        window.location.href='FundTransferDetails.php';
        </script>";  
        exit() ;      
      }
    
      $sqlcount = "SELECT COUNT(1) FROM accountdetails where accNo='$PAYEE_ACCNO'";
      $r =  $con->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]<1){
        echo "<script> alert('Payee Acc. number does not exists !!');
        window.location.href='FundTransferDetails.php';
        </script>";  
        exit() ;      
      }
      
      $sql = "Select * from accountdetails where accNo='$PAYER_ACCNO'";       
          if($result = $con->query($sql)){            
               $row1 = $result->fetch_array(); 
               if($row1['balance']<$AMOUNT){
                echo "<script> alert('Payer does not have required balance !!');
                window.location.href='FundTransferDetails.php';
                </script>";  
                exit() ; 
                }  
          }  
          echo "<div class ='center'>";
          echo "<div class ='center2'>";
          echo "<h1 style='text-align: center'>Transaction Completed Successfully</h1>
                <p  style='text-align: center; font-size:25px;'>Details of payer and payee are as follows<p>
                <table id = 'Table'>
                <tr>
                <th></th>
                <th>Account No</th>
                <th>Name</th>
                <th>Email</th>
                </tr>";
          $sql = "Select * from accountdetails where accNo='$PAYER_ACCNO'";       
          if($result = $con->query($sql)){            
               $row1 = $result->fetch_array(); 
                       echo "<tr> 
                            <td> Payer </td>
                            <td>".$row1['accNo']."</td>
                            <td>".$row1['name']."</td>
                            <td>".$row1['email']."</td>
                            </tr>";                        
                       $PayerCurrentBalance = $row1['balance'];            
            }
          $sql2 = "Select * from accountdetails where accNo='$PAYEE_ACCNO'";
          if($result = $con->query($sql2)){
                $row2 = $result->fetch_array();
                       echo "<tr> 
                            <td> Payee </td>
                            <td>".$row2['accNo']."</td>
                            <td>".$row2['name']."</td>
                            <td>".$row2['email']."</td>
                            </tr>"; 
                        $PayeeCurrentBalance = $row2['balance'];                       
            }               
            echo "</table>";
            $PayeeCurrentBalance += $AMOUNT;
            $PayerCurrentBalance -= $AMOUNT;
            echo "<br>";
            echo "<table id = 'Table' style='margin-bottom:15px;'>
                    <tr>
                        <th></th>
                        <th>Old Balance</th>
                        <th>New Balance</th>
                    </tr>
                    <tr>
                        <th>Payer</th>
                        <td style='color:black'>".$row1['balance']."</td>                        
                        <td style='color:black'>".$PayerCurrentBalance."</td>
                    </tr>
                    <tr>
                        <th>Payee</th>
                        <td style='color:black'>".$row2['balance']."</td>                        
                        <td style='color:black'>".$PayeeCurrentBalance."</td>
                    </tr>";
            echo "</table>";
           $updatepayer ="Update accountdetails set balance='$PayerCurrentBalance' where accNo='$PAYER_ACCNO'";
           $updatepayee ="Update accountdetails set balance='$PayeeCurrentBalance' where accNo='$PAYEE_ACCNO'";
           if($con->query($updatepayer)==false){
                ?>        
                <script>alert("PAYER DETAILS NOT UPDATED!!")</script>
                <?php
           } 
           if($con->query($updatepayee)==false){
                    ?>        
                    <script>alert("PAYEE DETAILS NOT UPDATED! ERROR OCCURED!")</script>
                    <?php
            }
            date_default_timezone_set('Asia/Kolkata');           
            $date = date('Y-m-d H:i:s',time());
            $InsertTransactTable ="Insert into history (payer, payerAcc, payee, payeeAcc, amount, time) values ('$row1[name]','$row1[accNo]','$row2[name]','$row2[accNo]','$AMOUNT','$date')";
            if($con->query($InsertTransactTable)==false){
                    ?>        
                    <script>alert("Record of this transaction saved! ERROR OCCURED!")</script>
                    <?php
            }
            echo "<br>";
        echo "</div>";
        echo "</div>";    
  }else{
      ?>
      <h1>All transactions are updated</h1>
      <?php
  }
  $con->close();
?>          
</body>
</html>
