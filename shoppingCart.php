<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Center</title>
</head>

<style>
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

    .btn {
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

    .btn:hover {
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
    
    .delete-btn {
        cursor: pointer;
        margin: 15px;
        font-size: 12px;
        font-family:sans-serif;
        background-color: #FF9999;
        color: #FFFFFF;
        border: none;
        padding: 10px 20px;
        text-align: inherit;
        text-decoration: none;
    }

    .delete-btn:hover {
        cursor: pointer;
        margin: 15px;
        font-size: 12px;
        font-family:sans-serif;
        background-color: #CC0033;
        color: #FFFFFF;
        border: none;
        padding: 10px 20px;
        text-align: inherit;
        text-decoration: none;
    }

    .shoppinglist {
        background-color: #FFFFFF;
        height: 80px;
        width: 80%;
    }

    .form {
        display: block;
        align-self: center;
    }
    
    .table {
        font-family: sans-serif;
        width: 70%;
        background: #FFFFFF;
        border-collapse: collapse;
    }               
    .th,td {
        height: 25px;
        line-height: 25px;
        text-align: center;
        border: 1px solid #FFFFFF;
    }       
    .th {
        background: #FFFFFF;
        font-weight: normal;
    } 
</style>

<body>
    <div class="navbar">
        <h1 id="logo">Hertz-UTS</h1>
        <h1 id="title">Car Rental Center</h1>
    </div>
    <div>
        <form name="qty" method="POST" action="checkOut.php" onsubmit="return isEmpty()">
            <table class="shoppinglist" >
                <tr>
                <th>Vehicle Thumbnail</th>
                <th>Vehicle Name</th>
                <th>Price Per Day</th>
                <th>Rental Days</th>
                <th>Action</th>
                </tr>
                <?php
                    
                    $Cart = @$_SESSION['Cart'];
                    $count = count((array)$Cart);
                    if(isset($Cart)){
                        foreach($Cart as $key) {
                            echo "<tr>";
                            echo "<td><img src=\"img/".$key['Model'].".jpg\" height=\"120px\" width=\"160px\"></td>";
                            echo "<td>".$key['name']."</td>";
                            echo "<td>$".$key['Price']."</td>";
                            echo "<td><input name=\"".$key['Model']."\" value=\"".$key['Days']."\" type=\"number\" min=\"1\" max=\"30\" onchange=\"addCarts('".$key['Model']."',this.form.".$key['Model'].".value)\"></td>";
                            echo "<td><a href=\"deleteVehicle.php?id={$key['Model']}\" class=\"delete-btn\">  Delete</a></td>";
                            echo "</tr>";
                        }
                    }
                ?>
                
            </table>
            <p>
                <input class="btn" id="btn" type="submit" value="Continue CheckOut">
            </p>
        </form>
    </div>
</body>

<script type="text/javascript">

    function addCarts(id,number){
        console.log(number);
        var req = "Model=" + id + "&Days=" + number;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){

            }
        }
        xhr.open("POST","addCart.php",true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send(req);
    }

    function isEmpty(){
        var rows = "<?php echo $count;?>";
        if(rows == 0){
            alert("Your reservation is empty, please choose your car.");
            window.location.href = "index.html";
            return false;
        }
    }

</script>

</html>