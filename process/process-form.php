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
    checkField("product_name", "product_name_validation");
    checkField("weight_quality", "weight_quality_validation");
    checkField("each_bag_weight", "each_bag_weight_validation");
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
    "place", "process_name", "foreign_buyer_name", "product_name", 
    "weight_quality", "each_bag_weight", "remarks"
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
              <div class="row mb-4">
                <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-10">
                  <!-- <input type="text" placeholder="Enter Product Name" class="form-control" id="product_name" name="product_name"> -->
                  <select class="form-select dropdown-class" aria-label="Default select example" id="product_name" name="product_name">
                      <option value="" selected disabled>- - Select Product - -</option>
                      <?php
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
                    $('#product_name').select2();
                  });
                </script>

              <div class="row mb-4">
                <label for="weight_quality" class="col-sm-2 col-form-label">Product Quality</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Product Quality" class="form-control" id="weight_quality" name="weight_quality">
                  <label id="weight_quality_validation" class="text-danger"><small>*Select Product Quality</small></label>
                </div>
              </div>
              <div class="row mb-4">
                  <label class="col-sm-2 col-form-label">Supplier Name</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" style="background-color:white !important; border:none !important;" id="supplier_name" name="supplier_name">
                    <label class="col-sm-2 col-form-label" id="lbl_supplier_name"></label>
                    <!-- <label id="remarks_validation" class="text-danger"><small>*Enter Remarks</small></label> -->
                  </div>
                </div>
              <!-- <div class="row mb-4">
                <label for="bags_quantity" class="col-sm-2 col-form-label">Bags Quantity</label>
                <div class="col-sm-10">
                  <input type="hidden" class="form-control" id="totalbags" name="totalbags">
                  <select class="form-select" aria-label="Default select example" id="bags_quantity" name="bags_quantity">
                      <option selected disabled>- - Select Product First - -</option>
                    </select>
                </div>
              </div> -->
              <div class="row mb-4">
                <label for="each_bag_weight" class="col-sm-2 col-form-label">Total Kg</label>
                <div class="col-sm-10">
                <div class="input-group">
                  <span class="input-group-text">
                    <label>Available: <span id="max_total_kg_1">0</span>kg</label>
                  </span>
                  <input type="hidden" id="product_id" name="product_id">
                  <input type="hidden" id="available_kg" name="available_kg">
                  <input type="hidden" id="only_product_name" name="only_product_name">
                  <input type="number" step="0.00000000001" placeholder="Enter Kg" class="form-control" id="each_bag_weight" name="each_bag_weight">
                </div>
                <label id="each_bag_weight_validation" class="text-danger"><small>*Enter Total Kg</small></label>
                <label id="total_kg_overflow_validation" class="text-danger"><small>*Weight exceeds the <span id="max_total_kg_2">0</span> limit.</small></label>
                  <!-- <select class="form-select" aria-label="Default select example" id="each_bag_weight" name="each_bag_weight">
                      <option selected disabled>- - Select Bags Quantity First - -</option>
                    </select> -->

                    <!-- <input type="number" class="form-control" placeholder="Enter Each Bag Weight" list="each_bag_weight" name="each_bag_weight" id="input-datalist">
                    <datalist id="each_bag_weight">
                        <option>- - Select Product First - -</option>
                    </datalist>  -->

                </div>
              </div>
              <div class="row mb-4">
                <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Remarks" class="form-control" id="remarks" name="remarks">
                  <label id="remarks_validation" class="text-danger"><small>*Enter Remarks</small></label>

                </div>
              </div>

              <div class="row mb-4">
                  <label class="col-sm-2 col-form-label">Lot No</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" style="background-color:white !important; border:none !important;" id="lot_no" name="lot_no">
                    <label class="col-sm-2 col-form-label" id="lbl_lot_no"></label>
                    <!-- <label id="remarks_validation" class="text-danger"><small>*Enter Remarks</small></label> -->
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
          // $(document).ready(function(){
          //     $('#product_name').change(function(){
          //         var product_name = $(this).val();
                  
          //         // AJAX request to fetch data based on selected product_name
          //         $.ajax({
          //             url: 'fetch_bags.php',
          //             type: 'post',
          //             data: { product_name: product_name },
          //             dataType: 'json',
          //             success:function(response){
          //                 var maxBags = response[0]['bags'];  // Assuming response contains the maximum number of bags
          //                 $('#totalbags').val(maxBags);
          //                 $('#bags_quantity').empty();
          //                 $('#bags_quantity').append("<option selected disabled>- - Select Bags Quantity - -</option>");
          //                 for(var i = 1; i <= maxBags; i++){
          //                     $('#bags_quantity').append("<option value='"+i+"'>"+i+"</option>");
          //                 }
          //             }
          //         });
          //     });
          // });
          
          $(document).ready(function(){
            $('#product_name').change(function(){
                var product_name = $(this).val();
                
                // AJAX request to fetch data based on selected product_name
                $.ajax({
                    url: 'fetch_bags.php',
                    type: 'post',
                    data: { product_name: product_name },
                    dataType: 'json',
                    success:function(response){
                        var len = response.length;
                        
                        $('#each_bag_weight').empty();
                        $('#max_total_kg_1').text(response[0]['total_kg']);
                        $('#max_total_kg_2').text(response[0]['total_kg']);
                        $('#available_kg').val(response[0]['total_kg']);
                        $('#product_id').val(response[0]['id']);
                        $('#lot_no').val(response[0]['lot_no']);
                        $('#lbl_lot_no').text(response[0]['lot_no']);
                        $('#supplier_name').val(response[0]['supplier_name']);
                        $('#lbl_supplier_name').text(response[0]['supplier_name']);
                        $('#only_product_name').val(response[0]['product_name']);
                        // $('#each_bag_weight').append("<option selected disabled>- - Select Each Bag Weight - -</option>");
                        // for( var i = 0; i < len; i++){
                        //     var each_bag_weight = response[i]['total_kg'];
                            
                        //     $('#each_bag_weight').append("<option value='"+each_bag_weight+"'>"+each_bag_weight+"</option>");
                        // }
                    }
                });
            });
        });

    // $(document).ready(function(){
    //     $('#bags_quantity').change(function(){
    //         var bags_quantity = $(this).val();
            
    //         // AJAX request to fetch data based on selected bags_quantity
    //         $.ajax({
    //             url: 'fetch_each_bag_weight.php',
    //             type: 'post',
    //             data: { bags_quantity: bags_quantity },
    //             dataType: 'json',
    //             success:function(response){
    //                 var len = response.length;
                    
    //                 $('#each_bag_weight').empty();
    //                 $('#each_bag_weight').append("<option selected disabled>- - Select Each Bag Weight - -</option>");
    //                 for( var i = 0; i<len; i++){
    //                     var each_bag_weight = response[i]['each_bag_weight'];
                        
    //                     $('#each_bag_weight').append("<option value='"+each_bag_weight+"'>"+each_bag_weight+"</option>");
    //                 }
    //             }
    //         });
    //     });
    // });

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

  // Capture form data

  $place = mysqli_real_escape_string($conn, $_POST['place']);
  $process_name = mysqli_real_escape_string($conn, $_POST['process_name']);
  $foreign_buyer_name = mysqli_real_escape_string($conn, $_POST['foreign_buyer_name']);
  $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
  $weight_quality = mysqli_real_escape_string($conn, $_POST['weight_quality']);
  $total_kg = mysqli_real_escape_string($conn, $_POST['each_bag_weight']);
  $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
  $lot_no = mysqli_real_escape_string($conn, $_POST['lot_no']);
  $only_product_name = mysqli_real_escape_string($conn, $_POST['only_product_name']);
  
  // Prepare and bind
  $sql = "INSERT INTO `process_master`(`place`, `process_name`, `foreign_buyer_name`, `product_name`, `weight_quality`, `total_kg`, `remarks`, `date`, `supplier_name`, `lot_no`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  
  // Bind the parameters
  $stmt->bind_param("ssssssssss", $place, $process_name, $foreign_buyer_name, $only_product_name, $weight_quality, $total_kg, $remarks, $date, $supplier_name, $lot_no);

  // Execute the query
  if ($stmt->execute()) {
      echo "<script>alert('Form Submitted Successfully')</script>";
      $activity_details = "entered process inward record";
        
      $stmt = $conn->prepare("
          INSERT INTO activity_master (user_id, email, user_type, activity_timestamp, activity_details)
          VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?)");
      $stmt->bind_param('isss', $_SESSION['id'], $_SESSION['username'], $_SESSION['role'], $activity_details);
      $stmt->execute();
  } else {
      // echo "Error: " . $stmt->error;
      echo "<script>alert('Form Not Submitted')</script>";
  }
  
  // Close the connection
  $stmt->close();

  
  $available_kg = mysqli_real_escape_string($conn, $_POST['available_kg']);
  $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
 
  $kg = floatval($available_kg) - floatval($total_kg);


  if ((float)$kg > 0) {
    $stmt = $conn->prepare("UPDATE `inward_master_v2` SET `total_kg` = ? WHERE `id` = ?");
    $stmt->bind_param("si", $kg, $product_id);
    $stmt->execute();
    $stmt->close();
  } else {
    $stmt = $conn->prepare("DELETE from `inward_master_v2` WHERE `id` = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $stmt->close();
  }
  

  
  
  $conn->close();

  
}
?>
