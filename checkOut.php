<?php
session_start();
$Cart = $_SESSION['Cart'];
$sum = 0;
foreach ($Cart as $key) {
    $sum += $key['Price'] * $key['Days'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--/*With help from Runoob.com*/-->
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
    <title>Check Out</title>
    <style type="text/css">
        body{
            font-family: sans-serif;
        }

        .navbar {
            height: 100px;
            white-space: nowrap;
            background-color: #333333;
            display: flex; 
        }

        #logo {
            font-style: italic;
            font-family:sans-serif;
            font-weight: bold;
            color: #FFCC33;
            background-color: #FFFFFF;
            float: left;
            padding-top: 5px;
            padding-left: 20px;
            padding-right: 20px;
        }

        #title {
            font-family:sans-serif;
            text-transform: uppercase;
            font-size: 45px;
            top: 0px;
            left: 35%;
            float: left;
            position: absolute;
            color: #FFFFFF;
        }

        .btn1 {
            cursor: pointer;
            margin: 15px;
            font-size: 12px;
            font-family:sans-serif;
            background-color: #0099CC;
            color: #FFFFFF;
            border: none;
            padding: 10px 20px;
            text-align: inherit;
        }

        .btn1:hover {
            cursor: pointer;
            margin: 15px;
            font-size: 12px;
            font-family:sans-serif;
            background-color: #0000FF;
            color: #FFFFFF;
            border: none;
            padding: 10px 20px;
            text-align: inherit;
        }

        .btn2 {
            cursor: pointer;
            margin: 15px;
            font-size: 12px;
            font-family:sans-serif;
            background-color: #0099CC;
            color: #FFFFFF;
            border: none;
            padding: 10px 20px;
            text-align: inherit;
        }

        .btn2:hover {
            cursor: pointer;
            margin: 15px;
            font-size: 12px;
            font-family:sans-serif;
            background-color: #0000FF;
            color: #FFFFFF;
            border: none;
            padding: 10px 20px;
            text-align: inherit;
        }

        table {
            text-align:left;
            background-color: #CCCCCC;
            font-family: sans-serif;        
            width: 60%;
            padding:15px;
        }        

        p {
            font-family: sans-serif;
            font-size: 16px;
            font-weight: 12;
        }
    </style>



</head>

<body>
    <div class="navbar">
        <h1 id="logo">Hertz-UTS</h1>
        <h1 id="title">Car Rental Center</h1>
    </div>
    <form class="ckform" id="checkForm" method="get" action="sendEmail.php" target="shoppingCart">
    <p style="font-weight: bold;">Customer Details and Payment </p>    
    <p>Please fill in the following details correctly, <span style="color:red;">* </span> indicates required field. </p>    
    <table align:"center">
        <tr style="font-weight: bold;">
          <td for="firstname"><span style="color:red;">* </span>First Name</td>
          <td><input id="name" name="01" class="required" minlength="2" type="text" placeholder="Dike" required></td>
        </tr>
        <tr style="font-weight: bold;">
            <td for="lastname"><span style="color:red;">* </span>Last Name</td>
            <td><input id="name" name="01" class="required" minlength="2" type="text" placeholder="Wang" required></td>
        </tr>
        <tr style="font-weight: bold;">
            <td for="emailaddress"><span style="color:red;">* </span>Email Address</td>
            <td><input id="email" name="email" type="text" placeholder="DavidWang@gmail.com" required></td>
        </tr>
        <tr style="font-weight: bold;">
          <td for="addressline1"><span style="color:red;">* </span>Address Line 1</td>
          <td><input id="address" name="02" minlength="2" type="text" placeholder="15 Broadway" required></td>
        </tr>
        <tr style="font-weight: bold;"> 
            <td for="addressline2"><span style="color:#CCCCCC;">* </span>Address Line 2</td>
            <td><input id="address" name="03" type="text"></td>
        </tr>
        <tr style="font-weight: bold;">
          <td for="city"><span style="color:red;">* </span>City</td>
          <td><input id="suburb" name="04" minlength="2" type="text" placeholder="Sydney" required></td>
        </tr>
        <tr style="font-weight: bold;">
          <td for="state"><span style="color:red;">* </span>State</td>
          <td>
            <select name="05">
                <option label="New South Wales"></option>
                <option label="Queensland"></option>
                <option label="South Australia"></option>
                <option label="Tasmania"></option>
                <option label="Victoria"></option>
                <option label="Western Australia"></option>
            </select>
          </td>
        </tr>
        <tr style="font-weight: bold;">
          <td for="postcode"><span style="color:red;">* </span>Post Code</td>
          <td><input id="country" name="06" minlength="2" type="text" placeholder="1000-2599" required></td>
        </tr>
        <tr style="font-weight: bold;">
          <td for="paymenttype"><span style="color:red;">* </span>Payment Type</td>
          <td>
            <select name="07">
                <option label="Credit cards"></option>
                <option label="Debit cards"></option>
                <option label="Digital wallets"></option>
                <option label="Direct debit"></option>
                <option label="Prepaid cards"></option>
                <option label="Cash payment vouchers"></option>
                <option label="Cryptocurrency"></option>
            </select>
          </td>
        </tr>
    </table>
    <script>
    document.getElementById("email").onblur = function () {
      var reg = /^[0-9a-zA-Z_.-]+[@][0-9a-zA-Z_.-]+([.][a-zA-Z]+){1,2}$/;
      if (reg.test(this.value)) {
        this.style.backgroundColor = "white";
      } else {
        email.value="";
        alert('Please check the email address you entered');
      }
    };
        function returnMenu() {
            window.location.href = "index.html";
        }
    </script>
        <p>Total amount of your consumption is $<?php echo $sum; ?></p>
        <p>
            <input class="btn1" id="btn1" type="submit" value="Booking">
            <button class="btn2" id="btn2" onclick="returnMenu()">Continue Selection</button>
        </p>
    </form>
</body>

</html>