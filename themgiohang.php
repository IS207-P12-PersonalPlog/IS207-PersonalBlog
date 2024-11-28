<?php
session_start();
ob_start();
$id = $_GET['masp'];
if($id != "")
{
    if(isset($_SESSION['giohang'][$id]))
    {
        $_SESSION['giohang'][$id]++;
    }
    else
    {
        $_SESSION['giohang'][$id] = 1;
    }
    header("location: giohang.php");
}
else
{
    header("location:index.php");
}
?>