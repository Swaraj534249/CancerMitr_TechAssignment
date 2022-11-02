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
  <div id="main" class="mt-3 ms-4 me-4">

    <div id="content">
      <h1>Index</h1>

      <div class="" style="float: right;">
        <button type="button" onclick="myFunction()" name="icon-up" class="btn btn-outline-primary">New file</button>
      </div>

      <h2>Files</h2>

      <!-- <div id="myDIV">
        
      </div> -->
      <div style="display: none" id="uploadHolder">
        <?php
        include 'upload.php';
        ?>
      </div>

      <div id="table_sort" class="autoscroll mt-3">
        <table class="list files table table-sortable">
          <thead>
            <tr>
              <th>ID</th>
              <th>File</th>
              <th>Price</th>
              <th>Date</th>
              <th>Desc</th>
              <th>Preview</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

            include 'dbconnection.php';

            $number = 1;
            $selectquery = "SELECT * FROM uploadedfiles";

            $query = mysqli_query($con, $selectquery);

            $result = mysqli_fetch_array($query);

            while ($result = mysqli_fetch_array($query)) {
              echo "
              <tr>
            <td >$number</td>
              <td >$result[product_name]</td>
              <td >$result[product_price]</td>
              <td >$result[date]</td>
              <td >$result[product_desccription]</td>
              <td><img src='$result[product_image]' width = '80'></td>
              <td class='last-col'>
                  <a href='process-upload.php?id= $result[id];' id='delete'>Delete</a>
                  <a href='update.php?id= $result[id];' id='update'>Update</a>
                </td>
            </tr>
              ";
              $number++;
            }
            ?>
          </tbody>
        </table>
      </div>

      <div style="clear:both;"></div>

    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <script src="js/core.js"></script>
  <script src="js/tablesort.js"></script>

  <script type="text/javascript">
		function myFunction() {
			var x = document.getElementById("uploadHolder");
			if (x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}
		}
	</script>
</body>

</html>