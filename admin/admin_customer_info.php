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
      <h1 class="display-4">Customer Info</h1>
      <p class="lead">View all customers and details</p>
    </div>
  </div>
</div>
<br>

<!-- Table -->
<div class="conatiner wb">
  <?php
      // SQL Code
      $sql="SELECT * FROM account_holder NATURAL JOIN account WHERE account_holder.customer_id = account.customer_id;";
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
              <th scope=\"col\">Customer ID</th>
              <th scope=\"col\">Name</th>
              <th scope=\"col\">Username</th>
              <th scope=\"col\">Date of Birth</th>
              <th scope=\"col\">Pincode</th>
              <th scope=\"col\">Gender</th>
              <th scope=\"col\">E mail</th>
              <th scope=\"col\">Phone</th>
              <th scope=\"col\">Status</th>
          </tr>";
          // Data
          // Fetch-assoc takes result as an associative array
          while($row = $result->fetch_assoc())
          {
              echo "
              <tr>
              <th scope=\"row\">".$row["customer_id"]."</th>
              <td>".$row["customer_name"]."</td>
              <td>".$row["Username"]."</td>
              <td>".$row["date_of_birth"]."</td>
              <td>".$row["pincode"]."</td>
              <td>".$row["gender"]."</td>
              <td>".$row["email_id"]."</td>
              <td>".$row["phone_number"]."</td>
              <td>".$row["application_status"]."</td>
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
<?php //include("../partials/footer.php");?>
