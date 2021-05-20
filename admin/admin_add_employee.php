<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/admin_navbar.php");
?>
<!-- heading -->
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Approve Employee</h1>
      <p class="lead">View and approve all Employee applications</p>
    </div>
  </div>
</div>
<br>

<div class="wc">
  <input class="form-control "  type="text" placeholder="<?php  if (isset($_SESSION['employe-status'])) {echo $_SESSION['employe-status'];}; unset($_SESSION['employe-status']); ?>" aria-label="readonly input example" readonly>
</div>
<br>

<!-- Table -->
<div class="conatiner wb">
  <?php 
      // SQL Code
      $sql="SELECT * FROM employee NATURAL JOIN employee_details WHERE employee_details.emp_id=employee.emp_id AND employee.application_status='Processing';";
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
              <th scope=\"col\">Emp ID</th>
              <th scope=\"col\">Employee Name</th>
              <th scope=\"col\">Gender</th>
              <th scope=\"col\">Username</th>
              <th scope=\"col\">Position</th>
              <th scope=\"col\">Branch ID</th>
              <th scope=\"col\">Email ID</th>
              <th scope=\"col\">Phone Number</th>
              <th scope=\"col\">Approve</th>
              <th scope=\"col\">Reject</th>
          </tr>";
          // Data
          // Fetch-assoc takes result as an associative array
          while($row = $result->fetch_assoc())
          {
              echo "
              <tr>
              <td>".$row["emp_id"]."</td>
              <td>".$row["emp_name"]."</td>
              <td>".$row["gender"]."</td>
              <td>".$row["username"]."</td>
              <td>".$row["position"]."</td>
              <td>".$row["branch_id"]."</td>
              <td>".$row["email_id"]."</td>
              <td>".$row["phone_number"]."</td>
              <td><a href=\"../admin/partials/admin_approve_employee.php?emp_id=".$row['emp_id']."\"><button class=\"btn btn-block btn-success\">Approve</button></a></td>
              <td><a href=\"../admin/partials/admin_reject_employee.php?emp_id=".$row['emp_id']."\"><button class=\"btn btn-block btn-danger\">Reject</button></a></td>
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

<!-- Include footer -->
<?php //include("../partials/footer.php") ?>

