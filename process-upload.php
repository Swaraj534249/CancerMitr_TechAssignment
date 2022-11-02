<?php
session_start();


include 'dbconnection.php';
// echo "$file";
$message = $file;
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
  $file = $_FILES['uploadedFile'];
  function check_file_uploaded_name($file)
  {
    (bool) ((preg_match("`^[-0-9A-Z_\.]+$`i", $file)) ? true : false);
  }
  $fileTmpPath = $file['tmp_name'];
  $fileName = $file['name'];
  $fileSize = $file['size'];
  $fileType = $file['type'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_desccription = $_POST['product_desccription'];
  print_r($file);

  if ($file['error'] === UPLOAD_ERR_OK) {
    // get details of the uploaded file


    // print_r($file);
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'jpeg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

    if (in_array($fileExtension, $allowedfileExtensions)) {
      // directory in which the uploaded file will be moved
      $uploadFileDir = 'upload-file/';
      $dest_path = $uploadFileDir . $fileName;

      date_default_timezone_set("Asia/Kolkata");
      $date = date("M d Y");
      $time = date("G:i A");
      $dateTime = $date . '  ' . $time;

      $filename = str_replace('.','-', basename($fileName,$fileExtension));
        echo $filenewname = $filename.time().".".$fileExtension;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {

          $insertquery = "insert into uploadedfiles(product_name,product_price,date,product_desccription,product_image) values('$product_name', '$product_price', '$dateTime', '$product_desccription', '$dest_path')";


          $query = mysqli_query($con, $insertquery);

          $message = 'File is successfully uploaded.';
        } else {
          $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
        }

    } else {

      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  } else {

    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $file['error'];
  }
}

if (isset($_POST['updateBtn']) && $_POST['updateBtn'] == 'Update') {
  $file = $_FILES['updatedFile'];
  $fileTmpPath = $file['tmp_name'];
  $fileName = $file['name'];
  $fileSize = $file['size'];
  $fileType = $file['type'];
  $id = $_POST['id'];
  $update_name = $_POST['update_name'];
  $update_price = $_POST['update_price'];
  $update_desccription = $_POST['update_desccription'];

  

  $uploadFileDir = 'upload-file/';
  $dest_path = $uploadFileDir . $fileName;

  move_uploaded_file($fileTmpPath, $dest_path);

  $updatequery = "UPDATE `uploadedfiles` SET `product_name`='$update_name',`product_price`='$update_price',`product_desccription`='$update_desccription',`product_image`='$dest_path' WHERE id='$id' ";


        $query = mysqli_query($con, $updatequery);
        header('location:index.php');

}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $delete = "DELETE FROM `uploadedfiles` WHERE `id`='$id'";
  $query = mysqli_query($con, $delete);
}

$_SESSION['message'] = $message;
header('location:index.php');
