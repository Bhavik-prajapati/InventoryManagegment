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
                        <table id="inventoryTable" class="table datatable">
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
                                <th>lot no</th>
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
                        <button id="exportInventoryExcel" class="btn btn-dark"> Export to Excel</button>
                        <button id="exportInventoryPDF" class="btn btn-dark"> Export to PDF</button>


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
                        <table id="availableStockTable" class="table datatable">
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
                        <button id="exportAvailableInventoryExcel" class="btn btn-dark"> Export to Excel</button>
                        <button id="exportAvailableInventoryPDF" class="btn btn-dark"> Export to PDF</button>
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


  document.getElementById('exportInventoryExcel').addEventListener('click', function() {
    exportTableToExcel('inventoryTable', 'DatabaseInventory');
  });
  
  document.getElementById('exportAvailableInventoryExcel').addEventListener('click', function() {
    exportTableToExcel('availableStockTable', 'AvailableInventoryInward');
  });

  document.getElementById('exportInventoryPDF').addEventListener('click', function() {
    exportTableToPDF('inventoryTable', 'DatabaseInventory', 'landscape', 'A3');
  });
  
  document.getElementById('exportAvailableInventoryPDF').addEventListener('click', function() {
    exportTableToPDF('availableStockTable', 'AvailableInventoryInward', 'portrait', 'A4');
  });

</script>
</html>



