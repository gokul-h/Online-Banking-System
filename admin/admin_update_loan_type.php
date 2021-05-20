<!-- include the basic files -->
<?php
  include("../partials/header.php");
  include("../partials/warning.php");
  include("../partials/logo_label_top.php");
  include("../partials/admin_navbar.php");
?>

<!-- Database Code to get existing details of loan  -->
<?php
    $type = $_GET['type'];
        // Check SQL Query
        $sql = "SELECT * FROM loan_type WHERE type='$type'";
        $res = $conn->query($sql);
        //Check whether the query is executed or not
        if($res==true)
        {
            // Check whether the data is available or not
            $count = mysqli_num_rows($res);
            //Check whether we have loan data or not
            if($count==1)
            {
                // Get the Details
                $row=mysqli_fetch_assoc($res);

                $type = $row['type'];
                $interest = $row['interest'];
            }
            else
            {
                die("Invalid loan Type");
                echo "<script>window.top.location='http://localhost/bank/admin/admin_view_loan.php'</script>";
            }
        }
?>

<!-- Heading -->
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Update loan</h1>
      <p class="lead">Enter the new details of loan:<?php  if (isset($_GET['type'])) {echo $_GET['type'];}?></p>
    </div>
  </div>
</div>
<br>

<!-- Create the form -->
<div class="conatiner wbf">
  <br>
  <form method="post" action="" class="wc">
    <input class="form-control "  type="text" placeholder="loan Type: <?php  if (isset($_GET['type'])) {echo $_GET['type'];} ?>" aria-label="readonly input example" readonly>
    <br>
    <div class="form-group">
      <label for="type">loan Type</label>
      <input type="type" class="form-control" name="type" id="type" placeholder="<?php if (isset($type)){echo $type;} ?>">
    </div>
    <br>
    <div class="form-group">
      <label for="interest">Interest</label>
      <input type="interest" class="form-control"  name="interest" id="interest" placeholder="<?php  if (isset($interest)) {echo $interest;}?>">
    </div>
    <br>
    <input name="submit" id="submit"  class="btn btn-block btn-success " type="submit" value="Submit">
  </form>
  <br>
</div>


<?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        // echo "Button Clicked";
        //Get all the values from form to update
        $type_new = $_POST["type"];
        $interest = $_POST["interest"];

        //Create a SQL Query to Update Admin
        $sql = "UPDATE loan_type SET type = '$type_new', interest = $interest WHERE type= '$type';";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and loan Updated
            $_SESSION['update'] = "<div class='success'>loan Updated Successfully.</div>";
            //Redirect to Manage loan Page
            echo "<script>window.top.location='http://localhost/bank/admin/admin_view_loan.php'</script>";
        }
        else
        {
            //Failed to Update loan
            $_SESSION['update'] = "<div class='error'>Failed to Update loan.</div>";
            //Redirect to Manage loan Page
            echo "<script>window.top.location='http://localhost/bank/admin/admin_view_loan.php'</script>";
        }
    }

?>


<!-- Include footer -->
<?php include("../partials/footer.php")?>