
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    <i class="bi bi-list toggle-sidebar-btn" style="position:absolute; top:8px; right:-50px;"></i>
    <img style="padding-bottom: 15px; border-bottom: 1px solid #ffffff1a;" src="../assets/img/logop.png" class="img-fluid mb-2" style="width:250px;height:80px;" alt="">

      <li class="nav-item">
        <a class="nav-link collapsed" href="inventory-show.php">
          <i class="bi bi-view-stacked"></i>
          <span>Inventory</span>
        </a>
      </li><!-- End inventory Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="process-record-show.php">
          <i class="bi bi-card-list"></i>
          <span>Process Records</span>
        </a>
      </li><!-- End Process Records Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="outward-record-show.php">
          <i class="bi bi-card-list"></i>
          <span>Outward Records</span>
        </a>
      </li><!-- End Outward Records Nav -->

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

      <li class="nav-item">
        <a class="nav-link collapsed" href="user-activity.php">
          <i class="bi bi-clock-history"></i>
          <span>User Activity</span>
        </a>
      </li><!-- End User Activity Nav -->

    </ul>

  </aside><!-- End Sidebar-->