<?php
include("../config/connection.php");
session_start();

// Query for grouped data
$sqlGrouped = "SELECT role, COUNT(*) as count FROM user_master GROUP BY role";
$resultGrouped = $conn->query($sqlGrouped);

$roles = [];
$counts = [];

if ($resultGrouped->num_rows > 0) {
    while ($row = $resultGrouped->fetch_assoc()) {
        $roles[] = $row["role"];
        $counts[] = $row["count"];
    }
}

// Query for total count
$sqlTotal = "SELECT COUNT(*) as total_count FROM user_master";
$resultTotal = $conn->query($sqlTotal);

$totalCount = 0;

if ($resultTotal->num_rows > 0) {
    $row = $resultTotal->fetch_assoc();
    $totalCount = $row["total_count"];
}



$sql = "
SELECT 
    (SELECT COUNT(*) FROM `inward_master`) as countInward,
    (SELECT COUNT(*) FROM `outward_master`) as countOutward,
    (SELECT COUNT(*) FROM `process_master`) as countProcess
";

// Execute query and fetch result
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $countInward = $row['countInward'];
    $countOutward = $row['countOutward'];
    $countProcess = $row['countProcess'];
} else {
    $countInward = 0;
    $countOutward = 0;
    $countProcess = 0;
}

// echo "<script>console.log('Total Count: " . $totalCount . "');</script>";

//recent activities....
$sqlactitivty = "SELECT * FROM activity_master order by id desc";
$recentdata = $conn->query($sqlactitivty);

if ($recentdata->num_rows > 0) {
    while ($rowrecentdata = $recentdata->fetch_assoc()) {
      $activities[] = $rowrecentdata;
    }
  echo "<script>console.log('Activities:', " . json_encode($activities) . ")</script>";
}else{
  echo "No recent data found";
}

function time_difference($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = [
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
  ];
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
          unset($string[$k]);
      }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}



function format_datetime($datetime) {
  $date = new DateTime($datetime, new DateTimeZone('Asia/Kolkata'));
  return $date->format('h:i A, d-m-Y');
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Items In Inward <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $countInward; ?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Items In Process <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $countProcess; ?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Item's In Outward <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php echo $countOutward; ?>
                      </h6>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->

            <div class="col-12">
              <div class="card p-3">
                <h1 class="card-title">Total Users ( <?php echo $totalCount; ?> )</h1>
                <canvas id="pieChart" style="max-height: 400px;"></canvas>
                <script>
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
    </script>
              </div>
            </div>
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
            <h5 class="card-title">Recent Activity <span>| Today</span></h5>
            <div class="activity" style="max-height: 300px; overflow-y: auto;">
            <?php
            // +++++++++
                    foreach ($activities as $activity) {
                      // $time_diff = time_difference($activity['activity_timestamp']);
                      $time_diff = time_difference($activity['activity_timestamp']);
                      $formatted_time = format_datetime($activity['activity_timestamp']);
                      $activity_message =$activity['email'] . '  ' . $activity['activity_details'];
                      echo '
                          <div class="activity-item d-flex">
                              <div class="activite-label" style="padding-right:10px;"> (' . $formatted_time . ')</div>
                              <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                              <div class="activity-content">
                                  ' . $activity_message . '
                              </div>
                          </div>
                      ';
                    }
                ?>
                  </div>
            </div>
          </div>

          <!-- Budget Report -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

          </div><!-- End Budget Report -->

          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
          </div><!-- End Website Traffic -->
        </div><!-- End Right side columns -->

      </div>
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