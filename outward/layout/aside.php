<?php
  if (isset($_POST['btnInward'])) {
    $_SESSION['role'] = "Inward";
    echo "<script>window.location = '../inward/inward-form.php';</script>";
    
  }

  if (isset($_POST['btnProcess'])) {
    $_SESSION['role'] = "Process";
    echo "<script>window.location = '../process/process-form.php';</script>";

  }
?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
  <i class="bi bi-list toggle-sidebar-btn" style="position:absolute; top:8px; right:-50px;"></i>

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
        <a class="nav-link collapsed" href="outward-form.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Outward Form</span>
        </a>
      </li><!-- End inward Nav -->

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
          <button name="btnInward" class="nav-link collapsed w-100">
            <i class="bi bi-caret-right"></i>
            <span>Inward</span>
          </button>
        </li>

        <li class="nav-item active">
          <button name="btnProcess" class="nav-link collapsed w-100">
            <i class="bi bi-caret-right"></i>
            <span>Process</span>
          </button>
        </li>

        <li class="nav-item active">
          <button class="nav-link collapsed w-100">
            <i class="bi bi-caret-right-fill"></i>
            <span style="color: #e88125 !important;">Outward</span>
          </button>
        </li>
      </ul>
    </form>
  </aside><!-- End Sidebar-->