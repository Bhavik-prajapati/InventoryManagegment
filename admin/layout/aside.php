
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    <img style=" padding-bottom:10px;border-bottom:1px solid white;" src="../assets/img/logop.png" class="img-fluid mb-2" style="width:250px;height:80px;" alt="">

      <li class="nav-item">
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="inventory-show.php">
          <i class="bi bi-view-stacked"></i>
          <span>Inventory</span>
        </a>
      </li><!-- End inventory Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="user-show.php">
              <i class="bi bi-circle"></i><span>View All</span>
            </a>
          </li>
          <li>
            <a href="user-add.php">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>
        </ul>
      </li><!-- End users Nav -->

    </ul>

  </aside><!-- End Sidebar-->