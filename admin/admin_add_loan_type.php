<!-- include the basic files -->
<?php
  include("../partials/header.php");
  include("../partials/warning.php");
  include("../partials/logo_label_top.php");
  include("../partials/admin_navbar.php");
?>

<!-- Database Code -->
<?php
    if(isset($_POST['submit']))
    {
        // Get Data from form
        $_loan_name = $_POST["loan_name"];
        $_interest = $_POST["interest"];
        
        // Check SQL Query
        $sql = "INSERT INTO loan_type VALUES ('$_loan_name', $_interest)";
        if ($conn->query($sql) === TRUE) 
        {
          $message =  "Record inserted successfully";
        } 
        else 
        {
          $message = "Error: Duplicate Entry";
        }
    }
?>


<!-- Heading -->
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Add Loan Type</h1>
      <p class="lead">Input the loan name and interest per annum in percentage</p>
    </div>
  </div>
</div>
<br>

<!-- Create the form -->
<div class="conatiner wbf">
  <br>
  <form method="post" action="" class="wc">
  <input class="form-control "  type="text" placeholder="<?php  if (isset($message)) {echo $message;} ?>" aria-label="readonly input example" readonly>
  <br>
    <div class="form-group">
      <label for="loan_name">Loan Name</label>
      <input type="loan_name" class="form-control" name="loan_name" id="loan_name" placeholder="Enter Loan name">
    </div>
    <br>
    <div class="form-group">
      <label for="interest">Interest %</label>
      <input type="interest" class="form-control"  name="interest" id="interest" placeholder="Enter Interest percentage">
    </div>
    <br>
    <input name="submit" id="submit" class="btn btn-block btn-success " type="submit" value="Submit">
  </form>
  <br>
</div>


<!-- Include footer -->
<?php include("../partials/footer.php")?>