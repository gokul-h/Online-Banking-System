<!-- include the basic files -->
<?php
  include("../partials/header.php");
  include("../partials/warning.php");
  include("../partials/logo_label_top.php");
  include("../partials/admin_navbar.php");
?>


<?php
    if(isset($_POST['submit']))
    {
        // Get Data from form
        $branchname = $_POST["branch_name"];
        $pincode = $_POST["pincode"];
        $date = date("Y/m/d");
        // Check SQL Query
        $sql = "INSERT INTO branch (branch_name, pincode, opening_date) VALUES ('$branchname', '$pincode', '$date')";
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
      <h1 class="display-4">Add Branch</h1>
      <p class="lead">Add New Branches</p>
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
      <label for="branch_name">Branch name</label>
      <input type="branch_name" class="form-control" name="branch_name" id="branch_name" placeholder="Enter Branch name">
    </div>
    <br>
    <div class="form-group">
      <label for="pincode">Pincode</label>
      <input type="pincode" class="form-control"  name="pincode" id="pincode" placeholder="Pincode">
    </div>
    <br>
    <input name="submit" id="submit"  class="btn btn-block btn-success " type="submit" value="Submit">
  </form>
  <br>
</div>

<!-- Include footer -->
<?php include("../partials/footer.php")?>