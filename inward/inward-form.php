<?php
  include("../config/connection.php");

  function getInwardMasterCount($conn) {
    $sql = "SELECT COUNT(*) as count FROM inward_master";
    $result = $conn->query($sql);

    if ($result) {
      $row = $result->fetch_assoc();
      return $row['count'];
    } else {
      return 0;
    }
  }
  $count = getInwardMasterCount($conn) + 1;
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    include("config/head-data.php");
  ?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

  <style>
    .text-danger {
      display: none;
    }
    
  </style>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<script>
  function validateForm() {
    let form = document.forms["dataForm"];
    let valid = true;

    function checkField(fieldName, labelId) {
      let field = form[fieldName].value;
      let label = document.getElementById(labelId);
      if (!field) {
        label.style.display = 'block';
        valid = false;
      } else {
        label.style.display = 'none';
      }
    }

    // Validate each field
    checkField("place", "place_validation");
    checkField("supplier_name", "supplier_name_validation");
    checkField("product_name", "product_name_validation");
    checkField("quality", "quality_validation");
    checkField("bags", "bags_validation");
    checkField("each_bag_weight", "each_bag_weight_validation");
    checkField("rate", "rate_validation");
    checkField("om_exim_weighbridge_weight", "om_exim_weighbridge_weight_validation");
    checkField("other_weighbridge_weight", "other_weighbridge_weight_validation");
    checkField("weight_as_per_average_bag_weight", "weight_as_per_average_bag_weight_validation");
    checkField("bill_weight", "bill_weight_validation");
    checkField("weight_supervisor_name", "weight_supervisor_name_validation");
    checkField("quality_supervisor_name", "quality_supervisor_name_validation");
    checkField("vehicle_no", "vehicle_no_validation");
    checkField("container_no", "container_no_validation");
    checkField("remarks", "remarks_validation");

    // Custom validation for numeric values
    // function checkNumericField(fieldName, labelId) {
    //   let field = form[fieldName].value;
    //   if (field <= 0) {
    //     alert("Numeric values must be greater than zero.");
    //     document.getElementById(labelId).style.display = 'block';
    //     valid = false;
    //   }
    // }

    // checkNumericField("bags", "bags_validation");
    // checkNumericField("each_bag_weight", "each_bag_weight_validation");
    // checkNumericField("rate", "rate_validation");
    // checkNumericField("om_exim_weighbridge_weight", "om_exim_weighbridge_weight_validation");
    // checkNumericField("other_weighbridge_weight", "other_weighbridge_weight_validation");
    // checkNumericField("weight_as_per_average_bag_weight", "weight_as_per_average_bag_weight_validation");
    // checkNumericField("bill_weight", "bill_weight_validation");

    const formFields = [
    "place", "supplier_name", "product_name", "quality", "bags", 
    "each_bag_weight", "rate", "om_exim_weighbridge_weight", 
    "other_weighbridge_weight", "weight_as_per_average_bag_weight", 
    "bill_weight", "weight_supervisor_name", "quality_supervisor_name", 
    "vehicle_no", "container_no", "remarks"
  ];

  formFields.forEach(fieldName => {
    document.getElementById(fieldName).onchange = function() {
      validateForm(false);
    };
  });
    return valid;
  }
</script>

</head>

<body>

  <?php
    include("layout/header.php");
    include("layout/aside.php");
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Inward Form</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        
        <div class="col-lg-12">

          <div class="card">
          
            <div class="card-body">
              <h5 class="card-title" style="border-bottom: 1px solid #daeeff; margin-bottom: 20px;">
              <?php 
                $date = date('Y/m/d');
                $lot_no = "RM/".$date."/".$count;
                echo $lot_no; 
              ?>
              </h5>
              <form  name="dataForm" method="post" action="" onsubmit="return validateForm(true)">
              <div class="row mb-4">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                  <input type="date" placeholder="Enter Date" class="form-control" id="date" name="date">
                  <label id="date_validation" class="text-danger"><small>*Please enter a date.</small></label>
                </div>
              </div>
              
              <script>
                window.onload = function() {
                  const dateInput = document.getElementById('date');
                  const today = new Date();
                  const year = today.getFullYear();
                  const month = String(today.getMonth() + 1).padStart(2, '0');
                  const day = String(today.getDate()).padStart(2, '0');
                  const currentDate = `${year}-${month}-${day}`;
                  
                  dateInput.value = currentDate;
                };
                </script>


                <div class="row mb-4">
                  <label for="place" class="col-sm-2 col-form-label">Place</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Place" class="form-control" id="place" name="place">
                    <label id="place_validation" class="text-danger"><small>*Enter Place</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="supplier_name" class="col-sm-2 col-form-label">Supplier Name</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Supplier Name" class="form-control" id="supplier_name" name="supplier_name">
                    <!-- <select class="form-select dropdown-class" aria-label="Default select example" id="supplier_name" name="supplier_name">
                      <option value="" selected disabled>- - Select Supplier Name - -</option>
                      <?php
                        $sql = "SELECT * FROM supplier_name_master";
                        $result = $conn->query($sql);  
                      ?>
                      <?php
                        $sql = "SELECT * FROM supplier_name_master";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Output data of each row
                          while($row = $result->fetch_assoc()) {  
                      ?>
                      <option value="<?php echo $row["name"] ?>"><?php echo $row["name"] ?></option>
                      <?php 
                        }
                      }
                      ?>
                    </select> -->
                    <label id="supplier_name_validation" class="text-danger"><small>*Enter Supplier Name</small></label>
                  </div>
                </div>
                <!-- <script>
                  $(document).ready(function() {
                    $('#supplier_name').select2();
                  });
                </script> -->
             

                <div id="product-weight-container">
  <div class="row mb-4 product-weight-group">
    <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
    <div class="col-sm-10">
      <select class="form-select dropdown-class" aria-label="Default select example" name="product_name[]">
        <?php
          $sql = "SELECT * FROM supplier_name_master";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo $row["name"] ?>"><?php echo $row["name"] ?></option>
        <?php 
            }
          }
        ?>
      </select>
      <label class="text-danger"><small>*Select Product Name</small></label>
    </div>
  </div>
  <div class="row mb-4 product-weight-group">
    <label for="each_bag_weight" class="col-sm-2 col-form-label">Total KG</label>
    <div class="col-sm-10">
      <input type="number" step="0.00000000001" placeholder="Enter Total KG" class="form-control" name="each_bag_weight[]">
      <label class="text-danger"><small>*Enter Total KG</small></label>
    </div>
  </div>
</div>

<div class="row mb-4">
  <div class="col-sm-10 offset-sm-2">
    <button type="button" class="btn btn-primary" id="add-product-weight">+</button>
  </div>
</div>
</div>

                <script>
                  $(document).ready(function() {
                    $('#product_name').select2();
                  });
                </script>

                <div class="row mb-4">
                  <label for="quality" class="col-sm-2 col-form-label">Quality</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Quality" class="form-control" id="quality" name="quality">
                    <label id="quality_validation" class="text-danger"><small>*Enter Quality</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="bags" class="col-sm-2 col-form-label">Bags</label>
                  <div class="col-sm-10">
                    <input type="number" placeholder="Enter Bags" class="form-control" id="bags" name="bags">
                    <label id="bags_validation" class="text-danger"><small>*Enter Bags</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="each_bag_weight" class="col-sm-2 col-form-label">Total KG</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.00000000001" placeholder="Enter Total KG" class="form-control" id="each_bag_weight" name="each_bag_weight">
                    <label id="each_bag_weight_validation" class="text-danger"><small>*Enter Total KG</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.00000000001" placeholder="Enter Rate" class="form-control" id="rate" name="rate">
                    <label id="rate_validation" class="text-danger"><small>*Enter Rate</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="om_exim_weighbridge_weight" class="col-sm-2 col-form-label">OM Exim Weighbridge Weight</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.00000000001" placeholder="Enter OM Exim Weighbridge Weight" class="form-control" id="om_exim_weighbridge_weight" name="om_exim_weighbridge_weight">
                    <label id="om_exim_weighbridge_weight_validation" class="text-danger"><small>*Enter OM Exim Weighbridge Weight</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="other_weighbridge_weight" class="col-sm-2 col-form-label">Other Weighbridge Weight</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.00000000001" placeholder="Enter Other Weighbridge Weight" class="form-control" id="other_weighbridge_weight" name="other_weighbridge_weight">
                    <label id="other_weighbridge_weight_validation" class="text-danger"><small>*Enter Other Weighbridge Weight</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="weight_as_per_average_bag_weight" class="col-sm-2 col-form-label">Weight as per Average Bag Weight</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.00000000001" placeholder="Enter Weight as per Average Bag Weight" class="form-control" id="weight_as_per_average_bag_weight" name="weight_as_per_average_bag_weight">
                    <label id="weight_as_per_average_bag_weight_validation" class="text-danger"><small>*Enter Weight as per Average Bag Weight</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="bill_weight" class="col-sm-2 col-form-label">Bill Weight</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.00000000001" placeholder="Enter Bill Weight" class="form-control" id="bill_weight" name="bill_weight">
                    <label id="bill_weight_validation" class="text-danger"><small>*Enter Bill Weight</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="weight_supervisor_name" class="col-sm-2 col-form-label">Weight Supervisor Name</label>
                  <div class="col-sm-10">
                    <!-- <input type="text" placeholder="Enter Weight Supervisor Name" class="form-control" id="weight_supervisor_name" name="weight_supervisor_name"> -->
                    <select class="form-select dropdown-class" aria-label="Default select example" id="weight_supervisor_name" name="weight_supervisor_name">
                      <option value="" selected disabled>- - Select Weight Supervisor Name - -</option>
                      <option value="Jignesh Patel">Jignesh Patel</option>
                      <option value="Kaushal Patel">Kaushal Patel</option>
                      <option value="Dipesh Patel">Dipesh Patel</option>
                      <option value="Rajesh Suthar">Rajesh Suthar</option>
                      <option value="Karan Raval">Karan Raval</option>
                      <option value="Kirti Chavda">Kirti Chavda</option>
                      <option value="Riya Surti">Riya Surti</option>
                      <option value="Dhruv Patel">Dhruv Patel</option>
                      <option value="Rajnikant">Rajnikant</option>
                      <option value="Ramesh Patel">Ramesh Patel</option>
                      <option value="Divakarji">Divakarji</option>
                      <option value="Paresh Lodha">Paresh Lodha</option>
                      <option value="Krushn Damor">Krushn Damor</option>
                      <option value="Meet Patel">Meet Patel</option>
                      <option value="Binoy Prajapati">Binoy Prajapati</option>
                      <option value="Prinjal Patel">Prinjal Patel</option>
                      <option value="Jay Vyas">Jay Vyas</option>
                      <option value="Hardik Panchal">Hardik Panchal</option>
                      <option value="Ronak Patel">Ronak Patel</option>
                      <option value="Shubh">Shubh</option>
                      <option value="Manth Patel">Manth Patel</option>
                      <option value="Vipul Patel">Vipul Patel</option>
                      <option value="Vikram">Vikram</option>
                      <option value="Rameshbhai">Rameshbhai</option>
                    </select>
                    <label id="weight_supervisor_name_validation" class="text-danger"><small>*Select Weight Supervisor Name</small></label>
                  </div>
                </div>

                <script>
                  $(document).ready(function() {
                    $('#weight_supervisor_name').select2();
                  });
                </script>

                <div class="row mb-4">
                  <label for="quality_supervisor_name" class="col-sm-2 col-form-label">Quality Supervisor Name</label>
                  <div class="col-sm-10">
                    <!-- <input type="text" placeholder="Enter Quality Supervisor Name" class="form-control" id="quality_supervisor_name" name="quality_supervisor_name"> -->
                    <select class="form-select dropdown-class" aria-label="Default select example" id="quality_supervisor_name" name="quality_supervisor_name">
                      <option value="" selected disabled>- - Select Quality Supervisor Name - -</option>
                      <option value="Jignesh Patel">Jignesh Patel</option>
                      <option value="Kaushal Patel">Kaushal Patel</option>
                      <option value="Dipesh Patel">Dipesh Patel</option>
                      <option value="Rajesh Suthar">Rajesh Suthar</option>
                      <option value="Karan Raval">Karan Raval</option>
                      <option value="Kirti Chavda">Kirti Chavda</option>
                      <option value="Riya Surti">Riya Surti</option>
                      <option value="Dhruv Patel">Dhruv Patel</option>
                      <option value="Rajnikant">Rajnikant</option>
                      <option value="Ramesh Patel">Ramesh Patel</option>
                      <option value="Divakarji">Divakarji</option>
                      <option value="Paresh Lodha">Paresh Lodha</option>
                      <option value="Krushn Damor">Krushn Damor</option>
                      <option value="Meet Patel">Meet Patel</option>
                      <option value="Binoy Prajapati">Binoy Prajapati</option>
                      <option value="Prinjal Patel">Prinjal Patel</option>
                      <option value="Jay Vyas">Jay Vyas</option>
                      <option value="Hardik Panchal">Hardik Panchal</option>
                      <option value="Ronak Patel">Ronak Patel</option>
                      <option value="Shubh">Shubh</option>
                      <option value="Manth Patel">Manth Patel</option>
                      <option value="Vipul Patel">Vipul Patel</option>
                      <option value="Vikram">Vikram</option>
                      <option value="Rameshbhai">Rameshbhai</option>
                    </select>
                    <label id="quality_supervisor_name_validation" class="text-danger"><small>*Select Quality Supervisor Name</small></label>
                  </div>
                </div>

                <script>
                  $(document).ready(function() {
                    $('#quality_supervisor_name').select2();
                  });
                </script>

                <div class="row mb-4">
                  <label for="vehicle_no" class="col-sm-2 col-form-label">Vehicle No</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Vehicle No" class="form-control" id="vehicle_no" name="vehicle_no">
                    <label id="vehicle_no_validation" class="text-danger"><small>*Enter Vehicle No</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="container_no" class="col-sm-2 col-form-label">Container No</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Container No" class="form-control" id="container_no" name="container_no">
                    <label id="container_no_validation" class="text-danger"><small>*Enter Container No</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Remarks" class="form-control" id="remarks" name="remarks">
                    <label id="remarks_validation" class="text-danger"><small>*Enter Remarks</small></label>
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
    // $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_name = $_POST['product_name'];  
    $sanitized_product_name = [];
    foreach ($product_name as $product_name) {
      $sanitized_product_name[] = mysqli_real_escape_string($conn, $product_name);
    }
  
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
    $date =  mysqli_real_escape_string($conn, $_POST['date']);  
    $vehicle_no = mysqli_real_escape_string($conn, $_POST['vehicle_no']);
    $container_no = mysqli_real_escape_string($conn, $_POST['container_no']);

  // Prepare and bind
  for ($i = 0; $i < count($sanitized_product_name); $i++) {

    $stmt = $conn->prepare("INSERT INTO `inward_master`(`place`, `supplier_name`, `product_name`, `quality`, `bags`, `total_kg`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`, `vehicle_no`, `container_no`, `lot_no`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssssss", $place, $supplier_name, $sanitized_product_name[$i], $quality, $bags, $each_bag_weight, $rate, $om_exim_weighbridge_weight, $other_weighbridge_weight, $weight_as_per_average_bag_weight, $bill_weight, $weight_supervisor_name, $quality_supervisor_name, $remarks, $date, $vehicle_no, $container_no, $lot_no);

    if ($stmt->execute()) {

      $activity_details = "entered inward record";

      $stmt = $conn->prepare("INSERT INTO activity_master (user_id, email, user_type, activity_timestamp, activity_details) VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?)");
      $stmt->bind_param('isss', $_SESSION['id'], $_SESSION['username'], $_SESSION['role'], $activity_details);
      $stmt->execute();

    } else {
        echo "Error: " . $stmt->error;
    }

  $stmt->close();

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO `inward_master_v2`(`place`, `supplier_name`, `product_name`, `quality`, `bags`, `total_kg`, `main_kg`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`, `vehicle_no`, `container_no`, `lot_no`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssssssss", $place, $supplier_name, $sanitized_product_name[$i], $quality, $bags, $each_bag_weight, $each_bag_weight, $rate, $om_exim_weighbridge_weight, $other_weighbridge_weight, $weight_as_per_average_bag_weight, $bill_weight, $weight_supervisor_name, $quality_supervisor_name, $remarks, $date, $vehicle_no, $container_no, $lot_no);
      
      $stmt->execute();
      $stmt->close();
      
      
    }
    $conn->close(); 
echo "<script>alert('Form Submitted Successfully')</script>";

echo "<script>window.location = 'inward-form.php';</script>";
}

?>


<script>
  document.getElementById('add-product-weight').addEventListener('click', function() {
  // Get the container where the product and weight fields are located
  var container = document.getElementById('product-weight-container');

  // Clone the existing product and weight fields
  var newFields = container.firstElementChild.cloneNode(true);

  // Append the new fields to the container
  container.appendChild(newFields);

  // Clone the second row containing the weight input
  var newWeightFields = container.children[1].cloneNode(true);

  // Append the new weight fields to the container
  container.appendChild(newWeightFields);
});
</script>