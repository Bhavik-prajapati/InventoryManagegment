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
      <h1>Process</h1>
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
                  <input type="text" placeholder="Enter Place" class="form-control" id="place" name="place">
                </div>
              </div>
              <div class="row mb-4">
                <label for="process_name" class="col-sm-2 col-form-label">Process Name</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Process Name" class="form-control" id="process_name" name="process_name">
                </div>
              </div>
              <div class="row mb-4">
                <label for="foreign_buyer_name" class="col-sm-2 col-form-label">Foreign Buyer Name</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Foreign Buyer Name" class="form-control" id="foreign_buyer_name" name="foreign_buyer_name">
                </div>
              </div>
              <div class="row mb-4">
                <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Product Name" class="form-control" id="product_name" name="product_name">
                </div>
              </div>
              <div class="row mb-4">
                <label for="weight_quality" class="col-sm-2 col-form-label">Weight Quality</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Weight Quality" class="form-control" id="weight_quality" name="weight_quality">
                </div>
              </div>
              <div class="row mb-4">
                <label for="bags_quantity" class="col-sm-2 col-form-label">Bags Quantity</label>
                <div class="col-sm-10">
                  <input type="number" placeholder="Enter Bags Quantity" class="form-control" id="bags_quantity" name="bags_quantity">
                </div>
              </div>
              <div class="row mb-4">
                <label for="each_bag_weight" class="col-sm-2 col-form-label">Each Bag Weight</label>
                <div class="col-sm-10">
                  <input type="number" step="0.00000000001" placeholder="Enter Each Bag Weight" class="form-control" id="each_bag_weight" name="each_bag_weight">
                </div>
              </div>
              <div class="row mb-4">
                <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Remarks" class="form-control" id="remarks" name="remarks">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
                </div>
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
  $process_name = mysqli_real_escape_string($conn, $_POST['process_name']);
  $foreign_buyer_name = mysqli_real_escape_string($conn, $_POST['foreign_buyer_name']);
  $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
  $weight_quality = mysqli_real_escape_string($conn, $_POST['weight_quality']);
  $bags_quantity = mysqli_real_escape_string($conn, $_POST['bags_quantity']);
  $each_bag_weight = mysqli_real_escape_string($conn, $_POST['each_bag_weight']);
  $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
  $date = date("Y-m-d H:i:s"); // Assuming the date is captured directly from the form input
  
  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO `process_master`(`id`, `place`, `process_name`, `foreign_buyer_name`, `product_name`, `weight_quality`, `bags_quantity`, `each_bag_weight`, `remarks`, `date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssssss", $id, $place, $process_name, $foreign_buyer_name, $product_name, $weight_quality, $bags_quantity, $each_bag_weight, $remarks, $date);
  
  // Execute the query
  if ($stmt->execute()) {
      echo "New record created successfully";
      $activity_details = "entered process item";
        
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
