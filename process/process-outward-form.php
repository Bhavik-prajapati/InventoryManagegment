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

<style>
    /* Chrome, Safari, Edge, Opera */
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }

    .text-danger {
      display: none;
    }

  </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                  <select class="form-select" aria-label="Default select example" id="product_name" name="product_name">
                      <option value="" selected disabled>- - Select Product - -</option>
                      <?php
                        if ($in_result->num_rows > 0) {
                          while($in_row = $in_result->fetch_assoc()) {
                      ?>
                      <option value="<?php echo $in_row["product_name"] ?>"><?php echo $in_row["product_name"] ?></option>
                      <?php 
                          }
                        }
                      ?>
                    </select>
                    <label id="product_name_validation" class="text-danger"><small>*Enter Place</small></label>
                </div>
              </div>
              <div class="row mb-4">
                <label for="quality" class="col-sm-2 col-form-label">Quality</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Quality" class="form-control" id="quality" name="quality">
                  <label id="quality_validation" class="text-danger"><small>*Enter Place</small></label>
                </div>
              </div>

              <div class="row mb-4">
                <label for="one_no" class="col-sm-2 col-form-label">1 no</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter 1 no." class="form-control" id="one_no" name="one_no">
                  <label id="one_no_validation" class="text-danger"><small>*Enter 1 no.</small></label>
                </div>
              </div>

              <div class="row mb-4">
                <label for="two_no" class="col-sm-2 col-form-label">2 no</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter 2 no." class="form-control" id="two_no" name="two_no">
                  <label id="two_no_validation" class="text-danger"><small>*Enter 2 no.</small></label>
                </div>
              </div>

              <div class="row mb-4">
                <label for="three_no" class="col-sm-2 col-form-label">3 no</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter 3 no." class="form-control" id="three_no" name="three_no">
                  <label id="three_no_validation" class="text-danger"><small>*Enter 3 no.</small></label>
                </div>
              </div>

              <div class="row mb-4">
                <label for="waste_product_weight" class="col-sm-2 col-form-label">Waste Product Weight</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Waste Product Weight" class="form-control" id="waste_product_weight" name="waste_product_weight">
                  <label id="waste_product_weight_validation" class="text-danger"><small>*Enter Place</small></label>
                </div>
              </div>

              <div class="row mb-4">
                <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter Remarks" class="form-control" id="remarks" name="remarks">
                  <label id="remarks_validation" class="text-danger"><small>*Enter Place</small></label>

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

  
  $totalbags = mysqli_real_escape_string($conn, $_POST['totalbags']);
 
  $bags_quantity = $totalbags - $bags_quantity;
 
  $stmt = $conn->prepare("UPDATE `inward_master_v2` SET `bags` = ?, `each_bag_weight` = ? WHERE `product_name` = ?");
  $stmt->bind_param("sss", $bags_quantity, $each_bag_weight, $product_name);
  $stmt->execute();
  $stmt->close();
  
  
  $conn->close();

  
}
?>