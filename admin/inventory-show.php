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
                                <th>place</th>
                                <th>supplier name</th>
                                <th>product name</th>
                                <th>quality</th>
                                <th>bags</th>
                                <th>each bag weight</th>
                                <th>rate</th>
                                <th>om exim weighbridge weight</th>
                                <th>other weighbridge weight</th>
                                <th>weight as per average bag weight</th>
                                <th>bill weight</th>
                                <th>weight supervisor name</th>
                                <th>quality supervisor name</th>
                                <th>remarks</th>
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
                                            <td><?php echo $row["each_bag_weight"] ?></td>
                                            <td><?php echo $row["rate"] ?></td>
                                            <td><?php echo $row["om_exim_weighbridge_weight"] ?></td>
                                            <td><?php echo $row["other_weighbridge_weight"] ?></td>
                                            <td><?php echo $row["weight_as_per_average_bag_weight"] ?></td>
                                            <td><?php echo $row["bill_weight"] ?></td>
                                            <td><?php echo $row["weight_supervisor_name"] ?></td>
                                            <td><?php echo $row["quality_supervisor_name"] ?></td>
                                            <td><?php echo $row["remarks"] ?></td>
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
                        <h5 class="card-title">Available Stock</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                              <tr>
                                <th>Product Name</th>
                                <th>Total Bags</th>
                                <th>Available Bags</th>
                                <!-- <th>Difference</th> -->
                              </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $sql2 = "
                                        SELECT 
                                            im.product_name, 
                                            CAST(im.bags AS SIGNED) AS bags_inward_master, 
                                            CAST(imv2.bags AS SIGNED) AS bags_inward_master_v2, 
                                            CAST(imv2.bags AS SIGNED) - CAST(im.bags AS SIGNED) AS difference
                                        FROM 
                                            inward_master im
                                        JOIN 
                                            inward_master_v2 imv2 
                                        ON 
                                            im.product_name = imv2.product_name;
                                        ";

                                        $result = $conn->query($sql2);

                                        $data = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $data[] = $row;
                                        }
                                        foreach ($data as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["product_name"] ?></td>
                                            <td><?php echo $row["bags_inward_master"] ?></td>
                                            <td><?php echo $row["bags_inward_master_v2"] ?></td>
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



