<?php
session_start();
if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Bạn không có quyền truy cập')</script>";
    echo "<script>window.location = '../index.php';</script>";
}
// delete_product_turnoff.php
include '../connect.php'; // kết nối database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];

    $sql = "DELETE FROM sp WHERE MASP = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        echo "Xóa thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

// Nạp sản phẩm
$sql = "SELECT MASP, TENSP, status FROM sp";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Xóa sản phẩm</title>
</head>

<body>
    <h2>Xóa-sửa-tắt sản phẩm</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['MASP']); ?></td>
                <td><?php echo htmlspecialchars($row['TENSP']); ?></td>
                <td><?php echo htmlspecialchars($row['status'] == 1 ? 'Active' : 'Inactive'); ?></td>
                <td>
                    <form method="POST"
                        action="delete_update_toggle_product.php"
                        style="display:inline;">
                        <input type="hidden"
                            name="product_id"
                            value="<?php echo $row['MASP']; ?>">
                        <button type="submit">Xóa</button>
                    </form>
                    <form method="GET"
                        action="update_product.php"
                        style="display:inline;">
                        <input type="hidden"
                            name="product_id"
                            value="<?php echo $row['MASP']; ?>">
                        <button type="submit">Sửa</button>
                    </form>
                    <form method="POST"
                        action="toggle_status.php"
                        style="display:inline;">
                        <input type="hidden"
                            name="product_id"
                            value="<?php echo $row['MASP']; ?>">
                        <button type="submit"><?php echo $row['status'] == 1 ? 'Tắt' : 'Bật'; ?></button>
                    </form>
                </td>
            </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</body>

</html>

<?php
$connect->close();
?>

<a href="admin.php">
    <h2>Về trang admin</h2>
</a>