<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/employee_navbar.php");
?>

  <!-- Heading -->
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Account Request</h1>
      <p class="lead">Approve/Reject account Request</p>
    </div>
  </div>
</div>
<br>

<div>
  <?php if (isset($_SESSION['account-status'])) { echo $_SESSION['account-status']; unset($_SESSION['account-status']); } ?>
</div>


<?php
// Replace with complete info using join
    $sql1 = "SELECT account_number,customer_id,type,balance,branch_id FROM account WHERE application_status = 'Processing'";
    $res1 = $conn->query($sql1);

    $sql2 = "SELECT account_number,customer_id,type,balance,branch_id FROM account WHERE application_status = 'Rejected'";
    $res2 = $conn->query($sql2);
?>


<!-- account request -->
<div class="conatiner ">
  <div class="text-center wb wp">
  <h3 class="display-6">New Request</h1>
          <table class="table table-info table-bordered">
            <thead>
              <tr>
                <th scope="col">Account number</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Type</th>
                <th scope="col">Balance</th>
                <th scope="col">Branch ID</th>
                <th scope="col">Approve</th>
                <th scope="col">Reject</th>
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
              <td>".$row1["account_number"]."</td>
              <td>".$row1["customer_id"]."</td>
              <td>".$row1["type"]."</td>
              <td>".$row1["balance"]."</td>
              <td>".$row1["branch_id"]."</td>
              <td><a href=\"../employee/partials/employee_approve_account.php?account_number=".$row1['account_number']."\"><button class=\"btn btn-block btn-success\">Approve</button></a></td>
              <td><a href=\"../employee/partials/employee_reject_account.php?account_number=".$row1['account_number']."\"><button class=\"btn btn-block btn-danger\">Reject</button></a></td>
              </tr>";
              }
            }
            else
            {
              echo "<br><h2 class=\"text-center\">No new request<h2>";
            }
            ?>
            </tbody>
          </table>
        <div class=" text-success">Last Updated Now</div>
  </div>
</div>

<br>

<!-- account Rejected -->
<div class="conatiner ">
  <div class="text-center wb wp">
  <h3 class="display-6">Rejected Request</h1>
          <table class="table table-info table-bordered">
            <thead>
              <tr>
                <th scope="col">Account number</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Type</th>
                <th scope="col">Balance</th>
                <th scope="col">Branch ID</th>
                <th scope="col">Approve</th>
              </tr>
            </thead>
            <tbody>
            <?php
            if($res2!=False)
            {
              while($row2 = $res2->fetch_assoc())
              {
                echo "
                <tr>
                <td>".$row2["account_number"]."</td>
                <td>".$row2["customer_id"]."</td>
                <td>".$row2["type"]."</td>
                <td>".$row2["balance"]."</td>
                <td>".$row2["branch_id"]."</td>
                <td><a href=\"../employee/partials/employee_approve_account.php?account_number=".$row2['account_number']."\"><button class=\"btn btn-block btn-success\">Approve</button></a></td>
                </tr>";
              }
            }
            else
            {
              echo "<br><h2 class=\"text-center\">No Rejected Request<h2>";
            }
            ?>
            </tbody>
          </table>
        <div class=" text-success">Last Updated Now</div>
  </div>
</div>

<?php include("../partials/footer.php")?>