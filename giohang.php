<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="jquery.js"></script>
    <script src="custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script src="app.js"></script>
    <meta content="width=device-width, initial-scale=1.0"
    name="viewport">
    <title>Gio hang</title>
    <?php include "header.php"; ?>
</head>

<body>

<div class='container'>
<?php
    include "topbar.php";
    include "connect.php";
    if(!isset($_SESSION['giohang']) || count($_SESSION['giohang']) == 0)
    {
      ?>
      <h1>Giỏ hàng của bạn</h1>
      -------------------------
      <p>Giỏ hàng của bạn đang trống.<\p>
      <p>Hãy chọn thêm sản phẩm để mua sắm nhé<\p>
      <?php
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
          $tongtien = 0;
          ?>
          <div class="container block-info mt-3">
            <div id="listItemSuperCart">
              <?php
              foreach($giohang as $id => $sl)
              {
                $sql = "select * from sp where MASP='$id'";
                $result = $connect->query($sql);
                $row = $result->fetch_assoc();
              ?>
                <div class="block__product-item__outer">
                  <div class="block__product-item">
                    <div class="checkbox-product">
                      <img src="<?php echo $row['HINHANH']?>" 
                      alt="<?php echo $row['TENSP']?>" class="product-img">
                    </div>
                    <div class="product-info">
                      <div class="d-flex justify-content-between align-items-start">
                        <a href="product_detail.php?masp=<?php echo $row['MASP']?> " class="product-name"><?php echo $row['TENSP']?></a>
                        <button class="removeItem" value="<?php echo $row['MASP']
                        ?>">Xóa</button>
                      </div>
                      <div>
                        <div class="block-box-price"><?php echo number_format($row['GIA'],0,',','.')."đ"?></div>
                        <div class="action d-flex">
                          <span class="minus"></span>
                          <input type="text" readonly value="<?php echo $sl?>">
                          <span class="plus"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>  
            </div>
          </div>
          <?php
        }
    }
?>
</div>

<?php
$connect->close();
?>
</body>
</html>