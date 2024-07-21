<?php

include("../config/connection.php");
  $tname = "inward_master";

  // Perform SELECT query
  $sql = "SELECT * FROM $tname order by id DESC";
  $result = $conn->query($sql);

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
        <h1>Inventory</h1>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body overflow-x-scroll">
                        <h5 class="card-title">
                        </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                              <tr>
                              <th>Place</th>
                              <th>Supplier Name</th>
                              <th>Product Name</th>
                              <th>Quality</th>
                              <th>Bags</th>
                              <th>Total KG</th>
                              <th>Rate</th>
                              <th>Om Exim Weighbridge Weight</th>
                              <th>Other Weighbridge Weight</th>
                              <th>Weight As Per Average Bag Weight</th>
                              <th>Bill Weight</th>
                              <th>Weight Supervisor Name</th>
                              <th>Quality Supervisor Name</th>
                              <th>Remarks</th>
                              <th>Vehicle No</th>
                              <th>Container No</th>
                              <th>Date</th>
                              <th>Lot No</th>
                              </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                      // Output data of each row
                                      while($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["place"] ?></td>
                                            <td><?php echo $row["supplier_name"] ?></td>
                                            <td><?php echo $row["product_name"] ?></td>
                                            <td><?php echo $row["quality"] ?></td>
                                            <td><?php echo $row["bags"] ?></td>
                                            <td><?php echo $row["total_kg"] ?></td>
                                            <td><?php echo $row["rate"] ?></td>
                                            <td><?php echo $row["om_exim_weighbridge_weight"] ?></td>
                                            <td><?php echo $row["other_weighbridge_weight"] ?></td>
                                            <td><?php echo $row["weight_as_per_average_bag_weight"] ?></td>
                                            <td><?php echo $row["bill_weight"] ?></td>
                                            <td><?php echo $row["weight_supervisor_name"] ?></td>
                                            <td><?php echo $row["quality_supervisor_name"] ?></td>
                                            <td><?php echo $row["remarks"] ?></td>
                                            <td><?php echo $row["vehicle_no"] ?></td>
                                            <td><?php echo $row["container_no"] ?></td>
                                            <td><?php echo $row["date"] ?></td>
                                            <td><?php echo $row["lot_no"] ?></td>
                                        </tr>
                                        <?php 
                                    }
                                  }
                                  ?>
                                    <tbody>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>

      
    <!-- <div class="container">
      <div class="card"> -->

      <?php



      // echo "<h2>Fetched Data:</h2>";
      // echo "<table border='1'>";
      // echo "<tr><th>Product Name</th><th>Bags Inward Master</th><th>Bags Inward Master V2</th>
      //   <!-- <th>Difference</th> -->
      // </tr>";
      // foreach ($data as $row) {
      //     echo "<tr>";
      //     echo "<td>" . $row['product_name'] . "</td>";
      //     echo "<td>" . $row['bags_inward_master'] . "</td>";
      //     echo "<td>" . $row['bags_inward_master_v2'] . "</td>";
      //     // echo "<td>" . $row['difference'] . "</td>";
      //     echo "</tr>";
      // }
      // echo "</table>";

      ?>
     
<!-- 
      </div>
    </div> -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body overflow-x-scroll">
                        <h5 class="card-title">Outward Record</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                              <tr>
                                <th>Place</th>
                                <th>Product</th>
                                <th>Quality FG</th>
                                <th>Bags Quantity</th>
                                <th>Buyer Name</th>
                                <th>Vehicle Number</th>
                                <th>Container Number</th>
                                <th>Each Bag Weight</th>
                                <th>Supervisor Name</th>
                                <th>Gate Person Name</th>
                                <th>Weighbridge Weight</th>
                                <th>Invoice Bridge Weight</th>
                                <th>Invoice</th>
                                <th>Remarks</th>
                                <th>Date</th>
                              </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $sql2 = "SELECT * FROM outward_master";

                                        $result = $conn->query($sql2);

                                        $data = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $data[] = $row;
                                        }
                                        foreach ($data as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["place"] ?></td>
                                            <td><?php echo $row["product"] ?></td>
                                            <td><?php echo $row["quality"] ?></td>
                                            <td><?php echo $row["bags_quantity"] ?></td>
                                            <td><?php echo $row["buyer_name"] ?></td>
                                            <td><?php echo $row["vehicle_number"] ?></td>
                                            <td><?php echo $row["container_number"] ?></td>
                                            <td><?php echo $row["quantity_per_kg"] ?></td>
                                            <td><?php echo $row["supervisor_name"] ?></td>
                                            <td><?php echo $row["gate_person_name"] ?></td>
                                            <td><?php echo $row["weighbridge_weight"] ?></td>
                                            <td><?php echo $row["invoice_bridge_weight"] ?></td>
                                            <td><?php echo $row["invoice"] ?></td>
                                            <td><?php echo $row["remarks"] ?></td>
                                            <td><?php echo $row["date"] ?></td>
    
                                        </tr>
                                        <?php 
                                    }
                                  ?>
                                    <tbody>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->


<?php


  include("layout/footer.php");
  $conn->close();
?>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

      <?php
    include("config/footer-data.php");
  ?>



</body>

</html>



