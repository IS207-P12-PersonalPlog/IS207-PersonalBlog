<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head xmlns="http://www.w3.org/1999/xhtml>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <script src="jquery.js"></script>
    <title>Gio hang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
    href="">
    <!-- Main CSS File -->
    <link href="styles.css" rel="stylesheet">
</head>
<body>
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
                <div class="search"><input type="text"
                    placeholder="Tìm kiếm"><button>Tìm kiếm</button></div>
              </div>
              <div class="header-top-right flexbox flex-align-item flex-justify-content-end">
                <nav>
                  <ul>
                    <li>
                      <a href="giohang.php">
                        <i class="fa fa-shopping-cart"
                          style="font-size:28px"></i>
                        <div class="txt-name">Giỏ hàng <span class="cart-total-items amount">(0)</span></div>
                      </a>
                    </li>
                    <li>
                      <br>
                      <a href="login.php">
                        <div class="txt-name"><i class="fa fa-user"
                            style="inline-size: auto; font-size: 20px;"></i> Đăng nhập</div>
                      </a>
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
                      href="#">iPhone</a></li>
                  <li><a class="dropdown-item"
                      href="#">Samsung</a></li>
                  <li><a class="dropdown-item"
                      href="#">Xiaomi</a></li>
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
                      href="#">Asus</a></li>
                  <li><a class="dropdown-item"
                      href="#">Lenovo</a></li>
                  <li><a class="dropdown-item"
                      href="#">Mac</a></li>
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
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fa fa-headphones"></i> TAI NGHE
                </a>
                <ul class="dropdown-menu"
                  aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item"
                      href="#">Có dây</a></li>
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
<?php
    include "connect.php";
    if(!isset($_SESSION['giohang']))
    {
        echo "<h1>Giỏ hàng của bạn</h1>";
        echo "-------------------------";
        echo "<p>Giỏ hàng của bạn đang trống.<\p>";
        echo "<p>Hãy chọn thêm sản phẩm để mua sắm nhé<\p>";
    }
    else
    {
        $giohang = $_SESSION['giohang'];
        if(count($giohang) != "" && isset($_POST['capnhat']))
        {
            // $soluong_cn = $_POST['soluong'];
            // foreach($soluong_cn as $id =>$sl)
            // {
            //     if($sl == 0)
            //     {
            //         unset($_SESSION['giohang'][$id]);
            //     }
            //     else if($sl > 0 && is_numeric($sl))
            //     {
            //         $_SESSION['giohang'][$id] = $sl;
            //     }
            //     // header("location:".$_SERVER['REQUEST_URI']."");
            // }
        }
        if(count($giohang))
        {
?>        <form method="post">
            <table border="1" align="center" cellspacing="0">
              <tr><th colspan="6">Giỏ hàng</th></tr>
              <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
              </tr>
              <?php
              $tong = 0;
              foreach($giohang as $id => $sl)
              {
                $sql = "select * from sp where MASP='$id'";
                $result = $connect->query($sql);
                $row = $result->fetch_assoc();
              ?>
              <tr>
                <td><?php echo $row['TENSP']; ?></td>
                <td><?php echo $row['GIA']; ?></td>
                <td><?php echo $sl; ?></td>
                <td><?php echo $sl * $row['GIA']; ?></td>
                <td>Xóa</td>
              </tr>
              <?php
              $tong += $sl * $row['GIA'];
              }
              ?>
              <tr>
                <td colspan="6">
                  Tổng cộng: <?php echo $tong; ?>
                </td>
              </tr>
            </table>
          </form>
        
<?php
        }
    }
?>
</body>
</html>