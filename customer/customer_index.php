<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/customer_navbar.php");
?>
 
<?php 
  $account_number = $_SESSION['account_number'];
  // Database Code
  $sql1="SELECT balance FROM account WHERE account_number = $account_number ;";
  // Execute and get result 
  $result1 = $conn->query($sql1);
  // Fetch-assoc takes result as an associative array
  $balance = mysqli_fetch_assoc($result1)['balance'];

  $sql2="SELECT count(*) FROM loan WHERE account_number= $account_number AND application_status='Approved' ";
  $result2 = $conn->query($sql2);
  $loancnt = mysqli_fetch_assoc($result2)['count(*)'];

  $sql3="SELECT count(*) FROM deposit WHERE account_number= $account_number AND application_status='Approved';";
  $result3 = $conn->query($sql3);
  $depositcnt = mysqli_fetch_assoc($result3)['count(*)'];

  $sql4="SELECT count(*) FROM card WHERE account_number=$account_number AND application_status='Approved';";
  $result4 = $conn->query($sql4);
  $cardcnt = mysqli_fetch_assoc($result4)['count(*)'];

  $sql5="SELECT sum(amount) FROM loan WHERE account_number=$account_number AND application_status='Approved' ;";
  $result5 = $conn->query($sql5);
  $loanamt = mysqli_fetch_assoc($result5)['sum(amount)'];

  $sql6="SELECT sum(amount) FROM deposit WHERE account_number=$account_number AND application_status='Approved' ;";
  $result6 = $conn->query($sql6);
  $depositamt = mysqli_fetch_assoc($result6)['sum(amount)'];

?>

<!-- Full file included since it is a dashboard -->
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
      <p class="lead">Welcome to your Online banking portal</p>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="column">
    <div class="card">
        <!-- Balance Display -->
        <div class="alert align" role="alert" style="background-color:#1cc88a">
            <h4 class="alert-heading display-6">Account Balance</h4>
            <hr>
            <h1><?php echo $balance ?></h1>
            <hr>
        </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
        <!-- Loan stat Display -->
        <div class="alert align" role="alert" style="background-color:#37b9cd">
            <h4 class="alert-heading display-6">Loans</h4>
            <hr>
            <h3>No:<?php echo $loancnt ?></h3>
            <hr>
            <h3>Worth: <?php echo $loanamt ?></h3>
            <hr>
        </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
        <!-- Deposit stat Display -->
        <div class="alert  align" role="alert" style="background-color:#f7c23f">
            <h4 class="alert-heading display-6">Deposits</h4>
            <hr>
            <h3>No:<?php echo $depositcnt ?></h3>
            <hr>
            <h3>Worth:<?php echo $depositamt ?></h3>
        </div>
    </div>
  </div>
  <div class="column align">
    <div class="card">
        <!-- card stat Display -->
        <div class="alert align" role="alert" style="background-color:#4e73df">
            <h4 class="alert-heading display-6">Cards</h4>
            <hr>
            <h3><?php echo $cardcnt ?></h3>
            <h3>Primary</h3>
            <h3><?php //echo $cardnumber ?></h3>
        </div>
    </div>
  </div>
</div>

</body>
</html>

<?php include("../partials/footer.php")?>