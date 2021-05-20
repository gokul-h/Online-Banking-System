<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/navbar.php");
?>
<!-- Heading -->
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">ATM</h1>
      <p class="lead">Welcome to our ATM</p>
    </div>
  </div>
</div>
<br>

<!-- Databse code -->
<?php
    if(isset($_POST['submit'])) //To check if clicked on submit button
    {
        $cardnumber = $_POST["cardnumber"];
        $expirymonth = $_POST['ExpiryMonth'];
        $expiryyear = $_POST['ExpiryYear'];
        $cvv = $_POST['CVV'];
        $name = $_POST['name'];
        $amount = $_POST['amount'];
        $pin = $_POST['PIN'];
        $expdate = $expiryyear."-".$expirymonth."-01";

        // To check if credentials are correct
        $sql1 = "SELECT exists(SELECT card_number,cvv,exp_date, pin FROM card WHERE card_number=$cardnumber AND cvv=$cvv AND exp_date='$expdate' AND pin=$pin AND application_status='Approved' );" ;
        $res1 = $conn->query($sql1);

        if($res1!=False) // If credentials are correct
        {
            //TEST
            $sql4 = "SELECT account_number FROM card WHERE card_number=$cardnumber;"; // Get account number from card
            $res4 = $conn->query($sql4);
            if($res4)
            {
                $account_number = mysqli_fetch_assoc($res4)['account_number'];
            }
            $message = "Credentials are Correct";

            $sql = "SELECT balance FROM account WHERE account_number=$account_number;"; // Check if adequate Balance is Availablle
            $res = $conn->query($sql);
            if($res)
            {
            $balance = mysqli_fetch_assoc($res)['balance'];
                if ($balance>=$amount) 
                {
                    mysqli_autocommit($conn,False);
                    $balance_new = $balance-$amount;
                    $trans_type = "Withdrawal-ATM";
                    $sql2 = "UPDATE account SET balance=$balance_new";  // Do the transaction
                    $sql3 = "INSERT INTO transactions (trans_type, amount, account_number) values('$trans_type',$amount,$account_number) ;";

                    if ($conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) 
                        {
                            mysqli_commit($conn);
                            $message =  "Amount Debited Successfully";
                        } 
                        else 
                        {
                            $message = "Error";
                        }  
                }
            }
            else 
            {
                $message = "Not Enough Balance Available";
            }
        }
        else
        {
            $message = "Entered credentials are wrong";
        }
    }
    else
    {
        $message = "Please fill in the details";
    }
?>

<!-- Input form -->
<div class="conatiner wbf">
    <div class="wc">
    <br>
    <form class="row g-3" method="POST" action="">
    <input class="form-control "  type="text" placeholder="<?php  if (isset($message)) {echo $message;} ?>" aria-label="readonly input example" readonly>
        <br>
            <div class="col-md-6">
                <label for="cardnumber" class="form-label">Card<br>Number</label>
                <input type="cardnumber" class="form-control" name="cardnumber" id="cardnumber" placeholder="Enter your card number"> 
            </div>
            <div class="col-md-2">
                <label for="ExpiryMonth" class="form-label">Expiry<br>Month</label>
                <input type="ExpiryMonth" class="form-control" name="ExpiryMonth" id="ExpiryMonth">
            </div>
            <div class="col-md-2">
                <label for="ExpiryYear" class="form-label">Expiry<br>Year</label>
                <input type="ExpiryYear" class="form-control"  name="ExpiryYear" id="ExpiryYear">
            </div>
            <div class="col-md-2">
                <label for="CVV" class="form-label"><br>CVV</label>
                <input type="CVV" class="form-control" name="CVV" id="CVV">
            </div>
            <div class="col-12">
                <label for="name" class="form-label">Name as in card</label>
                <input type="name" class="form-control" id="name"  name="name" placeholder="Enter name as in card">
            </div>
            <div class="col-md-6">
                <label for="amount" class="form-label">Amount</label>
                <input type="amount" class="form-control" id="amount" name="amount" placeholder="Enter amount to withdraw">
            </div><hr>
            <div class="col-md-2">
                <label for="PIN" class="form-label"><br>PIN</label>
                <input type="PIN" class="form-control" name="PIN" id="PIN">
            </div>
            <br>
            <input name="submit" id="submit" type="submit" value="Withdraw" class="btn btn-success">
        </form>
        <br>
    </div>
</div>

<br><br>
<?php include("../partials/footer.php");?>