<?php
  // This page is for Employee to login
  include("../partials/header.php");
  include("../partials/warning.php");
  include("../partials/logo_label_top.php");
  include("../partials/navbar.php");
?> 

<!-- Welcome Message -->
<div class="conatiner wb"  style="width:50%">
    <div class="jumbotron jumbotron-fluid text-center" >
      <div class="container ">
        <h1 class="display-4"> Employee Login</h1>
        <p class="lead">Enter the details and login</p>
      </div>
    </div>
</div>
  <br>

<!-- HTML Body -->
<?php include("../login_system/login_form.php") ?>

<!-- Database Code -->
<?php 

    //Check whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM employee_login WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $sql1 = "SELECT emp_id FROM employee WHERE username='$username'";
            $res1 = $conn->query($sql1);

            $_SESSION['emp_id'] = mysqli_fetch_assoc($res1)['emp_id']; 

            //User Available and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //To check whether the user is logged in or not and logout will unset it
            //Redirect to Home Page/Dashboard 
            echo "<script>window.top.location='http://localhost/bank/employee/employee_index.php'</script>";
        }
        else
        {
            //User not Available and Login Fail
            // Send Error Message
            $_SESSION['login'] = "<div class='text-center'><p style=\"color:red\">Username or Password did not match</p></div>";
        }


    }

?>

<?php include("../partials/footer.php");?>