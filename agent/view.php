<?php
include_once "../libs/load.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Agent Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <? load_template("_header"); ?>

  <? load_template("_agentsidebar"); ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Agent Details</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Agent Table</li>
      <!-- <li class="breadcrumb-item active">General</li> -->
    </ol>
  </nav>
</div><!-- End Page Title -->

            <?php
              if (isset($_GET['view'])) {
                $id = $_GET['view'];

                $data = getGroupOfAgent($id);   
              }      
            ?>

<section class="section">
  <div class="row">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
        <!-- <h5 class="btn btn-primary" style="float: right;">Add Agent</h5> -->
        <!-- <a href='view.php?addagent= <?php $row['id']?>'  class='btn btn-primary'  >Add Agent</a> -->
          <h5 class="card-title">Agent Details</h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Agent ID</th>
                <th scope="col">Admin ID</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <!-- <th scope="col">Start Date</th> -->
              </tr>
            </thead>
            <tbody>

            <?php
              foreach ($data as $row) {
                  echo "<tr>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['admin_id'] . "</td>";
                  echo "<td>" . $row['username'] . "</td>";
                  echo "<td>" . $row['password'] . "</td>";
                  echo "<td>
                      <a href='view.php?view=" . $row['id'] . "' class='btn btn-primary'>View</a>
                      <a href='edit.php?edit=" . $row['id'] . "' class='btn btn-secondary'>Edit</a>
                      <a href='" . $_SERVER['PHP_SELF'] . "?delete=" . $row['id'] . "' onclick='return confirmDelete();' class='btn btn-danger'>Delete</a>

                        </td>";
                  echo "</tr>";
              }
              ?>
              
            </tbody>
          </table>
          <!-- End Table with hoverable rows -->

        </div>
      </div>


        </div>
      </div>


        </div>
      </div>

    </div>


  </div>
</section>

</main><!-- End #main -->

<? load_template("_footer"); ?>

</body>



</html>
