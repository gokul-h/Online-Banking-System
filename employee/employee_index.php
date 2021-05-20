<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/employee_navbar.php");
?>
<?php 
  // Database Code
  $sql1="SELECT count(*) FROM account WHERE application_status='Processing';";
  // Execute and get result 
  $result1 = $conn->query($sql1);
  // Fetch-assoc takes result as an associative array
  $custapp = mysqli_fetch_assoc($result1)['count(*)'];

  $sql2="SELECT count(*) FROM loan WHERE application_status='Processing';  ";
  $result2 = $conn->query($sql2);
  $loanapp = mysqli_fetch_assoc($result2)['count(*)'];

  $sql3="SELECT count(*) FROM deposit WHERE application_status='Processing';";
  $result3 = $conn->query($sql3);
  $depositapp = mysqli_fetch_assoc($result3)['count(*)'];

  $sql4="SELECT count(*) FROM card WHERE application_status='Processing';";
  $result4 = $conn->query($sql4);
  $cardapp = mysqli_fetch_assoc($result4)['count(*)'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/dashboard.css">
</head>
<body>
    <!-- Welcome Message -->
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Hi <?php echo $_SESSION['user'] ?></h1>
      <p class="lead">Welcome to your Employee portal</p>
      <p class="lead">Here is the statistics of pending request</p>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="column">
    <div class="card">
        <!-- Balance Display -->
        <div class="alert align" role="alert" style="background-color:#1cc88a">
            <h4 class="alert-heading display-6">Customer <br>Application</h4>
            <hr>
            <h3><?php echo $custapp ?></h3>
        </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
        <!-- Loan stat Display -->
        <div class="alert align" role="alert" style="background-color:#37b9cd">
            <h4 class="alert-heading display-6">Loan <br>Application</h4>
            <hr>
            <h3><?php echo $loanapp ?></h3>
        </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
        <!-- Deposit stat Display -->
        <div class="alert  align" role="alert" style="background-color:#f7c23f">
            <h4 class="alert-heading display-6">Deposit <br>Application</h4>
            <hr>
            <h3><?php echo $depositapp ?></h3>
        </div>
    </div>
  </div>
  <div class="column align">
    <div class="card">
        <!-- card stat Display -->
        <div class="alert align" role="alert" style="background-color:#4e73df">
            <h4 class="alert-heading display-6">Card <br>Application</h4>
            <hr>
            <h3><?php echo $cardapp ?></h3>
        </div>
    </div>
  </div>
</div>

</body>
</html>

<?php include("../partials/footer.php")?>