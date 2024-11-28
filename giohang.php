<!DOCTYPE html>
<html>
<head xmlns="http://www.w3.org/1999/xhtml>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <script src="jquery.js"></script>
    <script src="js/custom.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Gio hang</title>
    <?php include "header.php"; ?>
</head>
<body>

<?php
    include "topbar.php";
    include "connect.php";
    echo "<div class='container'>";
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
                    <button class="removeItem">Xóa</button>
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
</body>
</html>