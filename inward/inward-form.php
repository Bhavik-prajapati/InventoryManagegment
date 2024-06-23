<?php
  include("../config/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
    include("config/head-data.php");
  ?>
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

  <?php
    include("config/footer-data.php");
  ?>

</body>

</html>


<?php
if (isset($_POST['btnSubmit'])) {
    // Capture form data
    $place = mysqli_real_escape_string($conn, $_POST['place']);
    $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $quality = mysqli_real_escape_string($conn, $_POST['quality']);
    $bags = mysqli_real_escape_string($conn, $_POST['bags']);
    $each_bag_weight = mysqli_real_escape_string($conn, $_POST['each_bag_weight']);
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    $om_exim_weighbridge_weight = mysqli_real_escape_string($conn, $_POST['om_exim_weighbridge_weight']);
    $other_weighbridge_weight = mysqli_real_escape_string($conn, $_POST['other_weighbridge_weight']);
    $weight_as_per_average_bag_weight = mysqli_real_escape_string($conn, $_POST['weight_as_per_average_bag_weight']);
    $bill_weight = mysqli_real_escape_string($conn, $_POST['bill_weight']);
    $weight_supervisor_name = mysqli_real_escape_string($conn, $_POST['weight_supervisor_name']);
    $quality_supervisor_name = mysqli_real_escape_string($conn, $_POST['quality_supervisor_name']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $date = date("Y-m-d H:i:s"); // You can format the date as needed


  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO `inward_master`(`place`, `supplier_name`, `product_name`, `quality`, `bags`, `each_bag_weight`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssssssssssss", $place, $supplier_name, $product_name, $quality, $bags, $each_bag_weight, $rate, $om_exim_weighbridge_weight, $other_weighbridge_weight, $weight_as_per_average_bag_weight, $bill_weight, $weight_supervisor_name, $quality_supervisor_name, $remarks, $date);

    // Execute the query
    if ($stmt->execute()) {
        echo "New record created successfully";

        $activity_details = "entered inward item";
        
        $stmt = $conn->prepare("
            INSERT INTO activity_master (user_id, email, user_type, activity_timestamp, activity_details)
            VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?)");
        $stmt->bind_param('isss', $_SESSION['id'], $_SESSION['username'], $_SESSION['role'], $activity_details);
        $stmt->execute();


    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
