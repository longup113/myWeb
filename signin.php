<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
  <title>Login</title>
</head>
<style>
  #signup {
    position: absolute;
    top: 0%;
    width: 81rem;
    display: none;
  }

  #signin {
    position: relative;
  }
</style>
<body class="bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="margin-top:5%;position:relative">
        <h3 class="text-center" style="color:aliceblue">Login - Register</h3>
        <br>
        <form id="signin" method="POST" action="#">
          <div class="mb-3">
            <label for="a" style="color:aliceblue" class="form-label">UserName</label>
            <input type="text" placeholder="Enter username" name="ua" class="form-control" required id="a">
          </div>
          <div class="mb-3">
            <label for="b" style="color:aliceblue" class="form-label">Password</label>
            <input type="password" placeholder="Enter Password" name="ba" class="form-control" required id="b">
          </div>
          <button name="signinsub" type="submit" class="btn btn-danger">Sign In</button>
          <button class="btn btn-warning" id="clickup">Do not have an account ?</button>
        </form>
        <form style="margin-bottom:10%;" id="signup" method="POST" action="#">
          <br>
          <div class="mb-3">
            <label for="c" style="color:aliceblue" class="form-label">FullName</label>
            <input type="text" placeholder="Enter full name" name="fullname" class="form-control" required id="c" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="d" style="color:aliceblue" class="form-label">Phone</label>
            <input type="text" placeholder="Phone Number" name="phone" class="form-control" required id="d" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="e" style="color:aliceblue" class="form-label">UserName</label>
            <input type="text" placeholder="User Name" name="username" class="form-control" required id="e" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="g" style="color:aliceblue" class="form-label">Password</label>
            <input type="password" placeholder="Password" name="password" class="form-control" required id="g">
          </div>
          <button name="submit2" type="submit" class="btn btn-danger">Sign Up</button>
          <button class="btn btn-warning" id="clickup">Move to Sign up</button>
        </form>
        <?php
        session_start();
        include_once("config.php");
        if (isset($_POST['signinsub'])) {
          $a = $_POST['ua'];
          $b = $_POST['ba'];
          $result = mysqli_query($con, "select * from user where UserName='$a' and Password='$b'");
          $fetch = mysqli_fetch_array($result);
          if (mysqli_num_rows($result) != 0) {
            $admin = $fetch['Role_1'];
            if ($admin == 1) {
              $_SESSION['admin'] = "admin";
              echo ("<script>alert('Congratulations on your successful login')</script>");
              header("location:index.php");
            } else {
              if (isset($_SESSION['admin'])) {
                session_destroy();
              } else {
                $_SESSION['user'] = $a;
                header("location:index.php");
              }
            }
          } else {
            echo ("<script>alert('Account or password is incorrect')</script>");
          }
        } else if (isset($_POST['submit2'])) {
          $u = $_POST['username'];
          $check = mysqli_query($con, "select * from user where UserName='$u'");
          if (mysqli_num_rows($check) == 0) {
            $result = mysqli_query($con, "INSERT INTO `user`( `UserName`, `Password`, `FullName`, `Phone`,`Role_1`) VALUES ('" . $_POST['username'] . "','" . $_POST['password'] . "','" . $_POST['fullname'] . "','" . $_POST['phone'] . "','0')");
            if ($result) {
              echo ("<script>alert('Congratulations on your successful registration')</script>");
            } else {
              echo ("<script>alert('Failing')</script>");
            }
          } else {
            echo ("<script>alert('An account name already exists')</script>");
          }
        }
        ?>
        <script>
          var is = true;
          $("#clickup").click(function() {
            if (is) {
              $("#signin").css("display", "none");
              $("#signup").css("display", "block");
              $(this).text("Move to Sign In")
              is = false
            } else if (is == false) {
              $("#signin").css("display", "block");
              $("#signup").css("display", "none");
              $(this).text("Move to Sign up");
              is = true
            }
          })
        </script>
      </div>
    </div>
  </div>
</body>
</html>