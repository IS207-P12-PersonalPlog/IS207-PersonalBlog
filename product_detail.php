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

</head>

<body>
    <!-- HEADER -->
    <?php
      include "header.php";
      include "topbar.php";
    ?>

    <!-- PRODUCT MAIN SECTION -->
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

    <!-- FOOTER -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="#"
                    onclick="window.open('https://github.com/IS207-P12-PersonalPlog/IS207-PersonalBlog')"
                    class="me-4 text-reset">
                    <i class="fa fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>CELLO
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!"
                                class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!"
                                class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!"
                                class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!"
                                class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!"
                                class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!"
                                class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!"
                                class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!"
                                class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i>Thành phố Hồ Chí Minh, Việt Nam</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->
    </footer>
    <!-- Footer -->

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Main script file -->
    <script src="app.js"></script>
</body>


<script>
$(document).ready(function() {
    $(".addToCartBtn").click(function() {
        <?php
if (isset($_SESSION['user_id'])) {
    ?>
        var urlParams = new URLSearchParams(window.location.search);
        var masp = urlParams.get('masp');
        var quantity = document.getElementById("quantity").value;
        var url = "themgiohang.php?masp=" + masp + "&quantity=" + quantity;
        window.location.href = url;
        <?php
} else {
    ?>
        alert("Bạn cần phải đăng nhập");
        window.location.href = "login.php";
        <?php
}
?>
    });
});
</script>

</html>