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
        <h1>Outward Record</h1>
    </div>
    <!-- End Page Title -->

      


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body overflow-x-scroll">
                        <h5 class="card-title"></h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                              <tr>
                                <th>product</th>
                                <th>quality</th>
                                <th>buyer_name</th>
                                <th>vehicle_number</th>
                                <th>container_number</th>
                                <th>quantity_per_kg</th>
                                <th>supervisor_name</th>
                                <th>gate_person_name</th>
                                <th>remarks</th>
                                <th>date</th>

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
                                            <td><?php echo $row["product"] ?></td>
                                            <td><?php echo $row["quality"] ?></td>
                                            <td><?php echo $row["buyer_name"] ?></td>
                                            <td><?php echo $row["vehicle_number"] ?></td>
                                            <td><?php echo $row["container_number"] ?></td>
                                            <td><?php echo $row["quantity_per_kg"] ?></td>
                                            <td><?php echo $row["supervisor_name"] ?></td>
                                            <td><?php echo $row["gate_person_name"] ?></td>
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



