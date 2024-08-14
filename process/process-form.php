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


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

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
    checkField("process_name", "process_name_validation");
    checkField("foreign_buyer_name", "foreign_buyer_name_validation");
    // checkField("product_name", "product_name_validation");
    // checkField("weight_quality", "weight_quality_validation");
    // checkField("each_bag_weight", "each_bag_weight_validation");
    checkField("remarks", "remarks_validation");

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
    // checkNumericField("each_bag_weight", "each_bag_weight_validation");
    // checkNumericField("rate", "rate_validation");
    // checkNumericField("om_exim_weighbridge_weight", "om_exim_weighbridge_weight_validation");
    // checkNumericField("other_weighbridge_weight", "other_weighbridge_weight_validation");
    // checkNumericField("weight_as_per_average_bag_weight", "weight_as_per_average_bag_weight_validation");
    // checkNumericField("bill_weight", "bill_weight_validation");

    const formFields = [
    "place", "process_name", "foreign_buyer_name", "remarks"
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
      <h1>Process Inward</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
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
                <label for="process_name" class="col-sm-2 col-form-label">Process Name</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Process Name" class="form-control" id="process_name" name="process_name">
                  <label id="process_name_validation" class="text-danger"><small>*Enter Process Name</small></label>
                </div>
              </div>
              <div class="row mb-4">
                <label for="foreign_buyer_name" class="col-sm-2 col-form-label">Foreign Buyer Name</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Foreign Buyer Name" class="form-control" id="foreign_buyer_name" name="foreign_buyer_name">
                  <label id="foreign_buyer_name_validation" class="text-danger"><small>*Enter Foreign Buyer Name</small></label>
                </div>
              </div>

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
      <label for="weight_quality" class="col-sm-2 col-form-label">Product Quality</label>
      <div class="col-sm-10">
        <input type="text" placeholder="Enter Product Quality" class="form-control" id="weight_quality" name="weight_quality[]">
        <label id="weight_quality_validation" class="text-danger"><small>*Select Product Quality</small></label>
      </div>
    </div>
    
    <div class="row mb-4">
      <label class="col-sm-2 col-form-label">Supplier Name</label>
      <div class="col-sm-10">
        <input type="hidden" class="form-control supplier_name" style="background-color:white !important; border:none !important;" id="supplier_name" name="supplier_name[]">
        <label class="col-sm-2 col-form-label" id="lbl_supplier_name"></label>
      </div>
    </div>

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



<script>
// $(document).ready(function() {
//     $('#add-section').click(function() {
//       var newSection = $('.dynamic-section:first').clone();
//       newSection.find('input').val('');
//       newSection.find('select').val('').trigger('change');
//       $('#form-container').append(newSection);
//       newSection.find('.dynamic-section').select2();  // Reinitialize select2 for the new select element
//     });
//   });
</script>

              <div class="row mb-4">
                <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Remarks" class="form-control" id="remarks" name="remarks">
                  <label id="remarks_validation" class="text-danger"><small>*Enter Remarks</small></label>

                </div>
              </div>

              <div hidden class="row mb-4">
                  <label class="col-sm-2 col-form-label">Lot No</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" style="background-color:white !important; border:none !important;" id="lot_no" name="lot_no">
                    <label class="col-sm-2 col-form-label" id="lbl_lot_no"></label>
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

  <script>

        //   $(document).ready(function(){
        //     $('#product_name').change(function(){
        //         var product_name = $(this).val();
                
        //         $.ajax({
        //             url: 'fetch_bags.php',
        //             type: 'post',
        //             data: { product_name: product_name },
        //             dataType: 'json',
        //             success:function(response){
        //                 var len = response.length;
                        
        //                 $('#each_bag_weight').empty();
        //                 $('#max_total_kg_1').text(response[0]['total_kg']);
        //                 $('#max_total_kg_2').text(response[0]['total_kg']);
        //                 $('#available_kg').val(response[0]['total_kg']);
        //                 $('#product_id').val(response[0]['id']);
        //                 $('#lot_no').val(response[0]['lot_no']);
        //                 $('#lbl_lot_no').text(response[0]['lot_no']);
        //                 $('#supplier_name').val(response[0]['supplier_name']);
        //                 $('#lbl_supplier_name').text(response[0]['supplier_name']);
        //                 $('#only_product_name').val(response[0]['product_name']);
        //             }
        //         });
        //     });
        // });


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


  $place = mysqli_real_escape_string($conn, $_POST['place']);
  $process_name = mysqli_real_escape_string($conn, $_POST['process_name']);
  $foreign_buyer_name = mysqli_real_escape_string($conn, $_POST['foreign_buyer_name']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);

  // $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);  
  // $weight_quality = mysqli_real_escape_string($conn, $_POST['weight_quality']);
  // $total_kg = mysqli_real_escape_string($conn, $_POST['each_bag_weight']);
  // $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
  // $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
  // $only_product_name = mysqli_real_escape_string($conn, $_POST['only_product_name']);
  
  $lot_no = mysqli_real_escape_string($conn, $_POST['lot_no']);
  $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
  
  $product_name = $_POST['product_name'];  
  $sanitized_product_name = [];
  foreach ($product_name as $product_name) {
    $sanitized_product_name[] = mysqli_real_escape_string($conn, $product_name);
  }

  $weight_quality = $_POST['weight_quality'];
  $sanitized_weight_quality = [];
  foreach ($weight_quality as $weight_quality) {
    $sanitized_weight_quality[] = mysqli_real_escape_string($conn, $weight_quality);
  }

  $total_kg = $_POST['each_bag_weight'];
  $sanitized_total_kg = [];
  foreach ($total_kg as $total_kg) {
    $sanitized_total_kg[] = mysqli_real_escape_string($conn, $total_kg);
  }

  $supplier_name = $_POST['supplier_name'];
    $sanitized_supplier_name = [];
  foreach ($supplier_name as $supplier_name) {
    $sanitized_supplier_name[] = mysqli_real_escape_string($conn, $supplier_name);
  }

  $only_product_name = $_POST['only_product_name'];
  $sanitized_only_product_name = [];
  foreach ($only_product_name as $only_product_name) {
    $sanitized_only_product_name[] = mysqli_real_escape_string($conn, $only_product_name);
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


  // echo "<script>alert('$sanitized_product_names[0]')</script>";

  for ($i = 0; $i < count($sanitized_only_product_name); $i++) {
    // echo $sanitized_only_product_name[$i] . "<br>";

      $sql = "INSERT INTO `process_master`(`place`, `process_name`, `foreign_buyer_name`, `product_name`, `weight_quality`, `total_kg`, `remarks`, `date`, `supplier_name`, `lot_no`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

      $stmt = $conn->prepare($sql);
      
      $stmt->bind_param("ssssssssss", $place, $process_name, $foreign_buyer_name, $sanitized_only_product_name[$i], $sanitized_weight_quality[$i], $sanitized_total_kg[$i], $remarks, $date, $sanitized_supplier_name[$i], $lot_no);

      if ($stmt->execute()) {
          echo "<script>alert('Form Submitted Successfully')</script>";
          $activity_details = "entered process inward record";
            
          $stmt = $conn->prepare("
              INSERT INTO activity_master (user_id, email, user_type, activity_timestamp, activity_details)
              VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?)");
          $stmt->bind_param('isss', $_SESSION['id'], $_SESSION['username'], $_SESSION['role'], $activity_details);
          $stmt->execute();
      } else {
          echo "<script>alert('Form Not Submitted')</script>";
      }
      
      $stmt->close();

      
      // $available_kg = mysqli_real_escape_string($conn, $_POST['available_kg']);
      // $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);


    
      $kg = floatval($sanitized_available_kg[$i]) - floatval($sanitized_total_kg[$i]);


      if ((float)$kg > 0) {
        $stmt = $conn->prepare("UPDATE `inward_master_v2` SET `total_kg` = ? WHERE `id` = ?");
        $stmt->bind_param("si", $kg, $sanitized_product_id[$i]);
        $stmt->execute();
        $stmt->close();
      } else {
        $stmt = $conn->prepare("DELETE from `inward_master_v2` WHERE `id` = ?");
        $stmt->bind_param("i", $sanitized_product_id[$i]);
        $stmt->execute();
        $stmt->close();
      }

  }

  

  

  
  
  $conn->close();

  
}






?>
