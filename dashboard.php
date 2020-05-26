
<?php include_once 'view/header.php' ?>

<!-- Main Content -->
<main class="content">
  <div class="header-list-page">
    <h1 class="title">Dashboard</h1>
  </div>
  <div class="infor">
    You have <strong class="allQtd"></strong> products added on this store: <a href="addProduct.php" class="btn-action">Add new Product</a>
    <p id="response"></p>
  </div>
  <ul class="product-list">
  </ul>
</main>
<!-- Main Content -->

<?php include_once 'view/footer.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="assets/app.js"></script>
<script type="text/javascript">
  $(document).ready(function(){    
    showProducts();

    $('.read-products-button').click(function(){
        showProducts();
    });
  });
</script>

</body>
</html>
