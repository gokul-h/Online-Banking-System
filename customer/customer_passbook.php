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
      <h1 class="display-4">Virtual Passbook</h1>
      <p class="lead">Keep track of your account with this virtual Passbook</p>
    </div>
  </div>
</div>

<br>

<?php
    $account_number = $_SESSION['account_number'];
    $sql1 = "SELECT * FROM transactions WHERE account_number=$account_number ORDER BY trans_time DESC;";
    $res1 = $conn->query($sql1);
?>


<!-- Transaction request -->
<div class="conatiner ">
  <div class="text-center wb wp">
            <table class="table table-info table-bordered">
            <thead>
              <tr>
                <th scope="col">Transaction ID</th>
                <th scope="col">Transaction Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Transaction Time</th>
                <th scope="col">Account number</th>
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
              <td>".$row1["trans_id"]."</td>
              <td>".$row1["trans_type"]."</td>
              <td>".$row1["amount"]."</td>
              <td>".$row1["trans_time"]."</td>
              <td>".$row1["account_number"]."</td>
              </tr>";
              }
            }
            else
            {
              echo "<br><h2 class=\"text-center\">No Transactions Recorded<h2>";
            }
            ?>
            </tbody>
          </table>
        <div class=" text-success">Last Updated Now</div>
  </div>
</div>


<?php include("../partials/footer.php")?>