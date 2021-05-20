
<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/admin_navbar.php");
?>

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

<!-- Main Part -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/dashboard.css">
</head>
<body>
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Hi <?php echo $_SESSION['user'] ?></h1>
      <p class="lead">Welcome to your admins portal</p>
    </div>
  </div>
</div>
<br>

<div class="connatiner">
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
</body>
</html>

<!-- footer -->
<?php include("../partials/footer.php")?>


