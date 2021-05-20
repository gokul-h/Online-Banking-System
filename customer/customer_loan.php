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
      <h1 class="display-4">Customer Loan Manager</h1>
      <p class="lead">Manage your Existing Loans and Apply for New Ones</p>
    </div>
  </div>
</div>

<br>


<!-- To select existing data -->
<?php
    $account_number = $_SESSION['account_number'];
    $sql1 = "SELECT * FROM loan WHERE account_number=$account_number";
    $res1 = $conn->query($sql1);
?>


<!-- loan request -->
<div class="conatiner ">
  <div class="text-center wb wp">
  <h3 class="display-6">Existing Loan</h1>
          <table class="table table-info table-bordered">
            <thead>
              <tr>
                <th scope="col">Loan ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Term</th>
                <th scope="col">Interest</th>
                <th scope="col">Installments</th>
                <th scope="col">Installment Money</th>
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
              <td>".$row1["loan_id"]."</td>
              <td>".$row1["amount"]."</td>
              <td>".$row1["loan_term"]."</td>
              <td>".$row1["interest"]."</td>
              <td>".$row1["installments"]."</td>
              <td>".$row1["installment_money"]."</td>
              <td>".$row1["account_number"]."</td>
              <td>".$row1["application_status"]."</td>
              <td>".$row1["approval_date"]."</td>
              </tr>";
              } 
            }
            else
            {
              echo "<br><h2 class=\"text-center\">No Loans Applied<br>Apply for a new Loan using form below<h2>";
            }
            ?>
            </tbody>
          </table>
        <div class=" text-success">Last Updated Now</div>
  </div>
</div>

<br>
<!-- Database code to apply for new Loan -->
<?php 
    if(isset($_POST['submit']))
    {
      $amount = $_POST['amount'];
      $approval_date = date("Y/m/d");
      $loan_term = $_POST['loan_term'];
      $interest = $_REQUEST['interest'];
      $installments = $_POST['installments'];
      $installment_money = $amount/$installments;
      $account_number = $_SESSION['account_number'];

      $sql2 = "INSERT INTO loan (amount,approval_date,loan_term,interest,installments,installment_money,account_number) values($amount,'$approval_date',$loan_term,$interest,$installments,$installment_money,$account_number) ; ";
      $res2 = $conn->query($sql2);
    
      if($res2!=False)
      {
        $message = "Successfully applied for Loan";
      }
      else
      {
        $message = "Failed to apply for Loan";
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
  <div class="display-5">Apply for a New Loan</div><br>
  <h5 class="">Enter the following details and wait for your application to be processed</h5><br>
  <input class="form-control "  type="text" placeholder="<?php  if (isset($message)) {echo $message;}; unset($message); ?>" aria-label="readonly input example" readonly>
    <br>
    <div class="form-group">
      <label for="amount">Amount</label>
      <input type="amount" class="form-control" name="amount" id="amount" placeholder="Enter the loan Amount">
    </div>
    <br>
    <div class="form-group">
      <label for="loan_term">Number of years in which Loan will be paid back (TERM)</label>
      <input type="loan_term" class="form-control"  name="loan_term" id="loan_term" placeholder="Enter no of years(Term)">
    </div>
    <br>
    <div class="form-group">
      <label for="installments">No of Installemts in which you can pay back</label>
      <input type="installments" class="form-control"  name="installments" id="installments" placeholder="No of Installemts">
    </div>
    <br>
    <div class="form-group"> 
        <!-- Select Loan Type -->
        <label for="interest">Loan Type</label>
        <select name="interest" class="form-select">
          <?php

            $sql3 = "SELECT * FROM loan_type";
            $res3 = $conn->query($sql3);

            while($row=$res3->fetch_assoc())
            {
              echo "<option value=\"".$row['interest']."\">".$row['type']."-".$row['interest']."</option>";
            }
          ?>
        </select>
        </div>
        <br>
    <br>
    <input name="submit" id="submit"  class="btn btn-block btn-success " type="submit" value="Submit">
  </form>
  <br>
</div>




<?php include("../partials/footer.php")?>