<?php

include("../config/connection.php");
  $tname = "user_master";

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

  <style>
    .my-btn-edit:hover{
      color:black !important;
    }
  </style>
  
</head>


<body>

<?php
include("layout/header.php");
include("layout/aside.php");

?>



  <main id="main" class="main">


  <div class="pagetitle">
        <h1>Suppliers</h1>

    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body overflow-x-scroll">
                        <h5 class="card-title">
                        <a href="user-add.php" class="btn btn-dark">Add New</a>
                        </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                              <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th style="display:inline-block"></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                      // Output data of each row
                                      while($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["username"] ?></td>
                                            <td><?php echo $row["password"] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="user-add.php?id=<?php echo $row["id"] ?>" class="bi bi-pencil-square btn btn-light m-1 my-btn-edit" style="padding:10px 20px; color:white; background-color:#e88125;"></a>
                                                    <form action="" method="POST">
                                                      <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                                      <button type="submit" name="deleteBtn" class="bi bi-trash btn btn-light m-1" style="padding:10px 20px;"></button>
                                                    </form>
                                                </div>
                                            </td>
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

  </main><!-- End #main -->

<?php

  if(isset($_POST['deleteBtn'])) {
      
    $id = $_POST['id'];
    $sql = "DELETE FROM $tname WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully')</script>";
        echo "<script>window.location.href = 'user-show.php';</script>";


    } else {
        echo "Error deleting record: " . $conn->error;
    }

  }


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



