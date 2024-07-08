<?php

include("../config/connection.php");
  



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
        <h1>Process Records</h1>
    </div>


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body overflow-x-scroll">
                        <h5 class="card-title">Process Inward</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                              <tr>
                                <th>Place</th>
                                <th>Process Name</th>
                                <th>Foreign Buyer Name</th>
                                <th>Product Name</th>
                                <th>Weight Quality</th>
                                <th>Total Kg</th>
                                <th>Remarks</th>
                                <th>Date</th>
                              </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $sql2 = "SELECT * FROM process_master";

                                        $result = $conn->query($sql2);

                                        $data = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $data[] = $row;
                                        }
                                        foreach ($data as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["place"] ?></td>
                                            <td><?php echo $row["process_name"] ?></td>
                                            <td><?php echo $row["foreign_buyer_name"] ?></td>
                                            <td><?php echo $row["product_name"] ?></td>
                                            <td><?php echo $row["weight_quality"] ?></td>
                                            <td><?php echo $row["total_kg"] ?></td>
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

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body overflow-x-scroll">
                        <h5 class="card-title">Process Outward</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                              <tr>
                              <th>Product Name</th>
                              <th>Quality</th>
                              <th>1 No</th>
                              <th>2 No</th>
                              <th>3 No</th>
                              <th>Waste Product Weight</th>
                              <th>Remarks</th>
                              <th>Date</th>
                              </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $sql2 = "SELECT * FROM process_outward_master";

                                        $result = $conn->query($sql2);

                                        $data = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $data[] = $row;
                                        }
                                        foreach ($data as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["product_name"] ?></td>
                                            <td><?php echo $row["quality"] ?></td>
                                            <td><?php echo $row["one_no"] ?></td>
                                            <td><?php echo $row["two_no"] ?></td>
                                            <td><?php echo $row["three_no"] ?></td>
                                            <td><?php echo $row["waste_product_weight"] ?></td>
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



