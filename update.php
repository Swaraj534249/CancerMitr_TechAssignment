<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <title>Flash Share - Home to file shares between team members</title>

  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include 'header.php'; ?>

<?php
include 'dbconnection.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $select = "SELECT * FROM `uploadedfiles` WHERE `id`= $id";
  $query = mysqli_query($con, $select);
  $result = mysqli_fetch_array($query);

  ?>
    <div id="content" class=" container text-center" bis_skin_checked="1">
    <span>Update product</span>
    <form method="POST" action="process-upload.php" enctype="multipart/form-data">
      <div class="row mb-3">
        <div class="col">
          <input type="text" name="update_name" id="update_name" onblur="namevalid()" 
          class="form-control" placeholder="Item name" value="<?php echo $result['product_name'] ?>" >
        </div>

        <div class="col">
          <input type="text" name="update_price" id="update_price" onblur="pricevalid()" 
          class="form-control" placeholder="Item price" value="<?php echo $result['product_price']; ?>"  >
        </div>

        <div class="col ">
          <!-- <input class="form-control" type="file" id="formFile" name="image"> -->
          <input class="form-control" type="file" name="updatedFile" value="<?php echo $result['product_image']; ?>" />
          
        </div>

      </div>

      <div class="row">

        <div class="col-8">
          <textarea name="update_desccription" id="update_desccription" onblur="pricevalid()" 
          class="form-control" placeholder="message"  ><?php echo $result['product_desccription']; ?></textarea>
        </div>

        <div class="col ">
        <img src="<?php echo $result['product_image']; ?>" width = '180'>
        </div>

        <div class="col align-self-start">
          <!-- <input name="Submit" type="submit" value="submit" class="btn btn-primary" /> -->
          <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
          <input type="submit" class="btn btn-primary" name="updateBtn" value="Update" />
        </div>
      </div>

    </form>
  <?php
  }
?>
</div>


</body>

</html>