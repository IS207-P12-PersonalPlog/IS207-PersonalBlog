<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
        content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script src="app.js"></script>
</head>

<body>
    <!-- HEADER -->
    <?php
        include "header.php";
        include "topbar.php";
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col card_revenue">
                <div class="card_revenue-logo">
                    <div><img src="https://cello.vn/image/catalog/logo.png"
                        title="Cello"
                        alt="Cello"
                        class="img-responsive">
                    </div>
                    <div class="card_revenue-title">Doanh thu tháng</div>
                </div>
                <div class="card_revenue-value">
                    <?php
                        include "connect.php";
                        $currentMonth = date('m');
                        $currentYear = date('Y');
                        $lastMonth = date('m') - 1;
                        $sql1 = "SELECT SUM(TRIGIA) FROM `hoadon` WHERE MONTH(NGHD) = $currentMonth AND YEAR(NGHD) = $currentYear";
                        $sql2 = "SELECT SUM(TRIGIA) FROM `hoadon` WHERE MONTH(NGHD) = $lastMonth AND YEAR(NGHD) = $currentYear";
                        $result1 = $connect->query($sql1);
                        $row1 = $result1->fetch_row();
                        $result2 = $connect->query($sql2);
                        $row2 = $result2->fetch_row();

                        echo number_format($row1[0],0,',','.');
                        echo "</div>";
                        if ($row2[0] != 0)
                        {
                            $temp = $row1[0] / $row2[0];
                            if (1 - $temp >= 0)
                            {
                                $temp = round((1 - $temp) * 100, 2);
                                echo "<div class='card_revenue-text'><span class='card_revenue-percentage_minus'>-$temp%</span> than last month</div>";
                            }
                            else
                            {
                                $temp = round(($temp - 1) * 100, 2);
                                echo "<div class='card_revenue-text'><span class='card_revenue-percentage_plus'>+$temp%</span> than last month</div>";
                            }
                        }
                    ?>
            </div>
            <div class="col card_revenue">
            <div class="card_revenue-logo">
                    <div><img src="https://cello.vn/image/catalog/logo.png"
                        title="Cello"
                        alt="Cello"
                        class="img-responsive">
                    </div>
                    <div class="card_revenue-title">Người dùng mới trong một ngày</div>
                </div>
                <div class="card_revenue-value">
                    <?php
                        $today = date('Y-m-d');
                        $yesterday = date('Y-m-d', strtotime('-1 day'));
                        
                        $sql1 = "SELECT COUNT(*) FROM `useraccount` WHERE DATE(ngay_dk) = '$today'";
                        $sql2 = "SELECT COUNT(*) FROM `useraccount` WHERE DATE(ngay_dk) = '$yesterday'";
                        $result1 = $connect->query($sql1);
                        $row1 = $result1->fetch_row();
                        $result2 = $connect->query($sql2);
                        $row2 = $result2->fetch_row();
                        
                        echo number_format($row1[0],0,',','.');
                        echo "<br>";
                        if ($row2[0] != 0)
                        {
                            $temp = $row1[0] / $row2[0];
                            if (1 - $temp >= 0)
                            {
                                $temp = round((1 - $temp) * 100, 2);
                                echo "<div class='card_revenue-text'><span class='card_revenue-percentage_minus'>-$temp%</span> than yesterday</div>";
                            }
                            else
                            {
                                $temp = round(($temp - 1) * 100, 2);
                                echo "<div class='card_revenue-text'><span class='card_revenue-percentage_plus'>+$temp%</span> than yesterday</div>";
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="col card_revenue">
                <div class="card_revenue-logo">
                    <div><img src="https://cello.vn/image/catalog/logo.png"
                        title="Cello"
                        alt="Cello"
                        class="img-responsive">
                    </div>
                    <div class="card_revenue-title">Doanh thu theo ngày</div>
                </div>
                
                <div class="card_revenue-value">
                    <?php
                        $today = date('Y-m-d');
                        $yesterday = date('Y-m-d', strtotime('-1 day'));
                        $sql1 = "SELECT SUM(TRIGIA) FROM `hoadon` WHERE DATE(NGHD) = '$today'";
                        $sql2 = "SELECT SUM(TRIGIA) FROM `hoadon` WHERE DATE(NGHD) = '$yesterday'";
                        $result1 = $connect->query($sql1);
                        $row1 = $result1->fetch_row();
                        $result2 = $connect->query($sql2);
                        $row2 = $result2->fetch_row();

                        echo number_format($row1[0],0,',','.');
                        echo "<br>";
                        if ($row2[0] != 0)
                        {
                            $temp = $row1[0] / $row2[0];
                            if (1 - $temp >= 0)
                            {
                                $temp = round((1 - $temp) * 100, 2);
                                echo "<div class='card_revenue-text'><span class='card_revenue-percentage_minus'>-$temp%</span> than yesterday</div>";
                            }
                            else
                            {
                                $temp = round(($temp - 1) * 100, 2);
                                echo "<div class='card_revenue-text'><span class='card_revenue-percentage_plus'>+$temp%</span> than yesterday</div>";
                            }
                        }
                    ?>
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
</body>

</html>