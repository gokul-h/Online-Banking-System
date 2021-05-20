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
      <h1 class="display-4">Deposit Request</h1>
      <p class="lead">Approve/Reject deposit Request</p>
    </div>
  </div>
</div>
<br>

<div>
  <?php if (isset($_SESSION['deposit-status'])) { echo $_SESSION['deposit-status']; unset($_SESSION['deposit-status']); } ?>
</div>


<?php
    $sql1 = "SELECT deposit_id,amount,deposit_term,interest,account_number FROM deposit WHERE application_status = 'Processing'";
    $res1 = $conn->query($sql1);

    $sql2 = "SELECT deposit_id,amount,deposit_term,interest,account_number FROM deposit WHERE application_status = 'Rejected'";
    $res2 = $conn->query($sql2);
?>


<!-- deposit request -->
<div class="conatiner ">
  <div class="text-center wb wp">
  <h3 class="display-6">New Request</h1>
          <table class="table table-info table-bordered">
            <thead>
              <tr>
                <th scope="col">Deposit ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Term</th>
                <th scope="col">Interest</th>
                <th scope="col">Account number</th>
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
              <td>".$row1["deposit_id"]."</td>
              <td>".$row1["amount"]."</td>
              <td>".$row1["deposit_term"]."</td>
              <td>".$row1["interest"]."</td>
              <td>".$row1["account_number"]."</td>
              <td><a href=\"../employee/partials/employee_approve_deposit.php?deposit_id=".$row1['deposit_id']."\"><button class=\"btn btn-block btn-success\">Approve</button></a></td>
              <td><a href=\"../employee/partials/employee_reject_deposit.php?deposit_id=".$row1['deposit_id']."\"><button class=\"btn btn-block btn-danger\">Reject</button></a></td>
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

<!-- deposit Rejected -->
<div class="conatiner ">
  <div class="text-center wb wp">
  <h3 class="display-6">Rejected Request</h1>
          <table class="table table-info table-bordered">
            <thead>
              <tr>
              <th scope="col">deposit ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Term</th>
                <th scope="col">Interest</th>
                <th scope="col">Account number</th>
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
                <td>".$row2["deposit_id"]."</td>
                <td>".$row2["amount"]."</td>
                <td>".$row2["deposit_term"]."</td>
                <td>".$row2["interest"]."</td>

                <td>".$row2["account_number"]."</td>
                <td><a href=\"../employee/partials/employee_approve_deposit.php?deposit_id=".$row2['deposit_id']."\"><button class=\"btn btn-block btn-success\">Approve</button></a></td>
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