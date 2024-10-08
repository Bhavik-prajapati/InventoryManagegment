<?php
include("../config/connection.php");
$tname = "inward_master";

// Initialize variables
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';

// Build SQL query
$sql = "SELECT * FROM $tname WHERE 1";

// Add date range filtering if dates are provided
if (!empty($start_date) && !empty($end_date)) {
    $sql .= " AND date BETWEEN '$start_date' AND '$end_date'";
}

// Order results
$sql .= " ORDER BY id DESC";

// Execute query
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

                        <form method="POST" action="" class="mb-2">
                    <div class="row">
                            <div class="col-md-5">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" class="form-control" max="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <div class="col-md-5">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" class="form-control" max="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary" style="height: 38px;display:flex;justify-content:center;align-items:center">Filter</button>
                            </div>
                        </div>
                    </form>

                        <!-- Table with stripped rows -->
                        <table id="tb1" class="table datatable">
                            <thead>
                              <tr>
                                <th>Date</th>
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
                                <th>Lot No</th>
                                <th>Place</th>
                              </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                      // Output data of each row
                                      while($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                          <td><?php echo $row["date"] ?></td>
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
                                            <td><?php echo $row["lot_no"] ?></td>
                                          <td><?php echo $row["place"] ?></td>
                                        </tr>
                                        <?php 
                                    }
                                  }
                                  ?>
                                    <tbody>
                            </tbody>
                        </table>
                        <button id="export1Excel" class="btn btn-dark"> Export to Excel</button>
                        <button id="export1PDF" class="btn btn-dark"> Export to PDF</button>
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
    <?php
// Ensure you have a database connection established
// Example: $conn = new mysqli("localhost", "username", "password", "database");

$startDate = isset($_GET['startDate_1']) ? $_GET['startDate_1'] : '';
$endDate = isset($_GET['endDate_1']) ? $_GET['endDate_1'] : '';

// Prepare the SQL query with date filtering
$sql2 = "SELECT * FROM outward_master";

if ($startDate && $endDate) {
    $startDate = $conn->real_escape_string($startDate);
    $endDate = $conn->real_escape_string($endDate);
    
    $sql2 .= " WHERE date BETWEEN '$startDate' AND '$endDate'";
}

$result = $conn->query($sql2);
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
?>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body overflow-x-scroll">
                    <h5 class="card-title">Outward Record</h5>

                    <form method="GET" action="" class="mb-2">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="startDate_1" class="form-control" max="<?php echo date('Y-m-d'); ?>" required>  
                            </div>
                            <div class="col-md-5">
                                <label for="end_date">End Date</label>
                                <input type="date" name="endDate_1" class="form-control" max="<?php echo date('Y-m-d'); ?>" required>  
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary" style="height: 38px;display:flex;justify-content:center;align-items:center">Filter</button>
                            </div>
                        </div>
                    </form>

                    <!-- Table with stripped rows -->
                    <table id="tb2" class="table datatable">
                        <thead>
                            <tr>
                                <th>Date</th>
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
                                <th>Place</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $row) {
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row["date"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["product"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["quality"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["bags_quantity"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["buyer_name"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["vehicle_number"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["container_number"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["quantity_per_kg"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["supervisor_name"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["gate_person_name"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["weighbridge_weight"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["invoice_bridge_weight"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["invoice"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["remarks"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["place"]); ?></td>
                                </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                    <button id="export2Excel" class="btn btn-dark"> Export to Excel</button>
                    <button id="export2PDF" class="btn btn-dark"> Export to PDF</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.72/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.72/vfs_fonts.js"></script>




<script type="text/javascript">
  function exportTableToPDF(tableId, baseFilename, orientationMode, pageSize) {
      const table = document.getElementById(tableId);
      const rows = table.querySelectorAll('tr');
      let data = [];
      let headers = [];

      rows.forEach((row, rowIndex) => {
          let rowData = [];
          const cols = row.querySelectorAll('td, th');
          cols.forEach((col) => {
              rowData.push(col.innerText);
          });
          if (rowIndex === 0) {
              headers = rowData;
          } else {
              data.push(rowData);
          }
      });

      const docDefinition = {
          content: [
              {
                  table: {
                      headerRows: 1,
                      widths: headers.map(() => 'auto'),
                      body: [headers, ...data]
                  },
                  layout: {
                      hLineColor: '#000000', // Horizontal line color
                      vLineColor: '#000000', // Vertical line color
                      hLineWidth: function(i, node) {
                          return i === 0 ? 1 : 0.5; // Header row lines thicker
                      },
                      vLineWidth: function(i, node) {
                          return 0.5; // All vertical lines
                      },
                      paddingLeft: function(i, node) {
                          return 5; // Padding for left side of cell
                      },
                      paddingRight: function(i, node) {
                          return 5; // Padding for right side of cell
                      },
                      paddingTop: function(i, node) {
                          return 5; // Padding for top side of cell
                      },
                      paddingBottom: function(i, node) {
                          return 5; // Padding for bottom side of cell
                      }
                  }
              }
          ],
          pageSize: pageSize,
          pageOrientation: orientationMode
      };

      const date = new Date();
      const formattedDate = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
      const filename = `${baseFilename}${formattedDate}.pdf`;

      pdfMake.createPdf(docDefinition).download(filename);
  }

  function exportTableToExcel(tableId, baseFilename) {
    const table = document.getElementById(tableId);
    const ws = XLSX.utils.table_to_sheet(table);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

    const date = new Date();
    const formattedDate = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
    const filename = `${baseFilename}${formattedDate}.xlsx`;

    XLSX.writeFile(wb, filename);
}

  
  document.getElementById('export1Excel').addEventListener('click', function() {
    exportTableToExcel('tb1', 'Inventory');
  });
  
  document.getElementById('export1PDF').addEventListener('click', function() {
    exportTableToPDF('tb1', 'Inventory', 'landscape', 'A2');
  });

  document.getElementById('export2Excel').addEventListener('click', function() {
    exportTableToExcel('tb2', 'OutwardRecord');
  });
  
  document.getElementById('export2PDF').addEventListener('click', function() {
    exportTableToPDF('tb2', 'OutwardRecord', 'landscape', 'A2');
  });


</script>
</html>



