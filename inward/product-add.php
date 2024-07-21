<?php
include("../config/connection.php");

$sql = "SELECT role, COUNT(*) as count FROM user_master GROUP BY role";
$result = $conn->query($sql);

// $roles = [];
$counts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // $roles[] = $row["role"];
        $counts[] = $row["count"];
    }
}

$user = [];
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $user_query = "SELECT * FROM supplier_name_master WHERE id = ?";
    $user_stmt = $conn->prepare($user_query);
    if ($user_stmt) {
        $user_stmt->bind_param("i", $id);
        $user_stmt->execute();
        $result = $user_stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            echo '<script>alert("Product not found.");</script>';
        }
        echo "<script>console.log(".json_encode($user).")</script>";
        $user_stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

if (isset($_POST['btn-adduser'])) {
    if (!empty($_POST['name'])){
        $name = $_POST['name'];

        $check_query = "SELECT * FROM supplier_name_master WHERE `name` = ?" . ($id ? " AND id != ?" : "");
        $check_stmt = $conn->prepare($check_query);
        
        if ($check_stmt) {
            if ($id) {
                $check_stmt->bind_param("si", $name, $id);
            } else {
                $check_stmt->bind_param("s", $name);
            }
            $check_stmt->execute();
            $check_stmt->store_result();

            if ($check_stmt->num_rows > 0) {
                echo '<script>alert("Product already exists.");</script>';
            } else {
                if ($id) {
                    $update_query = "UPDATE supplier_name_master SET `name` = ? WHERE id = ?";
                    $update_stmt = $conn->prepare($update_query);
                    if ($update_stmt) {
                        $update_stmt->bind_param("si", $name, $id);
                        if ($update_stmt->execute()) {
                            echo '<script>alert("Product updated successfully!");</script>';
                            echo '<script>window.location.href="product-show.php";</script>';
                        } else {
                            echo "Error executing statement: " . $update_stmt->error;
                        }
                        $update_stmt->close();
                    } else {
                        echo "Error preparing statement: " . $conn->error;
                    }
                } else {
                    $insert_query = "INSERT INTO supplier_name_master (name) VALUES (?)";
                    $insert_stmt = $conn->prepare($insert_query);
                    if ($insert_stmt) {
                        $insert_stmt->bind_param("s", $name);
                        if ($insert_stmt->execute()) {
                            echo '<script>alert("New Product added successfully!");</script>';
                        } else {
                            echo "Error executing statement: " . $insert_stmt->error;
                        }
                        $insert_stmt->close();
                    } else {
                        echo "Error preparing statement: " . $conn->error;
                    }
                }
            }
            $check_stmt->close();
        } else {
            echo "Error preparing check statement: " . $conn->error;
        }
        $conn->close();
    } else {
      echo '<script>alert("Product field is required.");</script>';
    }
}
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
      <h1>Manage Products</h1>

    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <form method="POST" action="">
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Product</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="<?php echo isset($user['name']) ? $user['name'] : ''; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" name="btn-adduser" class="btn btn-primary">Save Product</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- <div class="row"> -->
          <!-- <div class="col-lg-6"> -->
          <!-- <div class="card"> -->
            <!-- <div class="card-body"> -->
              <!-- <h5 class="card-title">Pie Chart</h5> -->
              <!-- <canvas id="pieChart" style="max-height: 400px;"></canvas> -->
            <!--   <script>
    document.addEventListener("DOMContentLoaded", () => {
        // PHP variables converted to JavaScript using inline PHP
        var roles = <?php echo json_encode($roles); ?>;
        var counts = <?php echo json_encode($counts); ?>;

        new Chart(document.querySelector('#pieChart'), {
            type: 'pie',
            data: {
                labels: roles,
                datasets: [{
                    label: 'User Roles',
                    data: counts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',   // Red
                        'rgba(54, 162, 235, 0.6)',   // Blue
                        'rgba(255, 205, 86, 0.6)'    // Yellow
                        // Add more colors as needed
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                          label: function(tooltipItem) {
                          let value = tooltipItem.raw;
                          if (typeof value === 'number') {
                              value = value.toFixed(0);
                          }
                          return tooltipItem.label + ': ' + value;
                      }
                        }
                    }
                }
            }
        });
    });
    </script> -->
        <!--     </div>
          </div>
        </div>
          </div>
        </div>
      </div> -->
    </section>

  </main><!-- End #main -->

  <?php
    include("layout/footer.php");
  ?>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php
    include("config/footer-data.php");
  ?>



</body>

</html>

