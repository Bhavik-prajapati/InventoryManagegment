<?php
  include("../config/connection.php");
  
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
    // checkField("product_name", "product_name_validation");
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
    // checkField("totalkg", "totalkg_validation");

    function checkNumericField(fieldName, labelId) {
      let field = form[fieldName].value;
      if (field > parseFloat(document.getElementById("max_total_kg_1").innerText)) {
        document.getElementById(labelId).style.display = 'block';
        valid = false;
      }
      else{
        document.getElementById(labelId).style.display = 'none';
      }
    }

    checkNumericField("each_bag_weight", "total_kg_overflow_validation");

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
      "date", "place", "quality", "bags_quantity", "foreign_buyer_name",
      "vehicle_number", "container_number", "quantity_per_kg",
      "supervisor_name", "gate_person_name", "remarks", "weighbridge_weight", "invoice_bridge_weight", "invoice"
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
<!-- Container to hold the fields and dynamically added fields -->


<div id="form-container">
  <section class="dynamic-section">
  <div class="row mb-4">
  <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
  <div class="col-sm-10">
  <select class="form-select dropdown-class" aria-label="Default select example" id="product_name" name="product_name[]">
      <option value="" selected disabled>- - Select Product - -</option>
      <?php
        $in_sql = "SELECT * FROM inward_master_v2";
        $in_result = $conn->query($in_sql);
        if ($in_result->num_rows > 0) {
          while($in_row = $in_result->fetch_assoc()) {
      ?>
      <option value="<?php echo $in_row["id"] ?>"><?php echo $in_row["product_name"].", Supplier Name: ".$in_row["supplier_name"].", Date: ".$in_row["date"].", Lot No: ".$in_row["lot_no"] ?></option>
      <?php 
          }
        }
      ?>
    </select>
    <label id="product_name_validation" class="text-danger"><small>*Select Product Name</small></label>
  </div>
</div>

<script>
  $(document).ready(function() {
    // Initialize Select2 for all elements with the class 'product-name-select'
    $('.product-name-select').select2();
  });
</script>

    <div class="row mb-4">
      <label for="each_bag_weight" class="col-sm-2 col-form-label">Total Kg</label>
      <div class="col-sm-10">
        <div class="input-group">
          <span class="input-group-text">
            <label>Available: <span class="max_total_kg_1" id="max_total_kg_1">0</span>kg</label>
          </span>
          <input type="hidden" class="product_id" id="product_id" name="product_id[]">
          <input type="hidden" class="available_kg" id="available_kg" name="available_kg[]">
          <input type="hidden" class="only_product_name" id="only_product_name" name="only_product_name[]">
          <input type="number" step="0.00000000001" placeholder="Enter Kg" class="form-control" id="each_bag_weight" name="each_bag_weight[]">
        </div>
        <label id="each_bag_weight_validation" class="text-danger"><small>*Enter Total Kg</small></label>
        <label id="total_kg_overflow_validation" class="text-danger"><small>*Weight exceeds the <span class="max_total_kg_2" id="max_total_kg_2">0</span> limit.</small></label>
      </div>
    </div>
  </section>
</div>

<button type="button" id="add-section" class="btn btn-primary">+</button>


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
   $sanitized_product_name_id = [];
   foreach ($product_name_id as $product_name_id) {
     $sanitized_product_name_id[] = mysqli_real_escape_string($conn, $product_name_id);
    }
    
    // $product_name_id_array = explode(",", $product_name_id);
    
    
    // $product_name = mysqli_real_escape_string($conn, $product_name_id_array[0]);
    
    
    $totalkg = $_POST['each_bag_weight'];  
    $sanitized_totalkg = [];
    foreach ($totalkg as $totalkg) {
        $sanitized_totalkg[] = mysqli_real_escape_string($conn, $totalkg);
  }

  $available_kg = $_POST['available_kg'];
  $sanitized_available_kg = [];
  foreach ($available_kg as $available_kg) {
    $sanitized_available_kg[] = mysqli_real_escape_string($conn, $available_kg);
  }

  $product_id = $_POST['product_id'];
  $sanitized_product_id = [];
  foreach ($product_id as $product_id) {
    $sanitized_product_id[] = mysqli_real_escape_string($conn, $product_id);
  }


  
  $only_product_name = $_POST['only_product_name'];
  $sanitized_only_product_name = [];
  foreach ($only_product_name as $only_product_name) {
    $sanitized_only_product_name[] = mysqli_real_escape_string($conn, $only_product_name);
  }


  $date = mysqli_real_escape_string($conn, $_POST['date']);
$quality = mysqli_real_escape_string($conn, $_POST['quality']);
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

for ($i = 0; $i < count($sanitized_product_name_id); $i++) {
  
  // echo "<script>alert('$sanitized_product_name_id[$i]')</script>";

  // $product_array = explode(",", $sanitized_product_name_id[$i]);

  
    $product_name = $sanitized_only_product_name[$i];
    $product_id_inner = $sanitized_product_name_id[$i];
  

  $sql = "INSERT INTO outward_master (date, product, quality,totalkg, buyer_name, vehicle_number, container_number, quantity_per_kg, supervisor_name, gate_person_name, remarks, place,	bags_quantity, weighbridge_weight, invoice_bridge_weight, invoice) 
        VALUES ('$date', '$product_name', '$quality','$sanitized_totalkg[$i]', '$foreign_buyer_name', '$vehicle_number', '$container_number', '$quantity_per_kg', '$supervisor_name', '$gate_person_name', '$remarks', '$place', '$bags_quantity', '$weighbridge_weight', '$invoice_bridge_weight', '$invoice')";

  if ($conn->query($sql) === TRUE) {

      $activity_details = "entered outward record";
          
      $stmt = $conn->prepare("
          INSERT INTO activity_master (user_id, email, user_type, activity_timestamp, activity_details)
          VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?)");
      $stmt->bind_param('isss', $_SESSION['id'], $_SESSION['username'], $_SESSION['role'], $activity_details);
      $stmt->execute();

      // Delete from process_master using id

  
      $kg = floatval($sanitized_available_kg[$i]) - floatval($sanitized_totalkg[$i]);


      if ((float)$kg > 0) {
        $stmt1 = $conn->prepare("UPDATE `inward_master_v2` SET `total_kg` = ? WHERE `id` = ?");
        $stmt1->bind_param("si", $kg, $sanitized_product_id[$i]);
        $stmt1->execute();
        $stmt1->close();
      } else {
        $stmt1 = $conn->prepare("DELETE from `inward_master_v2` WHERE `id` = ?");
        $stmt1->bind_param("i", $sanitized_product_id[$i]);
        $stmt1->execute();
        $stmt1->close();
      }

    }

  
}

echo "<script>alert('Form Submitted Successfully')</script>";
// Close the database connection
$conn->close();
}
?>

<script>


  $(document).ready(function() {
  function initializeSection(section) {
  // Initialize Select2 for the specific section
  section.find('.product-name-select').select2();

  // Handle change event for the specific product_name dropdown within the section
  section.find('#product_name').change(function() {
      var product_name = $(this).val();
      var section = $(this).closest('.dynamic-section'); // Get the specific section

      $.ajax({
          url: 'fetch_bags.php',
          type: 'post',
          data: { product_name: product_name },
          dataType: 'json',
          success: function(response) {
              section.find('#each_bag_weight').empty();
              section.find('#max_total_kg_1').text(response[0]['total_kg']);
              section.find('#max_total_kg_2').text(response[0]['total_kg']);
              section.find('#available_kg').val(response[0]['total_kg']);
              section.find('#product_id').val(response[0]['id']);
              section.find('#lot_no').val(response[0]['lot_no']);
              section.find('#lbl_lot_no').text(response[0]['lot_no']);
              section.find('#supplier_name').val(response[0]['supplier_name']);
              section.find('#lbl_supplier_name').text(response[0]['supplier_name']);
              section.find('#only_product_name').val(response[0]['product_name']);
          }
      });
  });
  }

  // Initialize the first section
  initializeSection($('.dynamic-section:first'));

  // Handle adding new sections
  $('#add-section').click(function() {
  var newSection = $('.dynamic-section:first').clone();
  newSection.find('input').val('');
  newSection.find('select').val('').trigger('change');
  $('#form-container').append(newSection);

  // Initialize the new section
  initializeSection(newSection);
  });
  });



</script>

