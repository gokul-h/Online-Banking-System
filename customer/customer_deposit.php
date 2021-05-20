<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/customer_navbar.php");
?>

<!-- Welcome Message -->
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Transaction- Deposit Money</h1>
      <p class="lead">Enter money you want to Deposit</p>
    </div>
  </div>
</div>

<br>

<!-- Code for Deposit -->
<?php
if(isset($_POST['submit']))
{
    mysqli_autocommit($conn,False);
    $amount = $_POST['amount'];
    $account_number =  $_SESSION['account_number'];
    $sql = "SELECT balance FROM account WHERE account_number=$account_number;";
    $res = $conn->query($sql);
    $balance = mysqli_fetch_assoc($res)['balance'];
    $balance_new = $balance+$amount;
    $trans_type = "Deposit";

    $sql2 = "UPDATE account SET balance=$balance_new";
    $sql3 = "INSERT INTO transactions (trans_type, amount, account_number) values('$trans_type',$amount,$account_number) ;";

    if ($conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) 
        {
          mysqli_commit($conn);
          $message =  "Amount Deposited Successfully";
        } 
        else 
        {
          $message = "Error";
        }
}
else
{
    $message = "Please enter the amount";
}
?>

<div class="conatiner wbf">
    <br>
    <form method="post" action="" class="wc">
      <input class="form-control "  type="text" value="<?php  if (isset($message)) {echo $message;}; unset($message); ?>"  readonly>
      <br>
      <div class="form-group">
        <label for="amount">Amount</label>
        <input type="amount" class="form-control" name="amount" id="amount" value=0 >
      </div>
      <br>
      <input name="submit" id="submit" class="btn btn-block btn-success " type="submit" value="Deposit">
      </form>
      <br>
  </div>
  <br>




<?php include("../partials/footer.php")?>