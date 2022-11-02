    
  <div id="content" class=" container text-center" bis_skin_checked="1">
  <span>Add product</span>
    <form method="POST" action="process-upload.php" enctype="multipart/form-data">


      <!-- <input type="submit" name="uploadBtn" value="Upload" /> -->
      <!-- <a href="display.php">Check Table</a> -->

      <div class="row mb-3">
        <div class="col">
          <input type="text" name="product_name" id="product_name" onblur="namevalid()" class="form-control" placeholder="Item name" aria-label="Item name" required>
        </div>

        <div class="col">
          <input type="text" name="product_price" id="product_price" onblur="pricevalid()" class="form-control" placeholder="Item price" aria-label="Item price" required>
        </div>

        <div class="col ">
          <!-- <input class="form-control" type="file" id="formFile" name="image"> -->
          <input class="form-control" type="file" name="uploadedFile" multiple/>
        </div>

      </div>

      <div class="row">

        <div class="col-8 ">
          <textarea name="product_desccription" id="product_desccription" onblur="pricevalid()" class="form-control" placeholder="message" aria-label="message"></textarea>
        </div>

        <div class="col-1 align-self-start">
          <!-- <input name="Submit" type="submit" value="submit" class="btn btn-primary" /> -->
          <input type="submit" class="btn btn-primary" name="uploadBtn" value="Upload" />
        </div>
      </div>

    </form>

  </div>
