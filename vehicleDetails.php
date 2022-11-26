<?php
    session_start();
    $Cart = @$_SESSION['Cart'];
    $Model = @$_POST['Model'];
    $Price = @$_POST['Price'];
    $vehicle = @$_POST['car'];
    $Availability = @$_POST['Availability'];
    $Day = 1;

    if(isset($_POST['Availability'])){
        if($Availability == "False"){
            echo "1";
            exit();     
        }else{
            echo "2";
        }
    }

    if(!empty($Model)){
        if(empty($Cart)){
            $Cart[$Model] = array("Model" => $Model, "name" => $vehicle, "Price" => $Price, "Days" => $Day);
            $_SESSION['Cart'] = $Cart;
        }elseif(!array_key_exists($Model,$Cart)){
            $Cart[$Model] = array("Model" => $Model, "name" => $vehicle, "Price" => $Price, "Days" => $Day);
            $_SESSION['Cart'] = $Cart;
        }else{
            $_SESSION['Cart'] = $Cart;
        }
    }
?>