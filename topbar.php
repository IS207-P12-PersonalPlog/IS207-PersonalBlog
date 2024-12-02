<?php session_start();?>
<header>
    <div class="top-nav">
      <div class="container">
        <div class="header-top flexbox flex-align-item">
          <div class="logo">
            <a href="http://localhost/IS207-PersonalBlog/">
              <img src="https://cello.vn/image/catalog/logo.png"
                title="Cello"
                alt="Cello"
                class="img-responsive">
            </a>
          </div>
          <div class="header-right">
            <div class="header-right-inner flexbox">
              <div class="header-top-left">
                <div class="search">
                  <form action="" method="get">
                    <input type="text" placeholder="Tìm kiếm" class="search-product">
                    <div class="search_product">
                    
                    </div>
                  </form>
                </div>
              </div>
              <div class="header-top-right flexbox flex-align-item flex-justify-content-end">
                <nav>
                  <ul>
                    <li>
                      <a href="giohang.php">
                        <i class="fa fa-shopping-cart"
                          style="font-size:28px"></i>
                          <div class="txt-name">Giỏ hàng <span class="cart-total-items amount">
                            (<?php 
                            if(!isset($_SESSION['giohang']) 
                            || count($_SESSION['giohang']) == 0) echo 0;
                            else echo count($_SESSION['giohang']);
                            ?>)
                          </span></div>
                      </a>
                    </li>
                    <li>
                      <br>
                      <?php
                            
                            
                            if (isset($_GET['user_id'])) {
                                $user_id = $_GET['user_id'];
                                include "connect.php";
                                $sql = "SELECT * FROM `useraccount` WHERE user_id='$user_id'";
                                $results = $connect->query($sql);

                                if ($results->num_rows > 0) {
                                    $row = $results->fetch_row();
                                    $_SESSION['user_id'] = $row[1];
                                }
                            }

                            if (isset($_SESSION['user_id'])) {
                                // Hiển thị thông tin người dùng nếu đã đăng nhập
                                $username = $_SESSION['user_id'];
                                echo "<div class='txt-name'>";
                                echo "<i class='fa fa-user' style='inline-size: auto; font-size: 20px;'></i>";
                                echo " $username";
                                echo "<br><a href='index.php?logout=true'>Đăng xuất</a>";
                                echo "</div>";
                            } else {
                                // Hiển thị nút Đăng nhập nếu chưa đăng nhập
                                echo "<div class='txt-name'>";
                                echo "<a href='login.php'>";
                                echo "<i class='fa fa-user' style='inline-size: auto; font-size: 20px;'></i>";
                                echo " Đăng nhập"; 
                                echo "</a>";
                                echo "</div>";
                            }
                              // Đoạn mã xử lý đăng xuất
                              if (isset($_GET['logout'])) {
                                session_unset();
                                session_destroy();
                                
                                header("Location: index.php");
                                exit;
                              }
                          ?>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <!-- Đóng mở nav cho thiết bị màn hình nhỏ -->
          <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Dropdown điện thoại -->
          <div class="collapse navbar-collapse"
            id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fa fa-mobile-phone"></i> ĐIỆN THOẠI
                </a>
                <ul class="dropdown-menu"
                  aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item"
                      href="list_product.php?brand_id=apple&category_id=phone">iPhone</a></li>
                  <li><a class="dropdown-item"
                      href="list_product.php?brand_id=samsung&category_id=phone">Samsung</a></li>
                  <li><a class="dropdown-item"
                      href="list_product.php?brand_id=xiaomi&category_id=phone">Xiaomi</a></li>
                </ul>
              </li>
            </ul>
          </div>

          <!-- Dropdown laptop -->
          <div class="collapse navbar-collapse"
            id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fa fa-laptop"></i> LAPTOP
                </a>
                <ul class="dropdown-menu"
                  aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item"
                      href="list_product.php?brand_id=asus&category_id=laptop">Asus</a></li>
                  <li><a class="dropdown-item"
                      href="list_product.php?brand_id=msi&category_id=laptop">MSI</a></li>
                  <li><a class="dropdown-item"
                      href="list_product.php?brand_id=apple&category_id=laptop">Mac</a></li>
                </ul>
              </li>
            </ul>
          </div>

          <!-- Dropdown tai nghe -->
          <div class="collapse navbar-collapse"
            id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                  href=""
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fa fa-headphones"></i> TAI NGHE
                </a>
                <ul class="dropdown-menu"
                  aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item"
                      href="list_product.php?brand_id=havit">Havit</a></li>
                  <li><a class="dropdown-item"
                      href="#">Gaming</a></li>
                  <li><a class="dropdown-item"
                      href="#">Bluetooth</a></li>
                </ul>
              </li>
            </ul>
          </div>

          <!-- Dropdown TV -->
          <div class="collapse navbar-collapse"
            id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fa fa-television"></i> TV
                </a>
                <ul class="dropdown-menu"
                  aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item"
                      href="#">LG</a></li>
                  <li><a class="dropdown-item"
                      href="#">Samsung</a></li>
                  <li><a class="dropdown-item"
                      href="#">Xiaomi</a></li>
                </ul>
              </li>
            </ul>
          </div>

        </div>
      </nav>
    </div>
</header>

<script>
  $(document).ready(function(){
    $(".search-product").change(function(){
      $(".search_product").css({"display": "block", "background-color": "white"});
      var tensp=$(this).val();
      $.post("tim_sp.php",
      {
        tensp:tensp 
      },
      function(data,status){  
        if(status=="success")
        {
          $(".search_product").html(data); 
        }
      }); 
    });
  });   
</script>
