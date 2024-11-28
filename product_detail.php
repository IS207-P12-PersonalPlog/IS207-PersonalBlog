<?php
include "connect.php";

// Lấy mã sản phẩm từ index.php
$product_id = isset($_GET['masp']) ? intval($_GET['masp']) : 0;

// thực thi truy vấn
$sql = "SELECT sp.MASP, sp.TENSP, sp.GIA, sp.DUNGLUONG, sp.HINHANH, 
               categories.category_title, brands.brand_title 
        FROM sp 
        JOIN categories ON sp.category_id = categories.category_id
        JOIN brands ON sp.brand_id = brands.brand_id
        WHERE sp.MASP = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    die("Không tìm thấy sản phẩm.");
}

// đóng kết nối
$stmt->close();
$connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible"
    content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($product['TENSP']); ?></title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet">
  <!-- Main css file -->
  <link href="styles.css"
    rel="stylesheet">
  <script src="jquery.js"></script>
  <!-- script nhan nut them san pham -->
  <script>
    $(document).ready(function(){
      $(".addToCartBtn").click(function(){
        var urlParams = new URLSearchParams(window.location.search);
        var masp = urlParams.get('masp');
        var url = "themgiohang.php?masp=" + masp;
        window.location.href = url;
      });
    });
  </script>
</head>

<body>
  <?php 
    include "header.php"; 
    include "topbar.php";
  ?>
  <div class="container mt-5">
    <div class="row">
      <!-- Product Image Section -->
      <div class="col-md-6">
        <img src="<?php echo htmlspecialchars($product['HINHANH']); ?>"
          class="img-fluid product-img mb-3"
          alt="Product Image">
      </div>

      <!-- Product Details Section -->
      <div class="col-md-6">
        <h2><?php echo htmlspecialchars($product['TENSP']); ?></h2>
        <h5>Brand: <?php echo htmlspecialchars($product['brand_title']); ?></h5>
        <h5>Category: <?php echo htmlspecialchars($product['category_title']); ?></h5>
        <h4 class="text-danger">Price: <?php echo number_format($product['GIA'], 0); ?> VND</h4>
        <p>Storage: <?php echo htmlspecialchars($product['DUNGLUONG']); ?></p>

        <!-- Quantity Selector -->
        <div class="mb-3">
          <label for="quantity"
            class="form-label">Quantity:</label>
          <input type="number"
            id="quantity"
            class="form-control w-25"
            value="1"
            min="1">
        </div>

        <!-- Add to Cart Button -->
        <button class="btn btn-primary addToCartBtn">Add to Cart</button>

        <!-- Static Reviews Section -->
        <div class="mt-5">
          <h5>Customer Reviews</h5>
          <p>No reviews yet. Be the first to review this product!</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Main script file -->
  <script src="app.js"></script>
</body>

</html>