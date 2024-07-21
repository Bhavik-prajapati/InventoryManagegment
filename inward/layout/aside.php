<?php
  if (isset($_POST['btnProcess'])) {
    $_SESSION['role'] = "Process";
    echo "<script>window.location = '../process/process-form.php';</script>";
    
  }

  if (isset($_POST['btnOutward'])) {
    $_SESSION['role'] = "Outward";
    echo "<script>window.location = '../outward/outward-form.php';</script>";

  }
?>


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
  <i class="bi bi-x toggle-sidebar-btn my-sidebar-btn"></i>
    
  <ul class="sidebar-nav" id="sidebar-nav">
    
    <img style="padding-bottom: 15px; border-bottom: 1px solid #ffffff1a;" src="../assets/img/logop.png" class="img-fluid mb-2" style="width:250px;height:80px;" alt="">

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li> -->
      <!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="inward-form.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Inward Form</span>
        </a>
      </li><!-- End inward Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-box-seam"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="product-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="product-show.php">
              <i class="bi bi-circle"></i><span>View All</span>
            </a>
          </li>
          <li>
            <a href="product-add.php">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="inventory-show.php">
          <i class="bi bi-view-stacked"></i>
          <span>Inventory</span>
        </a>
      </li><!-- End inventory Nav -->

    </ul>
  <form method="POST" action="">
    <ul class="sidebar-nav" id="sidebar-nav" style="border-top: 1px solid #ffffff1a;">
      <li class="nav-item active">
        <a class="nav-link collapsed">
          <i class="bi bi-caret-right-fill"></i>
          <span style="color: #e88125 !important;">Inward</span>
        </a>
      </li>

      <li class="nav-item active">
        <button name="btnProcess" class="nav-link collapsed w-100">
          <i class="bi bi-caret-right"></i>
          <span>Process</span>
        </button>
      </li>

      <li class="nav-item active">
        <button name="btnOutward" class="nav-link collapsed w-100">
          <i class="bi bi-caret-right"></i>
          <span>Outward</span>
        </button>
      </li>
    </ul>
  </form>
  </aside><!-- End Sidebar-->