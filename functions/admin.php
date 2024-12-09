<?php
    session_start();
    if (!isset($_SESSION['admin']))
    {
        echo "<script>alert('Bạn không có quyền truy cập')</script>";
        echo "<script>window.location = '../index.php';</script>";
    }
    else
    {
        echo "<a href='add_product.php'><h2>Thêm sản phẩm</h2></a>";
        echo "<a href='delete_update_toggle_product.php'><h2>Xóa và cập nhật sản phẩm</h2></a>";
        echo "<a href='../index.php'><h2>Trang chủ</h2></a>";
    }
?>