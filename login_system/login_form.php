<!-- Login Form -->
<div class="conatiner wbf">
    <br>
    <form method="post" action="" class="wc">
    <!-- To display error message -->
    <?php 
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if(isset($_SESSION['no-login-message']))
        {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
    ?>

    <!-- Form USER INPUT -->
      <div class="form-group">
        <label for="username">Username</label>
        <input type="username" class="form-control" name="username" id="username" placeholder="Enter Username">
      </div>
      <br>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control"  name="password" id="password" placeholder="Password">
      </div>
      <br>
      <input name="submit" id="submit" name="password" class="btn btn-block btn-success " type="submit" value="Login">
      </form>
    <br>
</div>
<br>

