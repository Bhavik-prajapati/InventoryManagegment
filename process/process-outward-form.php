<?php
  include("../config/connection.php");
  // $in_sql = "SELECT * FROM process_master";
  
  function getInwardMasterCount($conn) {
    $sql = "SELECT COUNT(*) as count FROM outward_lot_master";
    $result = $conn->query($sql);

    if ($result) {
      $row = $result->fetch_assoc();
      return $row['count'];
    } else {
      return 0;
    }
  }
  $count = getInwardMasterCount($conn) + 1;
  
  
  $in_sql = "SELECT final_product, COUNT(*) as total_count FROM process_master GROUP BY final_product";

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
    checkField("place", "place_validation");
    checkField("product_name", "product_name_validation");
    checkField("quality", "quality_validation");
    // checkField("f_product_name", "f_product_name_validation");
    // checkField("quantity_fg", "quantity_fg_validation");
    // checkField("lot", "lot_validation");
    checkField("total_kg", "total_kg_validation");
    checkField("rate", "rate_validation");
    checkField("supplier_name", "supplier_name_validation");
    // checkField("two_no", "two_no_validation");
    // checkField("three_no", "three_no_validation");
    // checkField("waste_product_weight", "waste_product_weight_validation");
    // checkField("remarks", "remarks_validation");

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
        "date", "place", "product_name", "quality",  "total_kg", "rate", "supplier_name"
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
            <h5 class="card-title" style="border-bottom: 1px solid #daeeff; margin-bottom: 20px;">
              <?php 
                $date = date('Y/m/d');
                $lot_no = "FG/".$date."/".$count;
                echo $lot_no; 
              ?>
              </h5>
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
                <label for="place" class="col-sm-2 col-form-label">Place</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Place" class="form-control" id="place" name="place">
                  <label id="place_validation" class="text-danger"><small>*Enter Place</small></label>
                </div>
              </div>

              <div class="row mb-4">
                <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-10">
                  <!-- <input type="text" placeholder="Enter Product Name" class="form-control" id="product_name" name="product_name"> -->
                  <select class="form-select dropdown-class" aria-label="Default select example" id="product_name" name="product_name[]">
                      <option value="" selected disabled>- - Select Product - -</option>
                      <?php
                        // if ($in_result->num_rows > 0) {
                        //   while($in_row = $in_result->fetch_assoc()) {
                      ?>
                        <!-- <option value="<?php echo $in_row["id"] ?>"><?php echo $in_row["product_name"].", Supplier Name: ".$in_row["supplier_name"].", Date: ".$in_row["date"].", Lot No: ".$in_row["lot_no"] ?></option> -->
                      <?php 
                        //   }
                        // }
                      ?> 

                      <?php
                        if ($in_result->num_rows > 0) {
                          while($in_row = $in_result->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $in_row["final_product"] ?>"><?php echo $in_row["final_product"] ?></option>
                      <?php 
                          }
                        }
                      ?>
                    </select>
                    <label id="product_name_validation" class="text-danger"><small>*Select Product Name</small></label>
                </div>
                <input type="hidden" id="used_total_kg" name="used_total_kg">
                <input type="hidden" id="selected_product_name" name="selected_product_name">
                <!-- <input type="hidden" id="supplier_name" name="supplier_name"> -->
                <input type="hidden" id="lot_no" name="lot_no">
              </div>

              <script>
                  $(document).ready(function() {
                    $('#product_name').select2();
                  });
                </script>

              <div class="row mb-4">
                  <label class="col-sm-2 col-form-label">Total kg</label>
                  <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter Total kg" id="total_kg" name="total_kg[]">
                    <label class="text-danger" id="total_kg_validation"><small>*Enter Total kg</small></label>
                  </div>
                </div>

                <div id="formContainer"></div>

                
                <script>

$(document).ready(function() {
    $('#addButton').on('click', function() {
        var newFormSection = `
        <div>
            <div class="row mb-4">
                <label for="w_product_name" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-10">
                    <select class="form-select dropdown-class" aria-label="Default select example" id="w_product_name" name="product_name[]">
                        <option value="" selected disabled>- - Select Product Name - -</option>
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
                </div>
            </div>

            <div class="row mb-4">
                <label class="col-sm-2 col-form-label">Enter kg</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter kg" id="kg" name="total_kg[]">
                </div>
            </div>
        </div>
        `;
        $('#formContainer').append(newFormSection);

        // Reinitialize the Select2 plugin for the newly added select element
        $('.dropdown-class').select2();
    });
});


                </script>
                <a id="addButton" class="btn btn-primary">+</a>

              <div class="row mb-4">
                <label for="quality" class="col-sm-2 col-form-label">Quality FG</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Quality FG" class="form-control" id="quality" name="quality">
                  <label id="quality_validation" class="text-danger"><small>*Enter Quality FG</small></label>
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
                  <label for="supplier_name" class="col-sm-2 col-form-label">Supplier Name</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Supplier Name" class="form-control" id="supplier_name" name="supplier_name">
                    <label id="supplier_name_validation" class="text-danger"><small>*Enter supplier_name</small></label>
                  </div>
              </div>

              <!-- <div class="row mb-4">
                  <label for="f_product_name" class="col-sm-2 col-form-label">Final Product Name</label>
                  <div class="col-sm-10">
                    <select class="form-select dropdown-class" aria-label="Default select example" id="f_product_name" name="f_product_name">
                      <option value="" selected disabled>- - Select Final Product Name - -</option>
                      <?php
                        $sql = "SELECT * FROM supplier_name_master";
                        $result = $conn->query($sql);  
                      ?>
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
                    <label id="f_product_name_validation" class="text-danger"><small>*Select Final sProduct Name</small></label>
                  </div>
                </div>

                <script>
                  $(document).ready(function() {
                    $('#product_name').select2();
                  });
                </script> -->



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
<!-- 
              <div class="row mb-4">
                <label for="quantity_fg" class="col-sm-2 col-form-label">Quantity FG</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Quantity FG" class="form-control" id="quantity_fg" name="quantity_fg">
                  <label id="quantity_fg_validation" class="text-danger"><small>*Enter Quantity FG</small></label>
                </div>
              </div> -->

              <!-- <div class="row mb-4">
                <label for="lot" class="col-sm-2 col-form-label">Lot No</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Lot No" class="form-control" id="lot" name="lot">
                  <label id="lot_validation" class="text-danger"><small>*Enter Lot No</small></label>
                </div>
              </div> -->

              <!-- <div class="row mb-4">
                <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Remarks" class="form-control" id="remarks" name="remarks">
                  <label id="remarks_validation" class="text-danger"><small>*Enter Remarks</small></label>
                </div>
              </div> -->

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
    // $selected_product_name = mysqli_real_escape_string($conn, $_POST['selected_product_name']);
    // $selected_product_name = mysqli_real_escape_string($conn, $_POST['f_product_name']);
    // $available_quantity = (float)$_POST['used_total_kg'];
    // $used_total_kg = 0;
    // $one_no =0;
    // $two_no = 0;
    // $three_no =0;
    // $waste_product_weight =0;
    // $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    // $lot_no = mysqli_real_escape_string($conn, $_POST['lot_no']);
    // $quantity_fg = mysqli_real_escape_string($conn, $_POST['quantity_fg']);
    
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $place = mysqli_real_escape_string($conn, $_POST['place']);
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);

    // $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_name = $_POST['product_name'];  
    $sanitized_product_name = [];
    foreach ($product_name as $product_name) {
      $sanitized_product_name[] = mysqli_real_escape_string($conn, $product_name);
    }

    // $total_kg = mysqli_real_escape_string($conn, $_POST['total_kg']);
    $total_kg = $_POST['total_kg'];  
    $sanitized_total_kg = [];
    foreach ($total_kg as $total_kg) {
      $sanitized_total_kg[] = mysqli_real_escape_string($conn, $total_kg);
    }

    $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    $quality = mysqli_real_escape_string($conn, $_POST['quality']);
    $lot = $lot_no;
    

  for ($i = 0; $i < count($sanitized_product_name); $i++) {

    
// Prepare the first statement to insert into inward_master_v2
$stmt = $conn->prepare("INSERT INTO `inward_master_v2`(`place`, `supplier_name`, `product_name`, `quality`, `total_kg`, `main_kg`, `rate`, `date`, `lot_no`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssddsss", $place, $supplier_name, $sanitized_product_name[$i], $quality, $sanitized_total_kg[$i], $sanitized_total_kg[$i], $rate, $date, $lot_no);

// Execute the first statement
if ($stmt->execute()) {
    echo "<script>alert('working')</script>";

    // Record the activity in the activity_master table
    $activity_details = "entered process outward record";
    $stmt1 = $conn->prepare("
    INSERT INTO activity_master (user_id, email, user_type, activity_timestamp, activity_details)
    VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?)");
    $stmt1->bind_param('isss', $_SESSION['id'], $_SESSION['username'], $_SESSION['role'], $activity_details);
    $stmt1->execute();
    $stmt1->close();
}

// Close the statement
$stmt->close();

    
  }
  // $novalue = "";
  // $stmtlot = $conn->prepare("
  // INSERT INTO outward_lot_master (lot_no)
  // VALUES (?)");
  // $stmtlot->bind_param('s', $novalue);
  // $stmtlot->execute();

  // echo "<script>alert('Form Submitted Successfully')</script>";



      $conn->close();
      

  
}
?>
