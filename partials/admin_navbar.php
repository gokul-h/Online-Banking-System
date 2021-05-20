<br>
<?php include("../login_system/authentication.php"); ?>
<!-- Reusable Block for Navigation panel-Admin -->
<nav class="navbar navbar-expand-lg navbar-light bwb ">
  <div class="wc text-center ">
    <a class="navbar-brand" href="../admin/admin_index.php"><strong>ADMIN</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
      <a class="nav-item nav-link" href="../admin/admin_index.php">Home</a>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="nav-item nav-link" href="../admin/admin_add_admin.php">Add Admin</a>
          <a class="nav-item nav-link" href="../admin/admin_view_admin.php">View Admins</a>
          </div>
      </li> 
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Branch
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="nav-item nav-link" href="../admin/admin_add_branch.php">Add Branch</a>
          <a class="nav-item nav-link" href="../admin/admin_branch_info.php">Branch Info</a>
          </div>
      </li>
      <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Loan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="nav-item nav-link" href="../admin/admin_add_loan_type.php">Add Loan Type</a>
            <a class="nav-item nav-link" href="../admin/admin_view_loan.php" >View Loan Type</a>
          </div>
      </li>
        <a class="nav-item nav-link" href="../admin/admin_add_employee.php">Approve_Employee</a>
        <a class="nav-item nav-link" href="../admin/admin_customer_info.php">Customer_Info</a>
      <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle logout" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Logout
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="nav-item nav-link" href="../login_system/logout.php" >Logout</a>
            <a class="nav-item nav-link" href="../admin/admin_change_password.php" >Change Password</a>
          </div>
      </li>
      </div>
    </div>
  </div>
</nav>
<br>
