<?php include_once 'view/header.php' ?>

<!-- Header -->
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">Edit Category</h1>
    
    <form method='post'>
      <div class="input-field">
        <label for="category-name" class="label">Category Name</label>
        <input type="text" id="category-name" class="input-text" />
        
      </div>
      <div class="input-field">
        <label for="category-code" class="label">Category Code</label>
        <input type="text" id="category-code" class="input-text" />
        
      </div>
      <div class="actions-form">
        <a href="categories.php" class="action back">Back</a>
        <input class="btn-submit btn-action"  type="submit" value="Save" />
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
    const id =  <?php echo $_GET['id'];?>

    showCategory(id);

    $('#category-name').val('testinho');


    $('form').submit(function() {
      //validateForm();

      const data = {
        name: $('#category-name').val(),
        code: $('#category-code').val()
      };

      addCategory( JSON.stringify(data) );

      return false;      
    });

   });
 </script>
</body>
</html>
