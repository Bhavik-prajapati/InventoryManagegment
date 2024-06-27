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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                  <!-- <input type="text" placeholder="Enter Product Name" class="form-control" id="product_name" name="product_name"> -->
                  <select class="form-select" aria-label="Default select example" id="product_name" name="product_name">
                      <option selected disabled>- - Select Product - -</option>
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
                  <!-- <input type="number" placeholder="Enter Bags Quantity" class="form-control" id="bags_quantity" name="bags_quantity"> -->
                  <input type="hidden" class="form-control" id="totalbags" name="totalbags">
                  <select class="form-select" aria-label="Default select example" id="bags_quantity" name="bags_quantity">
                      <option selected disabled>- - Select Product First - -</option>
                    </select>

                    <!-- <input type="number" class="form-control" placeholder="Enter Bags Quantity" list="bags_quantity" name="bags_quantity" id="input-datalist">
                    <datalist id="bags_quantity">
                        <option>- - Select Product First - -</option>
                    </datalist>   -->

                </div>
              </div>
              <div class="row mb-4">
                <label for="each_bag_weight" class="col-sm-2 col-form-label">Each Bag Weight</label>
                <div class="col-sm-10">
                  <!-- <input type="number" step="0.00000000001" placeholder="Enter Each Bag Weight" class="form-control" id="each_bag_weight" name="each_bag_weight"> -->
                  <select class="form-select" aria-label="Default select example" id="each_bag_weight" name="each_bag_weight">
                      <option selected disabled>- - Select Bags Quantity First - -</option>
                    </select>

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
            url: 'fetch_bags.php',
            type: 'post',
            data: { product_name: product_name },
            dataType: 'json',
            success:function(response){
                var maxBags = response[0]['bags'];  // Assuming response contains the maximum number of bags
                $('#totalbags').val(maxBags);
                $('#bags_quantity').empty();
                $('#bags_quantity').append("<option selected disabled>- - Select Bags Quantity - -</option>");
                for(var i = 1; i <= maxBags; i++){
                    $('#bags_quantity').append("<option value='"+i+"'>"+i+"</option>");
                }
            }
        });
    });
});

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
                        $('#each_bag_weight').append("<option selected disabled>- - Select Each Bag Weight - -</option>");
                        for( var i = 0; i < len; i++){
                            var each_bag_weight = response[i]['each_bag_weight'];
                            
                            $('#each_bag_weight').append("<option value='"+each_bag_weight+"'>"+each_bag_weight+"</option>");
                        }
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
