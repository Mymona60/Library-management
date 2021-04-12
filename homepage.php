<?php
session_start();
include 'db/db.php';

$sql = "SELECT id,title,price,writer,file,status FROM product";
$result = mysqli_query($conn, $sql);
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title> Home Page</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="https://ezze.dev/brkb/media/favicons/favicon.png">
    <link rel="icon" sizes="192x192" type="image/png" href="https://ezze.dev/brkb/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://ezze.dev/brkb/media/favicons/apple-touch-icon-180x180.png">

    <!-- Fonts and Styles -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="https://ezze.dev/brkb/css/oneui.css">
</head>

<body>
    <!-- Page Container -->

    <div id="page-container">
        <!-- Main Container -->
        <main id="main-container">
            
    <!-- Hero -->
    <div class="bg-image overflow-hidden" style="background-image: url('44061665.jpg');">
        <div class="bg-primary-dark-op">
            <div class="content content-full">
                <div
                    class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="font-w600 text-white mb-0 invisible text-center" data-toggle="appear">Welcome to Book Store Management System
                        </h1>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="container my-5 py-5">

        <!-- Overview -->
        <div class="row row-deck">
            <div class="col-sm-12 col-xl-12">
                <!-- Pending Orders -->
                <table class="table table-bordered">
    <thead>
      <tr>
        <th>Book Title</th>
        <th>Price</th>
        <th>Writer</th>
        <th>Read Online</th>
        <th>Download</th>
      </tr>
    </thead>
    <tbody>
    <?php
                          if (mysqli_num_rows($result) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result)) {
                          ?>
      <tr>
      <td><?php echo $row["title"] ?></td>
                          <td><?php echo $row["price"] ?></td>
                          <td><?php echo $row["writer"] ?></td>
                          <td><a href="uploads/<?php echo $row["file"] ?>" target="_blank">Read Online</a></td>
        
                          <td><a href="uploads/<?php echo $row["file"] ?>" download>Download</a></td>
      </tr>
      <?php
                              }
                          } 
                        ?>
    </tbody>
  </table>
                <!-- END Pending Orders -->
            </div>
        
            
        </div>
        <!-- END Overview -->
    </div>
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!-- OneUI Core JS -->
    <script src="https://ezze.dev/brkb/js/oneui.app.js"></script>

    <!-- Laravel Scaffolding JS -->
    <!-- <script src="/js/laravel.app.js"></script> -->

    </body>

</html>