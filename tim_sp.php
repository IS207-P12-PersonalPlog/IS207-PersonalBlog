<?php
    include "connect.php";
    $tensp = $_POST['tensp'];
    $sql = "SELECT * FROM `sp` WHERE TENSP='$tensp'";
    $results = $connect->query($sql);
    while($rows = $results->fetch_assoc()){
        
      echo '<a href="product_detail.php?masp=' . $rows['MASP'] . '">';
      echo '<div class="card_mini">';
      echo '<img src="' . $rows['HINHANH'] . '" alt="">';
      echo '<div class="card_body">';
      echo '<p class="cardmini_title">' . $rows['TENSP'] . '</p>';
      echo '<p class="cardmini_value">' . number_format($rows['GIA'], 0, ',', '.') . '</p>';
      echo '</div>';
      echo '</div>';
      echo '</a>';
    }
    $connect->close();
?>