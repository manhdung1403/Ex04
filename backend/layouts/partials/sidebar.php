<nav class="col-md-2 d-none d-md-block sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <!-- #################### Menu admin pages #################### -->
      <li class="nav-item sidebar-heading"><span>Admin</span></li>
      <li class="nav-item">
        <a href="/Ex04/backend/pages/dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <hr style="border: 1px solid red; width: 80%;" />
      <!-- #################### End Menu admin pages #################### -->

      <!-- #################### Menu product #################### -->
      <li class="nav-item sidebar-heading">
        <span>Product</span>
      </li>
      <!-- Menu product -->
      <li class="nav-item dropdown">
        <a href="#" role="button" data-toggle="collapse" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle">
          Product
        </a>
        <ul class="dropdown-menu">
          <li class="dropdown-item">
            <a href="/Ex04/backend/functions/product/index.php">Product List</a>
          </li>
          <li class="dropdown-item">
            <a href="/Ex04/backend/functions/product/create.php">Create</a>
          </li>
        </ul>
      </li>
      <li class="nav-item sidebar-heading">
        <span>User</span>
      </li>
      <!-- Menu product -->
      <li class="nav-item dropdown">
        <a href="#" role="button" data-toggle="collapse" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle">
          User
        </a>
        <ul class="dropdown-menu">
          <li class="dropdown-item">
            <a href="/Ex04/backend/functions/user/index.php">User List</a>
          </li>
          <li class="dropdown-item">
            <a href="/Ex04/backend/functions/user/create.php">Create User</a>
          </li>
        </ul>
      </li>
      <!-- End Menu product -->
      <!-- #################### End Menu product #################### -->
    </ul>
  </div>
</nav>