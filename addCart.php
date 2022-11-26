<?php
    session_start();
    $Cart = $_SESSION['Cart'];
    $Model = $_POST['Model'];
    $Days = $_POST['Days'];
    
    if($Cart[$Model]['Model'] = $Model){
        $Cart[$Model]['Days'] = $Days;
        $_SESSION['Cart'] = $Cart;
    }
?>

