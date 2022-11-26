<?php
    session_start();
    $item = $_REQUEST['id'];
    if(isset($item)){
        unset($_SESSION['Cart'][$item]);
    }
    header("location:shoppingCart.php");
?>