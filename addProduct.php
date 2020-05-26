
<?php include_once 'view/header.php' ?>
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">New Product</h1>
    
    <form>
      <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input type="text" id="sku" class="input-text"/> 
      </div>
      <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input type="text" id="name" class="input-text"/> 
      </div>
      <div class="input-field">
        <label for="price" class="label">Price</label>
        <input type="text" id="price" class="input-text"/> 
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input type="text" id="quantity" class="input-text"/> 
      </div>
      <div class="input-field">
        <label for="category" class="label">Categories</label>
        <select multiple id="category" class="input-text">
          
        </select>
      </div>
      <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea id="description" class="input-text"></textarea>
      </div>
      <div class="actions-form">
        <a href="index.php" class="action back">Back</a>
        <input class="btn-submit btn-action" type="submit" value="Save Product" />
      </div>

      <div id="response">
        <p class="alert"></p>
        <p class="success"></p>
      </div>
      
    </form>
  </main>
  <!-- Main Content -->

  <?php include_once 'view/footer.php' ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
 <script src="assets/app.js"></script>
 <script>
   $(document).ready(function() {
    selectCategories();

    $('form').submit(function() {
      const data = {
        name: $('#category-name').val(),
        code: $('#category-code').val()
      };

      addProduct( JSON.stringify(data) );

      return false; 
   });

 </script>
</body>
</html>
