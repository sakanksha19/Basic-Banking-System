<?php
    $servername = "fdb34.awardspace.net";
    $username = "3986264_akanksha19"; 
    $password = "u-nudn587BdR72a}"; 
    $dname = "3986264_akanksha19"; 
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
    .moneyTransfer{
        color:white;
        background: #c1506a;
        padding: 20px;
        position:fixed;
        top:50%;
        left:50%;
        transform: translate(-50%, -50%);
    }
 
    </style>   
    <script type="text/javascript">
    
        if(window.history.replaceState){
            
            window.history.replaceState(null, null, window.location.href); 
        }
       
    </script>
</head>
<body>
<img src="bankinghub.jpg" alt="bank" style= "width:100%; height: 92%; position: absolute; z-index:-1; opacity: 0.7">
<?php include('navbar.php'); ?>
<div class = 'moneyTransfer'>
    <h1>Money Transfer</h1>
    <form name="myForm" action="ResultPage.php"  onsubmit="return validateForm()" method="post">
        <table id="table1">
        <tr>
            <td>Payer Account No</td>
            <td><input type="number" name="payerACCNO"  min=1000 required><td>
        </tr>
        <tr>
            <td>Payee Account No</td>
            <td><input type="number" name="payeeACCNO" min=1000 required ><td>
        </tr>
        <tr>
            <td>Amount (in Rupees)</td>
            <td><input type="number" name="amount" min=100 required><td>
        </tr>
        <tr>
            <td><input type= "hidden" name= "form_submitted" value="1"></td>
            <td> <input type="submit" value="PROCEED"><td>
        </tr>
       
        </table>
    </form>
</div>
 <script>
 
 function validateForm() {
            var x = document.forms["myForm"]["payerACCNO"].value;
            var y = document.forms["myForm"]["payeeACCNO"].value;
            var z = document.forms["myForm"]["amount"].value;
            var regex=/^[0-9]+$/;
            if (x == "" || y=="" || z=="") {
                alert("Fill it!!");
                return false;
            }
            if((Math.sign(z)==-1)||(Math.sign(z)==-0)||z==0){
                alert("Enter a valid amount for transaction");
                return false;
            }
            if(isNaN(z)|| !x.match(regex)|| !y.match(regex) ||!z.match(regex)){
                alert("Enter correct input!");
                return false;
            }
        }
            
 </script>
</body>
</html>
