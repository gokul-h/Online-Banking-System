<?php include("../login_system/authentication.php"); ?>
<br>
<!-- Reusable Block for Navigation panel-Admin -->
<nav class="navbar navbar-expand-lg navbar-light bwb ">
  <div class="wc text-center ">
    <a class="navbar-brand" href="../customer/customer_index.php"><strong>CUSTOMER</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="../customer/customer_index.php">Home</a>
        <a class="nav-item nav-link" href="../customer/customer_info.php">Personal_Info</a>
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Banking
          </a>
          <div class="dropdown-menu logout" aria-labelledby="navbarDropdownMenuLink">
            <a class="nav-item nav-link " href="../customer/customer_withdrawal.php">Withdrawal</a>
            <a class="nav-item nav-link" href="../customer/customer_deposit.php" >Deposit</a>
          </div>
          </li>
        <a class="nav-item nav-link" href="../customer/customer_loan.php">Loan</a>
        <a class="nav-item nav-link" href="../customer/customer_fixed_deposit.php">Deposit</a>
        <a class="nav-item nav-link" href="../customer/customer_card.php">Card</a>
        <a class="nav-item nav-link" href="../customer/customer_passbook.php">Passbook</a>
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle logout" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Logout
          </a>
          <div class="dropdown-menu logout" aria-labelledby="navbarDropdownMenuLink">
            <a class="nav-item nav-link " href="../login_system/logout.php">Logout</a>
            <a class="nav-item nav-link" href="../customer/customer_change_password.php" >Change Password</a>
          </div>
          </li>
      </div>
    </div>
  </div>
</nav>
<br> 

