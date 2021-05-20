<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/employee_navbar.php");
?>

<?php
  // Database Code

  $username = $_SESSION['user'];
  $sql = "SELECT * FROM employee NATURAL JOIN employee_details WHERE employee_details.emp_id=employee.emp_id AND employee.username='$username';";
  $result = $conn->query($sql);
  if($result!=False)
  {
    while($row = $result->fetch_assoc())
    {
      $emp_id = $row['emp_id'];
      $gender = $row['gender'];
      $emp_name = $row['emp_name'];
      $username = $row['username'];
      $position = $row['position'];
      $branch_id = $row['branch_id'];
      $email_id = $row['email_id'];
      $phone_number = $row['phone_number'];
    }
  }
  else
  {
    
    die("---------Internal Error---------");
  }

?>

<!-- Welcome Message -->
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Personal Info</h1>
      <p class="lead">View and Edit your personal details</p>
    </div>
  </div>
</div>
<br>

<div class="conatiner wb">
<br>
  <div class="wc">
    <form class="row g-3">
      <div class="col-md-6">
        <label for="name" class="form-label">Name</label>
        <input class="form-control" type="text" placeholder="<?php if(isset($emp_name)){ echo $emp_name; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="username" class="form-label">Username</label>
        <input class="form-control" type="text" placeholder="<?php if(isset($username)){ echo $username; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="position" class="form-label">Position</label>
        <input class="form-control" type="text" placeholder="<?php if(isset($position)){ echo $position; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="gender" class="form-label">Gender</label>
        <input class="form-control" type="text" placeholder="<?php if(isset($gender)){echo $gender; }?>"  readonly>
      </div>
      <div class="col-md-2">
        <label for="empid" class="form-label">Employee ID</label>
        <input class="form-control" type="text" placeholder="<?php if(isset($emp_id)){echo $emp_id; }?>"  readonly>
      </div>
      <div class="col-md-2">
        <label for="branchid" class="form-label">Branch ID</label>
        <input class="form-control" type="text" placeholder="<?php if(isset($branch_id)){echo $branch_id; }?>"  readonly>
      </div>
      <div class="col-md-2">
        <label for="salray" class="form-label">Salary</label>
        <input class="form-control" type="text" placeholder="50000" readonly>
      </div>
      <div class="col-md-6">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input class="form-control" type="text" placeholder="<?php if(isset($phone_number)){echo $phone_number; }?>"  readonly>
      </div>
      <div class="col-12">
        <label for="email_id" class="form-label">E Mail ID</label>
        <input type="text" class="form-control"  placeholder="<?php if(isset($email_id)){echo $email_id; }?>" readonly>
      </div>
      <div class="di">
      <a href="../employee/employee_update_info.php"><button type="button" class=' btn btn-primary text-center '>Edit Details</button></a>
      <a href="../employee/employee_change_password.php"><button type="button" class='btn btn-danger btn-block'>Edit Password</button><br></a>
      <br>
      </div>
    </form>
  </div>
</div>

<?php include("../partials/footer.php")?>