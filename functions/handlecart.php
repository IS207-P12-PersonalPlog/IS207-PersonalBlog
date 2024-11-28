<?php
session_start();
ob_start();
if(isset($_POST['scope']))
{
    $scope = $_POST['scope'];
    $masp = $_POST['masp'];
    switch($scope)
    {
        case "delete":
            unset($_SESSION['giohang'][$masp]);
            echo 200;
            break;
        default:
            echo "Default handlecart.php";
    }
}
?>