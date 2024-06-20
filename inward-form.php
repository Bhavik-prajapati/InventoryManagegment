<?php
  include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php
    include("layout/header.php");
    include("layout/aside.php");
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Inward</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <form method="post" action="">
                

                <div class="row mb-4">
                  <label for="place" class="col-sm-2 col-form-label">Place</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="place" name="place">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="supplier_name" class="col-sm-2 col-form-label">Supplier Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="supplier_name" name="supplier_name">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="product_name" name="product_name">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="quality" class="col-sm-2 col-form-label">Quality</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="quality" name="quality">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="bags" class="col-sm-2 col-form-label">Bags</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="bags" name="bags">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="each_bag_weight" class="col-sm-2 col-form-label">Each Bag Weight</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="each_bag_weight" name="each_bag_weight">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="rate" name="rate">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="om_exim_weighbridge_weight" class="col-sm-2 col-form-label">OM Exim Weighbridge Weight</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="om_exim_weighbridge_weight" name="om_exim_weighbridge_weight">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="other_weighbridge_weight" class="col-sm-2 col-form-label">Other Weighbridge Weight</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="other_weighbridge_weight" name="other_weighbridge_weight">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="weight_as_per_average_bag_weight" class="col-sm-2 col-form-label">Weight as per Average Bag Weight</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="weight_as_per_average_bag_weight" name="weight_as_per_average_bag_weight">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="bill_weight" class="col-sm-2 col-form-label">Bill Weight</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="bill_weight" name="bill_weight">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="weight_supervisor_name" class="col-sm-2 col-form-label">Weight Supervisor Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="weight_supervisor_name" name="weight_supervisor_name">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="quality_supervisor_name" class="col-sm-2 col-form-label">Quality Supervisor Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="quality_supervisor_name" name="quality_supervisor_name">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                  <div class="col-sm-10">
                    <input type="text" value="demo field value" class="form-control" id="remarks" name="remarks">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
                  </div>
                </div>

                <!-- <div class="row mb-4">
                  <label class="col-sm-2 col-form-label">Quality</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div> -->

              </div>
            </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php
    include("layout/footer.php");
  ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>


<?php
if (isset($_POST['btnSubmit'])) {
    // Capture form data
    $place = $_POST['place'];
    $supplier_name = $_POST['supplier_name'];
    $product_name = $_POST['product_name'];
    $quality = $_POST['quality'];
    $bags = $_POST['bags'];
    $each_bag_weight = $_POST['each_bag_weight'];
    $rate = $_POST['rate'];
    $om_exim_weighbridge_weight = $_POST['om_exim_weighbridge_weight'];
    $other_weighbridge_weight = $_POST['other_weighbridge_weight'];
    $weight_as_per_average_bag_weight = $_POST['weight_as_per_average_bag_weight'];
    $bill_weight = $_POST['bill_weight'];
    $weight_supervisor_name = $_POST['weight_supervisor_name'];
    $quality_supervisor_name = $_POST['quality_supervisor_name'];
    $remarks = $_POST['remarks'];
    $date = date("Y-m-d H:i:s"); // You can format the date as needed

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO `inward_master`(`place`, `supplier_name`, `product_name`, `quality`, `bags`, `each_bag_weight`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssssssssssss", $place, $supplier_name, $product_name, $quality, $bags, $each_bag_weight, $rate, $om_exim_weighbridge_weight, $other_weighbridge_weight, $weight_as_per_average_bag_weight, $bill_weight, $weight_supervisor_name, $quality_supervisor_name, $remarks, $date);

    // Execute the query
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
