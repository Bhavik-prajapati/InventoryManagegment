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
        <h1>Database Inventory</h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Inventory</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->



      

    <?php
   $startDate = isset($_POST['start_date']) ? $_POST['start_date'] : '';
   $endDate = isset($_POST['end_date']) ? $_POST['end_date'] : '';
   
   $sql2 = "SELECT * FROM inward_master_v2";
   
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
                        <h5 class="card-title">Available Stock Inward</h5>
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
                        <table id="availableStockTable" class="table datatable">
                            <thead>
                              <tr>
                                <th>Date</th>
                              <th>Product Name</th>
                              <th>Supplier Name</th>
                              <th>Quality</th>
                              <th>Rate</th>
                              <th>Total Kg</th>
                              <th>Available Kg</th>
                              <th>Place</th>
                              </tr>
                            </thead>
                            <tbody>
                                    <?php
                                       /*  $sql2 = "SELECT * FROM inward_master_v2";

                                        $result = $conn->query($sql2);

                                        $data = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $data[] = $row;
                                        } */
                                        foreach ($data as $row) {
                                    ?>
                                        <tr>
                                          <td><?php echo $row["date"] ?></td>
                                            <td><?php echo $row["product_name"] ?></td>
                                            <td><?php echo $row["supplier_name"] ?></td>
                                            <td><?php echo $row["quality"] ?></td>
                                            <td><?php echo $row["rate"] ?></td>
                                            <td><?php echo $row["main_kg"] ?></td>
                                            <td><?php echo $row["total_kg"] ?></td>
                                            <td><?php echo $row["place"] ?></td>
                                        </tr>
                                        <?php 
                                    }
                                  ?>
                                    <tbody>
                            </tbody>
                        </table>
                        <button id="exportAvailableInventoryExcel" class="btn btn-dark"> Export to Excel</button>
                        <button id="exportAvailableInventoryPDF" class="btn btn-dark"> Export to PDF</button>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

$startDate1 = isset($_POST['start_date1']) ? $_POST['start_date1'] : '';
$endDate1 = isset($_POST['end_date1']) ? $_POST['end_date1'] : '';

// Prepare the SQL query with date filtering
$sql2 = "SELECT * FROM process_master";

if ($startDate1 && $endDate1) {
    $startDate1 = $conn->real_escape_string($startDate1);
    $endDate1 = $conn->real_escape_string($endDate1);
    
    $sql2 .= " WHERE date BETWEEN '$startDate1' AND '$endDate1'";
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
                        <h5 class="card-title">Process Inward</h5>
                        <form method="POST" action="" class="mb-2">
                    <div class="row">
                            <div class="col-md-5">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date1" class="form-control" max="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <div class="col-md-5">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date1" class="form-control" max="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary" style="height: 38px;display:flex;justify-content:center;align-items:center">Filter</button>
                            </div>
                        </div>
                    </form>


                        <!-- Table with stripped rows -->
                        <table id="processInwardTable" class="table datatable">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Lot No</th>
                                <th>Process Name</th>
                                <th>Foreign Buyer Name</th>
                                <th>Product Name</th>
                                <th>Product Quality</th>
                                <th>Supplier Name</th>
                                <th>Total Kg</th>
                                <th>Remarks</th>
                                <th>Place</th>
                              </tr>
                            </thead>
                            <tbody>
                                    <?php
                                     /*    $sql2 = "SELECT * FROM process_master";

                                        $result = $conn->query($sql2);

                                        $data = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $data[] = $row;
                                        } */
                                        foreach ($data as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["lot_no"] ?></td>
                                            <td><?php echo $row["place"] ?></td>
                                            <td><?php echo $row["process_name"] ?></td>
                                            <td><?php echo $row["foreign_buyer_name"] ?></td>
                                            <td><?php echo $row["product_name"] ?></td>
                                            <td><?php echo $row["weight_quality"] ?></td>
                                            <td><?php echo $row["supplier_name"] ?></td>
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
                        <button id="exportProcessInwardExcel" class="btn btn-dark"> Export to Excel</button>
                        <button id="exportProcessInwardPDF" class="btn btn-dark"> Export to PDF</button>
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

  
  document.getElementById('exportProcessInwardExcel').addEventListener('click', function() {
    exportTableToExcel('processInwardTable', 'ProcessInward');
  });

  document.getElementById('exportAvailableInventoryExcel').addEventListener('click', function() {
    exportTableToExcel('availableStockTable', 'AvailableInventoryInward');
  });
  
  document.getElementById('exportProcessInwardPDF').addEventListener('click', function() {
    exportTableToPDF('processInwardTable', 'ProcessInward', 'landscape', 'A2');
  });

  document.getElementById('exportAvailableInventoryPDF').addEventListener('click', function() {
    exportTableToPDF('availableStockTable', 'AvailableInventoryInward', 'portrait', 'A2');
  });

</script>
</html>



