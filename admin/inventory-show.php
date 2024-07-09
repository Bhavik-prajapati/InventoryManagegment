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
        <h1>Database Inventory</h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Inventory</li>
        </ol>
      </nav>
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
                                <th>place</th>
                                <th>supplier name</th>
                                <th>product name</th>
                                <th>quality</th>
                                <th>bags</th>
                                <th>total kg</th>
                                <th>rate</th>
                                <th>om exim weighbridge weight</th>
                                <th>other weighbridge weight</th>
                                <th>weight as per average bag weight</th>
                                <th>bill weight</th>
                                <th>weight supervisor name</th>
                                <th>quality supervisor name</th>
                                <th>remarks</th>
                                <th>vehicle no</th>
                                <th>container no</th>
                                <th>date</th>
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

      

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body overflow-x-scroll">
                        <h5 class="card-title">Available Stock Inward</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                              <tr>
                              <th>Product Name</th>
                              <th>Supplier Name</th>
                              <th>Quality</th>
                              <th>Rate</th>
                              <th>Place</th>
                              <th>Total Kg</th>
                              <th>Available Kg</th>
                              <th>Date</th>
                              </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $sql2 = "SELECT * FROM inward_master_v2";

                                        $result = $conn->query($sql2);

                                        $data = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $data[] = $row;
                                        }
                                        foreach ($data as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["product_name"] ?></td>
                                            <td><?php echo $row["supplier_name"] ?></td>
                                            <td><?php echo $row["quality"] ?></td>
                                            <td><?php echo $row["rate"] ?></td>
                                            <td><?php echo $row["place"] ?></td>
                                            <td><?php echo $row["main_kg"] ?></td>
                                            <td><?php echo $row["total_kg"] ?></td>
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



