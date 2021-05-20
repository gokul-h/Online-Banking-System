<!-- include the basic files -->
<?php
  include("../partials/header.php");
  include("../partials/warning.php");
  include("../partials/logo_label_top.php");
  include("../partials/customer_navbar.php");
?>

 
<!-- Database Code to update password -->
<?php
    $username = $_SESSION['user'];
    if(isset($_POST['submit']))
    {
        // Get Data from form
        $_password = md5($_POST["password"]);
        // Check SQL Query
        $sql = "UPDATE account_holder_login SET password ='$_password' WHERE username = '$username'";
      
        if ($conn->query($sql) === TRUE) 
        {
          $message =  "Password Changed Sucessfully";
        } 
        else 
        {
          $message = "Error";
        }
    }
?>

<div>
  <!-- Heading -->
  <div class="conatiner wb"  style="width:50%">
    <div class="jumbotron jumbotron-fluid text-center" >
      <div class="container ">
        <h1 class="display-4">Change Password</h1>
        <p class="lead">Logged in User is <?php echo $username?></p>
      </div>
    </div>
  </div>
  <br>

  <!-- Create the form -->
  <div class="conatiner wbf">
    <br>
    <form method="post" action="" class="wc">
      <input class="form-control "  type="text" placeholder="<?php  if (isset($message)) {echo $message;} ?>" aria-label="readonly input example" readonly>
      <br>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="username" class="form-control" name="username" id="username" placeholder="<?php echo $username ?>" readonly>
      </div>
      <br>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control"  name="password" id="password" placeholder="Password">
      </div>
      <br>
      <input name="submit" id="submit" name="password" class="btn btn-block btn-success " type="submit" value="Submit">
      </form>
      <br>
  </div>
  <br>


<!-- Include footer -->
<?php include("../partials/footer.php");?>