<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/navbar.php");
?>

<!-- Welcome Message -->
<div class="conatiner wb"  style="width:50%">
  <div class="jumbotron jumbotron-fluid text-center" >
    <div class="container ">
      <h1 class="display-4">Apply to become an Employee</h1>
      <p class="lead">Please enter your personal details</p>
    </div>
  </div>
</div>
<br>

<?php
  // Database Code

    //Set new emp_id
    $sql1 = "SELECT MAX(emp_id) FROM employee";
    $res1 = $conn->query($sql1);
    $emp_id_new = mysqli_fetch_assoc($res1)['MAX(emp_id)'] + 1;

  if(isset($_POST['submit']))
  {
    $emp_name = $_POST['emp_name'];
    $branch_id = $_POST['branch_id'];
    $username = $_POST['username'];
    $position = $_POST['position'];
    $gender = $_POST['gender'];
    $email_id = $_POST['email_id'];
    $phone_number = $_POST['phone_number'];

    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm-password']);
    
    if($password===$confirm_password)
    {
        mysqli_autocommit($conn,False);
        //Insert the Entry
        $sql2 = "INSERT INTO employee (emp_id,emp_name,username,position,branch_id) VALUES ($emp_id_new,'$emp_name','$username','$position',$branch_id)";

        $sql3 = "INSERT INTO employee_details (emp_id,gender,email_id,phone_number) VALUES($emp_id_new,'$gender','$email_id',$phone_number);";

        $sql4 = "INSERT INTO employee_login VALUES('$username','$password')";

        if ($conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE) 
        {
            mysqli_commit($conn);
            $message =  "Applied for employee creation succesfully";
        } 
        else 
        {
            $message = "Error";
        }
    }
    else
    {
        $message ="Password does not match";
    }
  }
  else
  {
    $message = "Please fill out the form";
  }

?>

<div class="wc text-center">
  <input class="form-control "  type="text" value=" <?php if (isset($message)) { echo $message; unset($message); } ?>" readonly>
</div>
<br>

<div class="conatiner wb">
  <div class="wc">
  <br>
    <form class="row g-3" method="POST" action="">
    <div class="col-12">
        <label for="emp_name" class="form-label">Employee Name</label>
        <input type="text" class="form-control" name = "emp_name"  >
      </div>

      <div class="col-md-6">
        <label for="password" class="form-label">Password</label>
        <input class="form-control" type="text" name = "password"   >
      </div>

      <div class="col-md-6">
        <label for="username" class="form-label">Username</label>
        <input class="form-control" type="text" name = "username"   >
      </div>

      <div class="col-md-6">
        <label for="confirm-password" class="form-label">Confirm Password</label>
        <input class="form-control" type="text" name = "confirm-password"   >
      </div>

      <div class="col-md-6">
        <label for="branch_id" class="form-label">Branch ID</label>
        <input class="form-control" type="text" name = "branch_id"   >
      </div>

      <div class="col-md-6">
        <label for="position" class="form-label">Position</label>
        <input class="form-control" type="text" name = "position" >
      </div>

      <div class="col-md-6">
        <label for="gender" class="form-label">Gender</label>
        <input class="form-control" type="text" name = "gender"   >
      </div>

      <div class="col-12">
        <label for="email_id" class="form-label">E Mail ID</label>
        <input type="text" class="form-control" name = "email_id"  >
      </div>

      <div class="col-12">
        <label for="phone_number" class="form-label">Phone number</label>
        <input type="text" class="form-control" name = "phone_number"  >
      </div>

      <input name="submit" id="submit"  class="btn btn-block btn-success " type="submit" value="Submit">
    </form>

  </div>
</div>

<?php include("../partials/footer.php")?>