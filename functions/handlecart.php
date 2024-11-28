<?php
session_start();
ob_start();
if(isset($_POST['scope']))
{
    $scope = $_POST['scope'];
    switch($scope)
    {
        case "delete":
            $masp = $_POST['masp'];
            unset($_SESSION['giohang.php'][$masp]);
            echo 200;
            break;
        default:
            echo "Default handlecart.php";
    }
}
?>