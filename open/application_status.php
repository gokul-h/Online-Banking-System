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
      <h1 class="display-4">Check Application status</h1>
      <p class="lead">Enter the details and check your application ststus</p>
    </div>
  </div>
</div>
<br>

<?php
  if(isset($_POST['submit']))
  {
    $usertype = $_REQUEST['usertype'];
    $username = $_POST['username'];

    if($usertype==="customer")
    {
        $sql = "SELECT application_status FROM account WHERE account_number=(SELECT account_number FROM account_holder WHERE Username='$username');";
        $res = $conn->query($sql);
        if($res)
        {
          $application_status = mysqli_fetch_assoc($res)['application_status'];
          $message = $application_status;
        }
        else
        {
          $message = "User not found!";
        }
    }
    else if($usertype==="employee")
    {
      $sql1 = "SELECT application_status FROM employee WHERE username='$username';";
      $res1 = $conn->query($sql1);
      if($res1)
      {
        $application_status = mysqli_fetch_assoc($res1)['application_status'];
        $message = $application_status;
      }
      else
      {
        $message = "User not found!";
      }
    }
    else{
      $message = "Error";
    }
  }
  else
  {
    $message = 'Please Enter the details';
  }
?>

<!-- Check ststus -->
<div class="conatiner wb ">
<br>
<div class="wc">
    <form class="row row-cols-lg-auto g-3 align-items-center " method="POST" action="">
    <div class="col-12">
        <label class="visually-hidden" for="username">Username</label>
        <div class="input-group">
        <div class="input-group-text">@</div>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
    </div>

    <div class="col-12">
        <select class="form-select" id="usertype" name="usertype">
        <option value="customer">Customer</option>
        <option value="employee">Employee</option>
        </select>
    </div>

    <div class="col-12">
        <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Submit">
    </div>
    </form>
<br>
<input class="form-control "  type="text" value="<?php  if (isset($message)) {echo $message;} ?>" aria-label="readonly input example" readonly>
<br>
</div>
</div>

<?php include("../partials/footer.php");?>