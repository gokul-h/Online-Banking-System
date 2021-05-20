<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/customer_navbar.php");
?>

  <!-- Heading -->
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Customer deposit Manager</h1>
      <p class="lead">Manage your Existing deposits and Apply for New Ones</p>
    </div>
  </div>
</div>

<br>

<!-- To select existing data -->
<?php
    $account_number = $_SESSION['account_number'];
    $sql1 = "SELECT * FROM deposit WHERE account_number=$account_number";
    $res1 = $conn->query($sql1);
?>


<!-- deposit request -->
<div class="conatiner ">
  <div class="text-center wb wp">
  <h3 class="display-6">Existing deposit</h1>
          <table class="table table-info table-bordered">
            <thead>
              <tr>
                <th scope="col">Deposit ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Term</th>
                <th scope="col">Interest</th>
                <th scope="col">Account number</th>
                <th scope="col">Application status</th>
                <th scope="col">Applied date</th>
              </tr>
            </thead>
            <tbody>
            <?php
            if($res1!=False)
            {
              while($row1 = $res1->fetch_assoc())
              {
              echo "
              <tr>
              <td>".$row1["deposit_id"]."</td>
              <td>".$row1["amount"]."</td>
              <td>".$row1["deposit_term"]."</td>
              <td>".$row1["interest"]."</td>
              <td>".$row1["account_number"]."</td>
              <td>".$row1["application_status"]."</td>
              <td>".$row1["deposit_date"]."</td>
              </tr>";
              } 
            }
            else
            {
              echo "<br><h2 class=\"text-center\">No deposits Applied<br>Apply for a new deposit using form below<h2>";
            }
            ?>
            </tbody>
          </table>
        <div class=" text-success">Last Updated Now</div>
  </div>
</div>

<br>
<!-- Database code to apply for new deposit -->
<?php 
    if(isset($_POST['submit']))
    {
      $amount = $_POST['amount'];
      $deposit_date = date("Y/m/d");
      $deposit_term = $_POST['deposit_term'];
      $account_number = $_SESSION['account_number'];
      $sql2 = "INSERT INTO deposit (amount,deposit_date,deposit_term,account_number) values($amount,'$deposit_date',$deposit_term,$account_number) ; ";
      $res2 = $conn->query($sql2);
    
      if($res2!=False)
      {
        $message = "Successfully applied for deposit";
      }
      else
      {
        $message = "Failed to apply for deposit";
      }
    }
    else
    {
      $message = "Please fill in the details";
    }

?>
<br> 

<div class="conatiner wbf">
  <br>
  <form method="post" action="" class="wc">
  <div class="display-5">Apply for a New deposit</div><br>
  <h5 class="">Enter the following details and wait for your application to be processed</h5><br>
  <input class="form-control "  type="text" placeholder="<?php  if (isset($message)) {echo $message;}; unset($message); ?>" aria-label="readonly input example" readonly>
    <br>
    <div class="form-group">
      <label for="amount">Amount</label>
      <input type="amount" class="form-control" name="amount" id="amount" placeholder="Enter the deposit Amount">
    </div>
    <br>
    <div class="form-group">
      <label for="deposit_term">Full interest will only be credited if entire term is completed</label>
      <br>
      <label for="deposit_term">Number of years for which fixed deposit is intended</label>
      <input type="deposit_term" class="form-control"  name="deposit_term" id="deposit_term" placeholder="Enter no of years">
    </div>
    <br>
    <input name="submit" id="submit"  class="btn btn-block btn-success " type="submit" value="Submit">
  </form>
  <br>
</div>

<?php include("../partials/footer.php")?>