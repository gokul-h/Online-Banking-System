<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/admin_navbar.php");
?>

<!-- Heading -->
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Branch Info</h1>
      <p class="lead">View all branches and details</p>
    </div>
  </div>
</div>
<br>
<!-- Table -->
<div class="conatiner wb">
  <?php 
      // SQL Code
      $sql="SELECT * FROM branch;";
      // Execute and get result  
      $result = $conn->query($sql);
      //Print in Table Format
      if($result!== false & $result->num_rows >0)
      {
          echo "
          <div class=\"card-body text-primary text-primary\">
          <blockquote class=\"blockquote mb-0\">
          <table class=\"table table-bordered table-info text-center table-responsive\" >
          <tr>
              <th scope=\"col\">Branch ID</th>
              <th scope=\"col\">Branch Name</th>
              <th scope=\"col\">Pincode</th>
              <th scope=\"col\">Opening Date</th>
              <th scope=\"col\">Modify</th>
              <th scope=\"col\">Delete</th>
          </tr>";
          // Data
          // Fetch-assoc takes result as an associative array
          while($row = $result->fetch_assoc())
          {
              echo "
              <tr>
              <th scope=\"row\">".$row["branch_id"]."</th>
              <td>".$row["branch_name"]."</td>
              <td>".$row["pincode"]."</td>
              <td>".$row["opening_date"]."</td>
              <td><a href=\"../admin/admin_update_branch.php?branch_id=".$row['branch_id']."\"><button class=\"btn btn-block btn-info\">Update Branch</button></a></td>
              <td><a href=\"../admin/partials/admin_delete_branch.php?branch_id=".$row['branch_id']."\"><button class=\"btn btn-block btn-danger\">Delete Branch</button></a></td>
              </tr>";
          }

          echo " </blockquote>
          </div>";
      }
      else
      {
          // Table is Empty since result is false
          echo "<br><h2 class=\"text-center\">This table is empty<h2>";
      }
  ?>
</div>

<!-- Footer -->
<?php //include("../partials/footer.php"); ?>

