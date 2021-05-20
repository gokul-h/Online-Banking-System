<!-- include the basic files -->
<?php
  include("../partials/header.php");
  include("../partials/warning.php");
  include("../partials/logo_label_top.php");
  include("../partials/admin_navbar.php");
?> 

  <!-- Database code to display names of existing admin -->
  <div class="conatiner wbn" style="width:50%">
    <?php 
      $sql2 = "SELECT * FROM admin;";
      $result2 = $conn->query($sql2);
      if($result2!==false && $result2->num_rows >0)
      {
        echo "
              <div class=\"card-body text-primary text-primary\">
              <blockquote class=\"blockquote mb-0\">
              <table class=\"table table-bordered table-info text-center table-responsive\" >
              <tr>
                  <th scope=\"col\">List of Existing Admins</th>
              </tr>";
              // Data
              // Fetch-assoc takes result as an associative array
              while($row = $result2->fetch_assoc())
              {
                  echo "
                  <tr>
                  <td scope=\"row\">".$row["username"]."</td>
                  </tr>";
              }
              echo " </blockquote>
              </div>";
      }
      else
      {
        echo "<br> <h2 class=\"text-center\">No admins Exist</h2><br>";
      }
    ?>
    <!-- Include footer -->
    <?php include("../partials/footer.php");?>
  </div>

