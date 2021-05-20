<!-- include the basic files -->
<?php
  include("../partials/header.php");
  include("../partials/warning.php");
  include("../partials/logo_label_top.php");
  include("../partials/admin_navbar.php");
?>

<!-- Database Code to get existing details of branch  -->
<?php
    $branch_id = $_GET['branch_id'];
        // Check SQL Query
        $sql = "SELECT * FROM branch WHERE branch_id=$branch_id";
        $res = $conn->query($sql);
        //Check whether the query is executed or not
        if($res==true)
        {
            // Check whether the data is available or not
            $count = mysqli_num_rows($res);
            //Check whether we have branch data or not
            if($count==1)
            {
                // Get the Details
                $row=mysqli_fetch_assoc($res);

                $branch_name = $row['branch_name'];
                $pincode = $row['pincode'];
            }
            else
            {
                die("Invalid Branch");
                echo "<script>window.top.location='http://localhost/bank/admin/admin_branch_info.php'</script>";
            }
        }
?>

<!-- Heading -->
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Update Branch</h1>
      <p class="lead">Enter the new details of branch:<?php  if (isset($_GET['branch_id'])) {echo $_GET['branch_id'];}?></p>
    </div>
  </div>
</div>
<br>

<!-- Create the form -->
<div class="conatiner wbf">
  <br>
  <form method="post" action="" class="wc">
    <input class="form-control "  type="text" placeholder="Branch ID: <?php  if (isset($_GET['branch_id'])) {echo $_GET['branch_id'];} ?>" aria-label="readonly input example" readonly>
    <br>
    <div class="form-group">
      <label for="branch_name">Branch name</label>
      <input type="branch_name" class="form-control" name="branch_name" id="branch_name" placeholder="<?php if (isset($pincode)){echo $branch_name;} ?>">
    </div>
    <br>
    <div class="form-group">
      <label for="pincode">Pincode</label>
      <input type="pincode" class="form-control"  name="pincode" id="pincode" placeholder="<?php  if (isset($pincode)) {echo $pincode;}?>">
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
        $branch_name = $_POST["branch_name"];
        $pincode = $_POST["pincode"];

        //Create a SQL Query to Update Admin
        $sql = "UPDATE branch SET branch_name = '$branch_name', pincode = $pincode WHERE branch_id= $branch_id;";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Branch Updated
            $_SESSION['update'] = "<div class='success'>Branch Updated Successfully.</div>";
            //Redirect to Manage Branch Page
            echo "<script>window.top.location='http://localhost/bank/admin/admin_branch_info.php'</script>";
        }
        else
        {
            //Failed to Update Branch
            $_SESSION['update'] = "<div class='error'>Failed to Update Branch.</div>";
            //Redirect to Manage Branch Page
            echo "<script>window.top.location='http://localhost/bank/admin/admin_branch_info.php'</script>";
        }
    }

?>


<!-- Include footer -->
<?php include("../partials/footer.php")?>