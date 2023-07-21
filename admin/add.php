<?php

include '../libs/load.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Layouts - NiceAdmin Bootstrap Template</title>
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

</head>

<body>

  <?php load_template('_header'); ?>

  <?php load_template('_sidebar'); ?>



<?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        if(signup($name,$username, $password, $email, $phone)){
            echo "<script>alert('Successfully Added');</script>";
            header("Location: list.php");
        } else {
            echo "<script>alert('Error');</script>";
        }

      }
    ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="section">
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vertical Form</h5>

              <!-- Vertical Form -->
              <form class="row g-3" method="post" action="add.php">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label"  >Your Name</label>
                  <input type="text" class="form-control" name="name" id="inputNanme4" required >
                </div>
                <div class="col-12">
                  <label for="inputUsername" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="inputUsername" required>
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="inputEmail4">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="inputPassword4" required>
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Phone Number</label>
                  <input type="Number" class="form-control" name="phone" id="inputAddress">
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                </div>
              </form><!-- Vertical Form -->
            </div>
          </div>

    </div>

  </main><!-- End #main -->

  <?php load_template('_footer'); ?>
</body>

</html>