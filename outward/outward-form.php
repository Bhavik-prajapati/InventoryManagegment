<?php
  include("../config/connection.php");
  $in_sql = "SELECT * FROM inward_master_v2";
  $in_result = $conn->query($in_sql);
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

<!-- <link rel="stylesheet" href="style.css"> -->

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
    checkField("date", "date_validation");
    checkField("product_name", "product_name_validation");
    checkField("quality", "quality_validation");
    checkField("foreign_buyer_name", "foreign_buyer_name_validation");
    checkField("vehicle_number", "vehicle_number_validation");
    checkField("container_number", "container_number_validation");
    checkField("quantity_per_kg", "quantity_per_kg_validation");
    checkField("supervisor_name", "supervisor_name_validation");
    checkField("gate_person_name", "gate_person_name_validation");
    checkField("remarks", "remarks_validation");
    checkField("place", "place_validation");
    checkField("bags_quantity", "bags_quantity_validation");
    checkField("weighbridge_weight", "weighbridge_weight_validation");
    checkField("invoice_bridge_weight", "invoice_bridge_weight_validation");
    checkField("invoice", "invoice_validation");
    checkField("total_kg", "total_kg_validation");

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
      "date", "place", "product_name", "quality", "bags_quantity", "foreign_buyer_name",
      "vehicle_number", "container_number", "quantity_per_kg",
      "supervisor_name", "gate_person_name", "remarks", "weighbridge_weight", "invoice_bridge_weight", "invoice", "total_kg"
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
  <div class="body-overlay">
    
    
    <?php
    include("layout/header.php");
    include("layout/aside.php");
    ?>

<main id="main" class="main">
  
  <div class="pagetitle">
    <h1>Outward Form</h1>
  </div><!-- End Page Title -->
  
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"></h5>
            
            <form name="dataForm" method="post" action="" onsubmit="return validateForm(true)">
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
                <label id="place_validation" class="text-danger"><small>*Please enter the place.</small></label>
              </div>
            </div>

            <div class="row mb-4">
              <label for="product_name" class="col-sm-2 col-form-label">Product</label>
              <div class="col-sm-10">
                <select class="form-select dropdown-class" aria-label="Default select example" id="product_name" name="product_name[]" multiple>
                  
                  <?php
                    if ($in_result->num_rows > 0) {
                      while($in_row = $in_result->fetch_assoc()) {
                        ?>
                        <!-- <option value="<?php echo $in_row["product_name"].",".$in_row["id"] ?>"><?php echo $in_row["product_name"].", Supplier Name: ".$in_row["supplier_name"].", Date: ".$in_row["date"].", Lot No: ".$in_row["lot_no"] ?></option> -->
                        <option value="<?php echo $in_row["product_name"].",".$in_row["id"] ?>"><?php echo $in_row["product_name"].", Date: ".$in_row["date"].", Lot No: ".$in_row["lot_no"] ?></option>
                  <?php 
                      }
                    }
                    ?>
                </select>
                <label id="product_name_validation" class="text-danger"><small>*Please select a product.</small></label>
              </div>
            </div>
            
            <script>
                  $(document).ready(function() {
                    $('#product_name').select2();
                  });
                </script>


<div class="row mb-4">
                  <label class="col-sm-2 col-form-label">Total kg</label>
                  <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter Total kg" id="total_kg" name="total_kg">
                    <label class="text-danger" id="total_kg_validation"><small>*Enter Total kg</small></label>
                  </div>
                </div>

            <div class="row mb-4">
              <label for="quality" class="col-sm-2 col-form-label">Quality FG</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Enter Quality FG" class="form-control" id="quality" name="quality">
                <label id="quality_validation" class="text-danger"><small>*Please enter the quality FG.</small></label>
              </div>
            </div>
            
            <div class="row mb-4">
              <label for="bags_quantity" class="col-sm-2 col-form-label">Bags Quantity</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Enter Bags Quantity" class="form-control" id="bags_quantity" name="bags_quantity">
                <label id="bags_quantity_validation" class="text-danger"><small>*Please enter the Bags Quantity.</small></label>
              </div>
            </div>

            <div class="row mb-4">
              <label for="foreign_buyer_name" class="col-sm-2 col-form-label">Buyer Name</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Enter Buyer Name" class="form-control" id="foreign_buyer_name" name="foreign_buyer_name">
                <label id="foreign_buyer_name_validation" class="text-danger"><small>*Please enter the buyer's name.</small></label>
              </div>
            </div>
            
            <div class="row mb-4">
              <label for="vehicle_number" class="col-sm-2 col-form-label">Vehicle Number</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Enter Vehicle Number" class="form-control" id="vehicle_number" name="vehicle_number">
                <label id="vehicle_number_validation" class="text-danger"><small>*Please enter the vehicle number.</small></label>
              </div>
            </div>
            
            <div class="row mb-4">
              <label for="container_number" class="col-sm-2 col-form-label">Container Number</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Enter Container Number" class="form-control" id="container_number" name="container_number">
                <label id="container_number_validation" class="text-danger"><small>*Please enter the container number.</small></label>
              </div>
            </div>
            
            <div class="row mb-4">
              <label for="quantity_per_kg" class="col-sm-2 col-form-label">Each Bag Weight</label>
              <div class="col-sm-10">
                <input type="number" step="0.00000000001" placeholder="Enter Each Bag Weight" class="form-control" id="quantity_per_kg" name="quantity_per_kg">
                <label id="quantity_per_kg_validation" class="text-danger"><small>*Please enter the Each Bag Weight.</small></label>
              </div>
            </div>
            
            <div class="row mb-4">
              <label for="supervisor_name" class="col-sm-2 col-form-label">Supervisor Name</label>
              <div class="col-sm-10">
                <!-- <input type="text" placeholder="Enter Supervisor Name" class="form-control" id="supervisor_name" name="supervisor_name"> -->
                <select class="form-select dropdown-class" aria-label="Default select example" id="supervisor_name" name="supervisor_name">
                      <option value="" selected disabled>- - Select Supervisor Name - -</option>
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
                <label id="supervisor_name_validation" class="text-danger"><small>*Please select the supervisor's name.</small></label>
              </div>
            </div>

            <script>
                  $(document).ready(function() {
                    $('#supervisor_name').select2();
                  });
                </script>


            <div class="row mb-4">
              <label for="gate_person_name" class="col-sm-2 col-form-label">Gate Person Name</label>
              <div class="col-sm-10">
                <!-- <input type="text" placeholder="Enter Gate Person Name" class="form-control" id="gate_person_name" name="gate_person_name"> -->
                <select class="form-select dropdown-class" aria-label="Default select example" id="gate_person_name" name="gate_person_name">
                      <option value="" selected disabled>- - Select Gate Person Name - -</option>
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
                <label id="gate_person_name_validation" class="text-danger"><small>*Please enter the gate person's name.</small></label>
              </div>
            </div>

            <script>
                  $(document).ready(function() {
                    $('#gate_person_name').select2();
                  });
                </script>


            <div class="row mb-4">
              <label for="weighbridge_weight" class="col-sm-2 col-form-label">Weighbridge Weight</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Enter Weighbridge Weight" class="form-control" id="weighbridge_weight" name="weighbridge_weight">
                <label id="weighbridge_weight_validation" class="text-danger"><small>*Please enter the Weighbridge Weight.</small></label>
              </div>
            </div>

            <div class="row mb-4">
              <label for="invoice_bridge_weight" class="col-sm-2 col-form-label">Invoice Bridge Weight</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Enter Invoice Bridge Weight" class="form-control" id="invoice_bridge_weight" name="invoice_bridge_weight">
                <label id="invoice_bridge_weight_validation" class="text-danger"><small>*Please enter the Invoice Bridge Weight.</small></label>
              </div>
            </div>
            
            <div class="row mb-4">
              <label for="invoice" class="col-sm-2 col-form-label">Invoice</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Enter Invoice" class="form-control" id="invoice" name="invoice">
                <label id="invoice_validation" class="text-danger"><small>*Please enter the Invoice.</small></label>
              </div>
            </div>

            <div class="row mb-4">
              <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Enter Remarks" class="form-control" id="remarks" name="remarks">
                <label id="remarks_validation" class="text-danger"><small>*Please enter remarks.</small></label>
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

</div>
</body>

</html>


<?php
if (isset($_POST['btnSubmit'])) {
   // Collect and escape form data
$product_name_id = $_POST['product_name'];
$product_name_id_array = explode(",", $product_name_id);

$date = mysqli_real_escape_string($conn, $_POST['date']);
// $product_name = mysqli_real_escape_string($conn, $product_name_id_array[0]);
  $product_name = $_POST['product_name'];  
  $sanitized_product_name = [];
  foreach ($product_name as $product_name) {
    $sanitized_product_name[] = mysqli_real_escape_string($conn, $product_name);
  }
$quality = mysqli_real_escape_string($conn, $_POST['quality']);
$totalkg = mysqli_real_escape_string($conn, $_POST['totalkg']);
$foreign_buyer_name = mysqli_real_escape_string($conn, $_POST['foreign_buyer_name']);
$vehicle_number = mysqli_real_escape_string($conn, $_POST['vehicle_number']);
$container_number = mysqli_real_escape_string($conn, $_POST['container_number']);
$quantity_per_kg = mysqli_real_escape_string($conn, $_POST['quantity_per_kg']);
$supervisor_name = mysqli_real_escape_string($conn, $_POST['supervisor_name']);
$gate_person_name = mysqli_real_escape_string($conn, $_POST['gate_person_name']);
$remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
$place = mysqli_real_escape_string($conn, $_POST['place']);
$bags_quantity = mysqli_real_escape_string($conn, $_POST['bags_quantity']);
$weighbridge_weight = mysqli_real_escape_string($conn, $_POST['weighbridge_weight']);
$invoice_bridge_weight = mysqli_real_escape_string($conn, $_POST['invoice_bridge_weight']);
$invoice = mysqli_real_escape_string($conn, $_POST['invoice']);

// Prepare the SQL query to insert data into the `outward_master` table
for ($i = 0; $i < count($sanitized_product_name); $i++) {

$sql = "INSERT INTO outward_master (date, product, quality,totalkg, buyer_name, vehicle_number, container_number, quantity_per_kg, supervisor_name, gate_person_name, remarks, place,	bags_quantity, weighbridge_weight, invoice_bridge_weight, invoice) 
        VALUES ('$date', '$sanitized_product_name[$i]', '$quality',$totalkg, '$foreign_buyer_name', '$vehicle_number', '$container_number', '$quantity_per_kg', '$supervisor_name', '$gate_person_name', '$remarks', '$place', '$bags_quantity', '$weighbridge_weight', '$invoice_bridge_weight', '$invoice')";

if ($conn->query($sql) === TRUE) {

    $activity_details = "entered outward record";
        
    $stmt = $conn->prepare("
        INSERT INTO activity_master (user_id, email, user_type, activity_timestamp, activity_details)
        VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?)");
    $stmt->bind_param('isss', $_SESSION['id'], $_SESSION['username'], $_SESSION['role'], $activity_details);
    $stmt->execute();

    // Delete from process_master using id
    $stmt1 = $conn->prepare("DELETE FROM inward_master_v2 WHERE id = ?");
    $stmt1->bind_param('i', $product_name_id_array[1]);
    $stmt1->execute();
}

   echo "<script>alert('Form Submitted Successfully')</script>";
    $stmt1->close();

} else {
  echo "<script>alert('Form Not Submitted')</script>";

    // echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
}
?>
