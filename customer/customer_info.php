<?php
    include("../partials/header.php");
    include("../partials/warning.php");
    include("../partials/logo_label_top.php");
    include("../partials/customer_navbar.php");
?>

<?php
  // Database Code

  $account_number = $_SESSION['account_number'];;
  $sql = "SELECT * FROM account NATURAL JOIN account_holder WHERE account.customer_id=account_holder.customer_id AND account.account_number=$account_number";
  $result = $conn->query($sql);
  if($result!=False)
  {
    while($row = $result->fetch_assoc())
    {
      $customer_id = $row['customer_id'];
      $account_number = $row['account_number'];
      $type = $row['type'];
      $date_of_creation = $row['date_of_creation'];
      $balance = $row['balance'];
      $branch_id = $row['branch_id'];
      $application_status = $row['application_status'];
      $customer_name = $row['customer_name'];
      $username = $row['Username'];
      $date_of_birth = $row['date_of_birth'];
      $pincode = $row['pincode'];
      $gender = $row['gender'];
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
        <label for="customer_id" class="form-label">Customer Name</label>
        <input class="form-control" type="text" name = "customer_id" placeholder="<?php if(isset($customer_name)){echo $customer_name; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="username" class="form-label">Username</label>
        <input class="form-control" type="text"name = "username" placeholder="<?php if(isset($username)){echo $username; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="customer_id" class="form-label">Customer ID</label>
        <input class="form-control" type="text"  name = "customer_id" placeholder="<?php if(isset($customer_id)){ echo $customer_id; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="account_number" class="form-label">Account Number</label>
        <input class="form-control" type="text" name = "account_number" placeholder="<?php if(isset($account_number)){ echo $account_number; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="type" class="form-label">Account Type</label>
        <input class="form-control" type="text" name = "type" placeholder="<?php if(isset($type)){ echo $type; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="date_of_creation" class="form-label">Date of Creation</label>
        <input class="form-control" type="text" name = "date_of_creation" placeholder="<?php if(isset($date_of_creation)){echo $date_of_creation; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="balance" class="form-label">Balance</label>
        <input class="form-control" type="text"name = "balance" placeholder="<?php if(isset($balance)){echo $balance; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="branch_id" class="form-label">Branch ID</label>
        <input class="form-control" type="text" name = "branch_id" placeholder="<?php if(isset($branch_id)){echo $branch_id; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="application_status" class="form-label">Application status</label>
        <input class="form-control" type="text" name = "application_status" placeholder="<?php if(isset($application_status)){ echo $application_status; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="date_of_birth" class="form-label">Date of birth</label>
        <input class="form-control" type="text" name = "date_of_birth" placeholder="<?php if(isset($date_of_birth)){echo $date_of_birth; }?>"  readonly>
      </div>
      <div class="col-md-6">
        <label for="pincode" class="form-label">Pincode</label>
        <input class="form-control" type="text" name = "pincode" placeholder="<?php if(isset($pincode)){echo $pincode; }?>" readonly>
      </div>
      <div class="col-md-6">
        <label for="gender" class="form-label">Gender</label>
        <input class="form-control" type="text" name = "gender" placeholder="<?php if(isset($gender)){echo $gender; }?>"  readonly>
      </div>
      <div class="col-12">
        <label for="email_id" class="form-label">E Mail ID</label>
        <input type="text" class="form-control" name = "email_id" placeholder="<?php if(isset($email_id)){echo $email_id; }?>" readonly>
      </div>
      <div class="col-12">
        <label for="phone_number" class="form-label">Phone number</label>
        <input type="text" class="form-control" name = "phone_number" placeholder="<?php if(isset($phone_number)){echo $phone_number; }?>" readonly>
      </div>
      <div class="di">
      <a href="../customer/customer_update_info.php"><button type="button" class=' btn btn-primary text-center '>Edit Details</button></a>
      <a href="../customer/customer_change_password.php"><button type="button" class='btn btn-danger btn-block'>Edit Password</button><br></a>
      <br>
      </div>
    </form>
  </div>
</div>

<?php include("../partials/footer.php")?>