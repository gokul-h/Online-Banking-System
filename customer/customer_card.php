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
      <h1 class="display-4">Customer card Manager</h1>
      <p class="lead">Manage your Existing cards and Apply for New Ones</p>
    </div>
  </div>
</div>

<br>


<!-- To select existing data -->
<?php
    $account_number = $_SESSION['account_number'];
    $sql1 = "SELECT * FROM card WHERE account_number=$account_number";
    $res1 = $conn->query($sql1);
?>


<!-- card request -->
<div class="conatiner ">
  <div class="text-center wb wp">
  <h3 class="display-6">Existing card</h3>
          <table class="table table-info table-bordered">
            <thead>
              <tr>
                <th scope="col">Card Number</th>
                <th scope="col">Card Type</th>
                <th scope="col">Expiry Date</th>
                <th scope="col">Account number</th>
                <th scope="col">Application status</th>
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
              <td>".$row1["card_number"]."</td>
              <td>".$row1["card_type"]."</td>
              <td>".$row1["exp_date"]."</td>
              <td>".$row1["account_number"]."</td>
              <td>".$row1["application_status"]."</td>
              </tr>";
              } 
            }
            else
            {
              echo "<br><h2 class=\"text-center\">No cards Applied<br>Apply for a new card using form below<h2>";
            }
            ?>
            </tbody>
          </table>
        <div class=" text-success">Last Updated Now</div>
  </div>
</div>

<br>
<!-- Database code to apply for new card -->
<?php 
    if(isset($_POST['submit']))
    {
      $card_number = $_POST['card_number'];
      $card_type = $_POST['card_type'];
      $pin = $_POST['pin'];
      $cvv = $_POST['cvv'];
      $account_number = $_SESSION['account_number'];

      $sql2 = "INSERT INTO card (card_number, card_type, pin, cvv, account_number) values($card_number, '$card_type', $pin, $cvv,$account_number) ; ";
      $res2 = $conn->query($sql2);
    
      if($res2!=False)
      {
        $message = "Successfully applied for card";
      }
      else
      {
        $message = "Please choose another card number";
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
  <div class="display-5">Apply for a New card</div><br>
  <h5 class="">Enter the following details and wait for your application to be processed</h5><br>
  <input class="form-control "  type="text" placeholder="<?php  if (isset($message)) {echo $message;}; unset($message); ?>" aria-label="readonly input example" readonly>
    <br>
    <div class="form-group">
      <label for="card_number">Card Number</label>
      <input type="card_number" class="form-control" name="card_number" id="card_number" placeholder="Enter the card card_number">
    </div>
    <br>
    <div class="form-group">
      <label for="card_type">Card Type</label>
      <input type="card_type" class="form-control"  name="card_type" id="card_type" placeholder="Enter the card type">
    </div>
    <br>
    <div class="form-group">
      <label for="cvv">CVV</label>
      <input type="cvv" class="form-control"  name="cvv" id="cvv" placeholder="Enter the CVV">
    </div>
    <br>
    <div class="form-group">
      <label for="pin">PIN</label>
      <input type="pin" class="form-control"  name="pin" id="pin" placeholder="Enter the pin">
    </div>
    <br>
    <input name="submit" id="submit"  class="btn btn-block btn-success " type="submit" value="Submit">
  </form>
  <br>
</div>


<?php include("../partials/footer.php")?>