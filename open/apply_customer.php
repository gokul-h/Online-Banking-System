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
      <h1 class="display-4">Apply to become a Customer</h1>
      <p class="lead">Please enter your personal details</p>
    </div>
  </div>
</div>
<br>

<?php
  // Database Code
    // Set New Account Number
    $sql = "SELECT MAX(account_number) FROM account";
    $res = $conn->query($sql);
    $account_number_new = mysqli_fetch_assoc($res)['MAX(account_number)'] + 1;

    //Set new customer_id
    $sql1 = "SELECT MAX(customer_id) FROM account";
    $res1 = $conn->query($sql1);
    $customer_id_new = mysqli_fetch_assoc($res1)['MAX(customer_id)'] + 1;

  if(isset($_POST['submit']))
  {
    $customer_name = $_POST['customer_name'];
    $type = $_POST['type'];
    $branch_id = $_POST['branch_id'];
    $username = $_POST['username'];
    $date_of_birth = $_POST['date_of_birth'];
    $pincode = $_POST['pincode'];
    $gender = $_POST['gender'];
    $email_id = $_POST['email_id'];
    $phone_number = $_POST['phone_number'];

    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm-password']);
    
    if($password===$confirm_password)
    {
        mysqli_autocommit($conn,False);
        //Insert the Entry
        $sql2 = "INSERT INTO account_holder (customer_id,customer_name,Username,date_of_birth,pincode,gender,email_id,phone_number) VALUES ($customer_id_new,'$customer_name','$username','$date_of_birth',$pincode,'$gender','$email_id',$phone_number)";

        $sql3 = "INSERT INTO account (account_number,customer_id,type,branch_id) VALUES($account_number_new,$customer_id_new,'$type',$branch_id);";

        $sql4 = "INSERT INTO account_holder_login VALUES('$username','$password')";

        if ($conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE) 
        {
            mysqli_commit($conn);
            $message =  "Applied for Account creation succesfully";
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
    <form class="row g-3" method="POST" action="">

    <div class="col-12">
        <label for="customer_name" class="form-label">Customer Name</label>
        <input type="text" class="form-control" name = "customer_name"  >
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
        <label for="type" class="form-label">Account Type</label>
        <input class="form-control" type="text" name = "type"   >
      </div>

      <div class="col-md-6">
        <label for="branch_id" class="form-label">Branch ID</label>
        <input class="form-control" type="text" name = "branch_id"   >
      </div>

      <div class="col-md-6">
        <label for="date_of_birth" class="form-label">Date of birth</label>
        <input class="form-control" type="text" name = "date_of_birth"  value="2000-10-25">
      </div>

      <div class="col-md-6">
        <label for="pincode" class="form-label">Pincode</label>
        <input class="form-control" type="text" name = "pincode" >
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