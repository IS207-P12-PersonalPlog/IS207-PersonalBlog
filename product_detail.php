<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible"
    content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
  <title>Product Detail Page</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet">
  <!-- Custom CSS -->
  <style>
  .product-img {
    width: 100%;
    max-height: 400px;
    object-fit: cover;
  }

  .thumbnail-img {
    width: 75px;
    height: 75px;
    object-fit: cover;
    cursor: pointer;
  }
  </style>
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <!-- Product Images Section -->
      <div class="col-md-6">
        <img id="mainImage"
          src="path/to/your/image.jpg"
          class="img-fluid product-img mb-3"
          alt="Product Image">
        <div class="d-flex">
          <!-- Thumbnails -->
          <img src="path/to/your/image1.jpg"
            class="thumbnail-img me-2"
            onclick="changeImage(this)">
          <img src="path/to/your/image2.jpg"
            class="thumbnail-img me-2"
            onclick="changeImage(this)">
          <img src="path/to/your/image3.jpg"
            class="thumbnail-img"
            onclick="changeImage(this)">
        </div>
      </div>

      <!-- Chi tiết sản phẩm -->
      <div class="col-md-6">
        <h2>Product Title</h2>
        <p class="text-muted">Product Category</p>
        <h4 class="text-danger">$99.99</h4>
        <p>Product Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent imperdiet, justo id
          feugiat tempus, est lorem tincidunt ligula, id cursus ligula ligula eget ligula.</p>

        <!-- Lựa chọn số lượng -->
        <div class="mb-3">
          <label for="quantity"
            class="form-label">Quantity:</label>
          <input type="number"
            id="quantity"
            class="form-control w-25"
            value="1"
            min="1">
        </div>

        <!-- Thêm vào giỏ hàng -->
        <button class="btn btn-primary"
          id="addToCartBtn">Add to Cart</button>

        <!-- Đánh giá -->
        <div class="mt-5">
          <h5>Customer Reviews</h5>
          <p>No reviews yet. Be the first to review this product!</p>
        </div>
      </div>
    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
  function changeImage(element) {
    document.getElementById('mainImage').src = element.src;
  }

  $(document).ready(function() {
    $('#addToCartBtn').click(function() {
      alert('Product added to cart!');
    });
  });
  </script>
</body>

</html>