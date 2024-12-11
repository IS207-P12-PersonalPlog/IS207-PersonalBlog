<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="jquery.js"></script>
    <meta content="width=device-width, initial-scale=1.0"
        name="viewport">
    <title>IS207-PersonalBlog</title>
    <?php include "header.php"; ?>
</head>

<body>

    <?php include "topbar.php"; ?>

    <main>
        <div class="container slide">
            <div class="row slide">
                <div class="col-lg-8 slide">
                    <!-- Slide -->
                    <div id="carouselExampleIndicators"
                        class="carousel slide"
                        data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button"
                                data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="0"
                                class="active"
                                aria-current="true"
                                aria-label="Slide 1"></button>
                            <button type="button"
                                data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button"
                                data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="#"
                                    target="_blank">
                                    <img src="https://cdn-images.vtv.vn/thumb_w/650/66349b6076cb4dee98746cf1/2024/09/10/screenshot-63-34588478669239839067515.png"
                                        class="d-block w-100"
                                        alt="Iphone"
                                        width="250px"
                                        height="351px">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="#"
                                    target="_blank">
                                    <img src="https://cdn-images.vtv.vn/thumb_w/650/66349b6076cb4dee98746cf1/2024/09/10/screenshot-63-34588478669239839067515.png"
                                        class="d-block w-100"
                                        alt="Macbook"
                                        width="250px"
                                        height="351px">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="#"
                                    target="_blank">
                                    <img src="https://cdn-images.vtv.vn/thumb_w/650/66349b6076cb4dee98746cf1/2024/09/10/screenshot-63-34588478669239839067515.png"
                                        class="d-block w-100"
                                        alt="TV"
                                        width="250px"
                                        height="351px">
                                </a>
                            </div>
                        </div>
                        <button class="carousel-control-prev"
                            type="button"
                            data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next"
                            type="button"
                            data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 slide">
                    <div class="col">
                        <dir class="row-lg-4 img_slide">
                            <a href="#"
                                target="_blank">
                                <img src="https://cdn.tgdd.vn/Products/Images/44/326050/hp-15-fd0303tu-i3-a2nl4pa-thumb-1-600x600.jpg"
                                    alt=""
                                    height="117px"
                                    width="100%">
                            </a>
                        </dir>
                        <dir class="row-lg-4 img_slide">
                            <a href="#"
                                target="_blank">
                                <img src="https://cdn.tgdd.vn/Products/Images/44/312414/asus-vivobook-15-x1504za-i3-nj102w-thumb-600x600.jpg"
                                    alt=""
                                    height="117px"
                                    width="100%">
                            </a>
                        </dir>
                        <dir class="row-lg-4 img_slide">
                            <a href="#"
                                target="_blank">
                                <img src="https://cdn.tgdd.vn/Products/Images/44/326637/acer-aspire-lite-14-51m-59bn-i5-nxktxsv001-100624-101857-600x600.jpg"
                                    alt=""
                                    height="117px"
                                    width="100%">
                            </a>
                        </dir>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <!-- Filter các loại điện thoại -->
        <div class="container">
            <h2>Danh mục sản phẩm</h2>
            <div class="filter-button-group button-group">
                <button data-filter="*"
                    class="btn btn-outline-secondary">All</button>
                <button data-filter=".phone"
                    class="btn btn-outline-secondary">Phone</button>
                <button data-filter=".laptop"
                    class="btn btn-outline-secondary">Laptop</button>
                <button data-filter=".headphone"
                    class="btn btn-outline-secondary">Headphone</button>
            </div>

            <!-- Card -->
            <div class="filterable_card"
                id="phone_list">
            <?php
            include "connect.php";
            // Số sản phẩm trên mỗi trang
            $products_per_page = 9;

            // Trang hiện tại
            if (isset($_GET['page']))
            {
                $current_page = $_GET['page'];
            }
            else
            {
                $current_page = 1;
            }

            // Tính offset
            $offset = ($current_page - 1) * $products_per_page;

            // Truy vấn để lấy số sản phẩm
            $total_products_query = "SELECT COUNT(*) as total FROM `sp`";
            $total_products_result = $connect->query($total_products_query);
            $total_products = $total_products_result->fetch_assoc()['total'];

            // Tính số trang cần thiết
            $total_pages = ceil($total_products / $products_per_page);

            // Truy vấn để lấy sản phẩm trên trang hiện tại
            $sql = "SELECT * FROM `sp` LIMIT $offset, $products_per_page";
            $results = $connect->query($sql);
            while($rows = $results->fetch_assoc()){
                echo '<a href="product_detail.php?masp=' . $rows['MASP'] . '" class="card ' . $rows['category_id'] . '" type="' . $rows['MASP'] . '">';
                echo '<div>';
                echo '<img src="' . $rows['HINHANH'] . '" alt="">';
                echo '<div class="card_body">';
                echo '<h6 class="card_title">' . $rows['TENSP'] . '</h6>';
                echo '<h5 class="card_value">' . number_format($rows['GIA'], 0, ',', '.') . 'đ</h5>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
            $connect->close();
            ?>
        </div>
        <?php
            echo '<ul class="pagination">';

            if ($current_page > 1) {
                echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page - 1) . '">Previous</a></li>';
            }

            $num_links = 5; // Số lượng liên kết phân trang tối đa hiển thị
            $start = max(1, $current_page - floor($num_links / 2));
            $end = min($total_pages, $start + $num_links - 1);

            if ($start > 1) {
                echo '<li class="page-item"><a class="page-link" href="?page=1">1</a></li>';
            }
            if ($start > 2) {
                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
            }

            for ($i = $start; $i <= $end; $i++) {
                if ($i == $current_page) {
                    echo '<li class="page-item active"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }
            }

            if ($end < $total_pages - 1) {
                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
            }
            if ($end < $total_pages) {
                echo '<li class="page-item"><a class="page-link" href="?page=' . $total_pages . '">' . $total_pages . '</a></li>';
            }

            if ($current_page < $total_pages) {
                echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page + 1) . '">Next</a></li>';
            }

            echo '</ul>';
        ?>
    </main>

    <!-- Footer -->
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

    <!-- Scroll to the top of page -->
    <button class="scrollup scr_btn"><i class="fa fa-angle-up"
            style="font-size: 20px;"></i></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script src="app.js"></script>

</body>

</html>