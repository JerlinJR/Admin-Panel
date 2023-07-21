<?php
include_once "../libs/load.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / General - NiceAdmin Bootstrap Template</title>
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

<script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
</script>

  <? load_template("_header"); ?>

  <? load_template("_sidebar"); ?>


  <?php
        if (isset($_GET['delete'])) {
          $id = $_GET['delete'];
          
          if (deleteData($id)){
            echo "<script>alert('Deleted');</script>";
      } else {
          echo "<script>alert('Error');</script>";
      }
    }
    
  ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Admin Details</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Admin Table</li>
      <!-- <li class="breadcrumb-item active">General</li> -->
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Admin Details</h5>

          <?php
            $result = getAllData();
          ?>

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">SINo</th>
                <th scope="col">Name</th>
                <th scope="col">Agent Count</th>
                <th scope="col">Action</th>
                <!-- <th scope="col">Start Date</th> -->
              </tr>
            </thead>
            <tbody>

            <?php
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['username'] . "</td>";
                  // echo "<td>" . $row['username'] . "</td>";
                  echo "<td>" .agentCount($row['id']). "</td>";
                  echo "<td>
                          <a href='../agent/view.php?view=" . $row['id'] . "' class='btn btn-primary'>View</a>
                          <a href='edit.php?edit=" . $row['id'] . "' class='btn btn-secondary'>Edit</a>
                          <a href='" . $_SERVER['PHP_SELF'] . "?delete=" . $row['id'] . "' onclick='return confirmDelete();' class='btn btn-danger'>Delete</a>
                          <a href='../agent/add.php?admin_id=" . $row['id'] . "' class='btn btn-secondary'>Add Agent</a>

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
