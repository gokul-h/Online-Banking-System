<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/employee_navbar.php");
?>

<?php
    // Database Code
    // Get the details from database
  $username = $_SESSION['user'];
  $sql = "SELECT * FROM employee NATURAL JOIN employee_details WHERE employee_details.emp_id=employee.emp_id AND employee.username='$username';";
  $result = $conn->query($sql);
  if($result!=False)
  {
    while($row = $result->fetch_assoc())
    {
      $emp_id = $_SESSION['emp_id'];
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
<?php
  // Database code to update the details
  if(isset($_POST['submit']))
  {
  mysqli_autocommit($conn,False);
  $emp_name_new = isset($_POST['emp_name']) ? $_POST['emp_name'] : $emp_name;
  $gender_new = isset($_POST['gender']) ? $_POST['gender'] : $gender;
  $branch_id_new = isset($_POST['branch_id']) ? $_POST['branch_id'] : $branch_id;
  $email_id_new = isset($_POST['email_id']) ? $_POST['email_id'] : $email_id;
  $phone_number_new = isset($_POST['phone_number']) ? $_POST['phone_number'] : $phone_number;

  
  $sql2 = "UPDATE employee SET branch_id=$branch_id_new ,emp_name='$emp_name_new' WHERE emp_id = $emp_id";
  $sql3 = "UPDATE employee_details SET  gender='$gender_new', email_id='$email_id_new' , phone_number=$phone_number_new WHERE emp_id = $emp_id";
  
  if ($conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) 
        {
          mysqli_commit($conn);
          $message =  "Details updated Sucessfully";
        } 
        else 
        {
          $message = "Error";
        }
  }
  else
  {

    $message = "Please fil in the deatils";
  }
?>
<div class="wc">
  <input class="form-control "  type="text" value="<?php  if (isset($message)) {echo $message;}; unset($message); ?>" aria-label="readonly input example" readonly>
</div>
<br>

<div class="conatiner wb">
<br>
  <div class="wc">
    <form class="row g-3" method="POST" action="">
      <div class="col-md-6">
        <label for="name" class="form-label">Name</label>
        <input class="form-control" type="text"  name="emp_name" id="emp_name" value="<?php if(isset($emp_name)){ echo $emp_name; }?>" >
      </div>
      <div class="col-md-6">
        <label for="username" class="form-label">Username</label>
        <input class="form-control" type="text"  name="username" id="username" value="<?php if(isset($username)){ echo $username; }?>" readonly >
      </div>
      <div class="col-md-6">
        <label for="position" class="form-label">Position</label>
        <input class="form-control" type="text"  name="position" id="position" value="<?php if(isset($position)){ echo $position; }?>" readonly>
      </div>
      <div class="col-md-6">
        <label for="gender" class="form-label">Gender</label>
        <input class="form-control" type="text"  name="gender" id="gender" value="<?php if(isset($gender)){echo $gender; }?>" >
      </div>
      <div class="col-md-2">
        <label for="empid" class="form-label">Employee ID</label>
        <input class="form-control" type="text"  name="emp_id" id="emp_id" value="<?php if(isset($emp_id)){echo $emp_id; }?>" readonly >
      </div>
      <div class="col-md-2">
        <label for="branchid" class="form-label">Branch ID</label>
        <input class="form-control" type="text"  name="branch_id" id="branch_id" value="<?php if(isset($branch_id)){echo $branch_id; }?>" >
      </div>
      <div class="col-md-2">
        <label for="salray" class="form-label">Salary</label>
        <input class="form-control" type="text" name="salary" id="salary" value="50000" readonly>
      </div>
      <div class="col-md-6">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input class="form-control" type="text"  name="phone_number" id="phone_number" value="<?php if(isset($phone_number)){echo $phone_number; }?>" >
      </div>
      <div class="col-12">
        <label for="email_id" class="form-label">E Mail ID</label>
        <input type="text" class="form-control"   name="email_id" id="email_id" value="<?php if(isset($email_id)){echo $email_id; }?>">
      </div>
      <input name="submit" id="submit" type="submit" value="Update Details" class="btn btn-success">
      <br><br>
    </form>
  </div>
</div>



<?php include("../partials/footer.php")?>