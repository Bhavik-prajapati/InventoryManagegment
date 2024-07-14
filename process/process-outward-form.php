<?php
  include("../config/connection.php");
  $in_sql = "SELECT * FROM process_master";
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
    // checkField("date", "date_validation");
    checkField("product_name", "product_name_validation");
    checkField("quality", "quality_validation");
    // checkField("one_no", "one_no_validation");
    // checkField("two_no", "two_no_validation");
    // checkField("three_no", "three_no_validation");
    // checkField("waste_product_weight", "waste_product_weight_validation");
    checkField("remarks", "remarks_validation");

    // function checkNumericField(fieldName, labelId) {
    //   let field = form[fieldName].value;
    //   if (field > parseFloat(document.getElementById("max_total_kg_1").innerText)) {
    //     document.getElementById(labelId).style.display = 'block';
    //     valid = false;
    //   }
    //   else{
    //     document.getElementById(labelId).style.display = 'none';
    //   }
    // }

    // checkNumericField("each_bag_weight", "total_kg_overflow_validation");

    // checkNumericField("each_bag_weight", "each_bag_weight_validation");
    // checkNumericField("rate", "rate_validation");
    // checkNumericField("om_exim_weighbridge_weight", "om_exim_weighbridge_weight_validation");
    // checkNumericField("other_weighbridge_weight", "other_weighbridge_weight_validation");
    // checkNumericField("weight_as_per_average_bag_weight", "weight_as_per_average_bag_weight_validation");
    // checkNumericField("bill_weight", "bill_weight_validation");

    const formFields = [
        "date", "product_name", "quality", "remarks"
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
      <h1>Process Outward</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <form  name="dataForm" method="post" action="" onsubmit="return validateForm(true)">
              <div class="row mb-4">
                <label for="place" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                  <input type="date" placeholder="Enter Date" class="form-control" id="date" name="date">
                  <!-- <label id="date_validation" class="text-danger"><small>*Enter Place</small></label> -->
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
                <input type="hidden" id="used_total_kg" name="used_total_kg">
                <input type="hidden" id="selected_product_name" name="selected_product_name">
                <input type="hidden" id="supplier_name" name="supplier_name">
                <input type="hidden" id="lot_no" name="lot_no">
              </div>

              <script>
                  $(document).ready(function() {
                    $('#product_name').select2();
                  });
                </script>

              <div class="row mb-4">
                <label for="quality" class="col-sm-2 col-form-label">Quality FG</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Quality FG" class="form-control" id="quality" name="quality">
                  <label id="quality_validation" class="text-danger"><small>*Enter Quality FG</small></label>
                </div>
              </div>

              <div class="row mb-4">
                  <label class="col-sm-2 col-form-label">Available Quantity</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" style="background-color:white !important; border:none !important;" id="available_quantity" name="available_quantity">
                    <label class="col-sm-2 col-form-label" id="lbl_available_quantity"></label>
                    <!-- <label id="remarks_validation" class="text-danger"><small>*Enter Remarks</small></label> -->
                  </div>
                </div>

            <!--   <div class="row mb-4">
                <label for="one_no" class="col-sm-2 col-form-label">Provided</label>
                <div class="col-sm-10">
                  <input type="number" step="0.00000000001" value="0" placeholder="Enter Provided" class="form-control" id="one_no" name="one_no">
                  <label id="one_no_validation" class="text-danger"><small>*Enter Provided</small></label>
                </div>
              </div>

              <div class="row mb-4">
                <label for="two_no" class="col-sm-2 col-form-label">2 no</label>
                <div class="col-sm-10">
                  <input type="number" step="0.00000000001" value="0" placeholder="Enter 2 no." class="form-control" id="two_no" name="two_no">
                  <label id="two_no_validation" class="text-danger"><small>*Enter 2 no.</small></label>
                </div>
              </div>

              <div class="row mb-4">
                <label for="three_no" class="col-sm-2 col-form-label">3 no</label>
                <div class="col-sm-10">
                  <input type="number" step="0.00000000001" value="0" placeholder="Enter 3 no." class="form-control" id="three_no" name="three_no">
                  <label id="three_no_validation" class="text-danger"><small>*Enter 3 no.</small></label>
                </div>
              </div>

              <div class="row mb-4">
                <label for="waste_product_weight" class="col-sm-2 col-form-label">Waste Product Weight</label>
                <div class="col-sm-10">
                  <input type="number" step="0.00000000001" value="0" placeholder="Enter Waste Product Weight" class="form-control" id="waste_product_weight" name="waste_product_weight">
                  <label id="waste_product_weight_validation" class="text-danger"><small>*Enter Waste Product Weight</small></label>
                </div>
              </div>
 -->
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
            </form>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <script>

          $(document).ready(function(){
            $('#product_name').change(function(){
                var product_name = $(this).val();
                
                // AJAX request to fetch data based on selected product_name
                $.ajax({
                    url: 'fetch_process_inward.php',
                    type: 'post',
                    data: { product_name: product_name },
                    dataType: 'json',
                    success:function(response){
                        var len = response.length;
                        
                        $('#used_total_kg').val(response[0]['total_kg']);
                        $('#available_quantity').val(response[0]['total_kg']);
                        $('#lbl_available_quantity').text(response[0]['total_kg']);
                        $('#selected_product_name').val(response[0]['product_name']);
                        $('#supplier_name').val(response[0]['supplier_name']);
                        $('#lot_no').val(response[0]['lot_no']);
                    }
                });
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

    // Capture and sanitize form data
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $selected_product_name = mysqli_real_escape_string($conn, $_POST['selected_product_name']);
    $available_quantity = (float)$_POST['used_total_kg'];
    $used_total_kg = 0;
    $quality = mysqli_real_escape_string($conn, $_POST['quality']);
    $one_no =0;
    $two_no = 0;
    $three_no =0;
    $waste_product_weight =0;
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    $lot_no = mysqli_real_escape_string($conn, $_POST['lot_no']);

    $sum_of_kg = (float)$one_no + (float)$two_no + (float)$three_no + (float)$waste_product_weight;

    if ($sum_of_kg == $used_total_kg) {
      // Prepare and bind
      $stmt = $conn->prepare("INSERT INTO process_outward_master (date, product_name, quality, one_no, two_no, three_no, waste_product_weight, remarks, available_quantity, supplier_name, lot_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssssssss", $date, $selected_product_name, $quality,$one_no,$two_no,$three_no,$waste_product_weight, $remarks, $available_quantity, $supplier_name, $lot_no);
      
      // Execute the statement
      if ($stmt->execute()) {
        echo "<script>alert('Form Submitted Successfully')</script>";

        $activity_details = "entered process outward record";
        
        $stmt = $conn->prepare("
        INSERT INTO activity_master (user_id, email, user_type, activity_timestamp, activity_details)
        VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?)");
        $stmt->bind_param('isss', $_SESSION['id'], $_SESSION['username'], $_SESSION['role'], $activity_details);
        $stmt->execute();

        // Delete from process_master using id
        $stmt1 = $conn->prepare("DELETE FROM process_master WHERE id = ?");
        $stmt1->bind_param('i', $product_name);
        $stmt1->execute();
        $stmt1->close();


      } else {
        echo "Error: " . $stmt->error;
      }
      
      // Close connections
      $stmt->close();
      $conn->close();
      
    } else {
      echo "<script>alert('Form Not Submitted')</script>";
    }
      
  
}
?>
