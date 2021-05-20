<?php include("../login_system/authentication.php"); ?>
<br>
<!-- Reusable Block for Navigation panel-Employee -->
<nav class="navbar navbar-expand-lg navbar-light bwb ">
  <div class="wc text-center ">
    <a class="navbar-brand" href="../employee/employee_index.php"><strong>Employee</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 

    <div class="collapse navbar-collapse wc" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="../employee/employee_index.php">Home</a>
        <a class="nav-item nav-link" href="../employee/employee_info.php">Info</a>

        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Request
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="nav-item nav-link " href="../employee/employee_account_app.php">Account</a>
            <a class="nav-item nav-link " href="../employee/employee_loan_app.php">Loan</a>
            <a class="nav-item nav-link " href="../employee/employee_deposit_app.php">Deposit</a>
            <a class="nav-item nav-link " href="../employee/employee_card_app.php">Card</a>
          </div>
        </li>

        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle logout" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Logout
          </a>
          <div class="dropdown-menu logout" aria-labelledby="navbarDropdownMenuLink">
            <a class="nav-item nav-link " href="../login_system/logout.php">Logout</a>
            <a class="nav-item nav-link" href="../employee/employee_change_password.php" >Change Password</a>
          </div>
        </li>
      </div>
    </div>
  </div>
</nav>
<br>

