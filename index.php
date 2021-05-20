<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="lead">Bank</title>
    <!-- Add favicon icon -->
    <link rel="shortcut icon" href="static/images/logo_favicon.ico" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <!--Add css files link-->
    <link rel="stylesheet" href="static/css/styles.css">
    <link rel="stylesheet" href="static/css/dashboard.css">
    <!-- 1 minute time delay for orginalitty -->
    <?php sleep(1) ?>
</head>
<body class="bgg">

<!-- <div class="wrapper "> -->
        <!-- Warning top starts here -->
        <!-- <div class="alert alert-success text-center" role="alert">
        This Website is just for demonstartion purpose
</div> -->
<!-- Warning top ends here -->

<!-- Top banner starts here -->
<!-- Just an image -->
<?php include("connect.php");?>
    <div class="text-center bb color-w">
            <img src="static/images/logo.png" width="200" height="100" alt="Bank" class="rounded">
        <!-- <h1 class="display-4 text-center">BANK</h1> -->
    </div>

<br>
<!-- Reusable Block for Navigation panel OPEN MODULE -->
<nav class="navbar navbar-expand-lg navbar-light bwb ">
  <div class="wc text-center ">
    <div class="collapse navbar-collapse wc" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="index.php">Home</a>
        <a class="nav-item nav-link" href="open/atm.php">ATM</a>
        <a class="nav-item nav-link" href="open/about.php">About</a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Apply
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="open/apply_customer.php">Be a Customer</a>
            <a class="dropdown-item" href="open/apply_employee.php">Be an Employee</a>
            <a class="dropdown-item" href="open/application_status.php">Application Status</a>
          </div>
        </li>
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle  login"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="login_system/admin_login.php">Admin</a>
            <a class="dropdown-item" href="login_system/customer_login.php">Customer</a>
            <a class="dropdown-item" href="login_system/employee_login.php">Employee</a>
          </div>
        </li>
    </div>
  </div>
</nav>
<br>

<?php 
  // Database Code
  $sql1="SELECT count(*) AS admincount FROM admin;";
  // Execute and get result 
  $result1 = $conn->query($sql1);
  // Fetch-assoc takes result as an associative array
  $admincount = mysqli_fetch_assoc($result1)['admincount'];

  $sql2="SELECT count(*) AS branchcount FROM branch;";
  $result2 = $conn->query($sql2);
  $branchcount = mysqli_fetch_assoc($result2)['branchcount'];

  $sql3="SELECT count(*) AS accountcount FROM account_holder;";
  $result3 = $conn->query($sql3);
  $accountcount = mysqli_fetch_assoc($result3)['accountcount'];

  $sql4="SELECT count(*) AS employeecount FROM employee;";
  $result4 = $conn->query($sql4);
  $employeecount = mysqli_fetch_assoc($result4)['employeecount'];

?>

<div class="conatiner">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Welcome to Bank</h1>
    </div>
  </div>
</div>
<br>

<div class="container ">
<div class="row">
  <div class="column">
    <div class="card">
        <div class="alert align text-center" role="alert" style="background-color:#1cc88a">
            <h4 class="alert-heading display-6">Admins<br>Count</h4>
            <hr>
            <h1> <?php echo $admincount ?> </h1>
        </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
        <div class="alert align text-center" role="alert" style="background-color:#37b9cd">
            <h4 class="alert-heading display-6">Branch<br>Count</h4>
            <hr>
            <h1> <?php echo $branchcount ?> </h1>
        </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
        <div class="alert  align text-center" role="alert" style="background-color:#f7c23f">
            <h4 class="alert-heading display-6">Employee<br>count</h4>
            <hr>
            <h1> <?php echo $accountcount ?> </h1>
        </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
        <div class="alert align text-center" role="alert" style="background-color:#4e73df">
            <h4 class="alert-heading display-6">Customer<br>count</h4>
            <hr>
            <h1> <?php echo $employeecount ?> </h1>   
        </div>
    </div>
  </div>
</div>
</div>

<br><br><br>
    <div class="footer-self">
      <footer class="footer mt-auto py-3 bgg bt">
            <div class="container text-center">
              <span class="text-muted">© Bank</span>
            </div>
      </footer>
    </div>
  </body>

</html> 
