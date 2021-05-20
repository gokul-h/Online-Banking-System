<!-- include the basic files -->
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
      <h1 class="display-4">Existing Loan Types</h1>
      <p class="lead">View and modify details of Existing Loan Types</p>
    </div>
  </div>
</div>
<br>

<div class="conatiner wb">
  <?php 
      $sql2 = "SELECT * FROM loan_type;";
      $result2 = $conn->query($sql2);
      if($result2!==false && $result2->num_rows >0)
      {
        echo "
              <div class=\"card-body text-primary text-primary\">
              <blockquote class=\"blockquote mb-0\">
              <table class=\"table table-bordered table-info text-center table-responsive\" >
              <tr>
                  <th scope=\"col\">Loan Nmae</th>
                  <th scope=\"col\">Interest %</th>
                  <th scope=\"col\">Modify</th>
                  <th scope=\"col\">Delete</th>
              </tr>";
              // Data
              // Fetch-assoc takes result as an associative array
              while($row = $result2->fetch_assoc())
              {
                  echo "
                  <tr>
                  <td scope=\"row\">".$row["type"]."</td>
                  <td scope=\"row\">".$row["interest"]."</td>
                  <td><a href=\"../admin/admin_update_loan_type.php?type=".$row['type']."\"><button class=\"btn btn-block btn-info\">Update loan</button></a></td>
                  <td><a href=\"../admin/partials/admin_delete_loan_type.php?type=".$row['type']."\"><button class=\"btn btn-block btn-danger\">Delete loan</button></a></td>
                  </tr>";
              }
              echo " </blockquote>
              </div>";
      }
      else
      {
        echo "<br> <h2 class=\"text-center\">No Loan Type Exist<br>Add New Types</h2><br>";
      }
  ?>
</div>

<!-- Footer -->
<?php //include("../partials/footer.php"); ?>
