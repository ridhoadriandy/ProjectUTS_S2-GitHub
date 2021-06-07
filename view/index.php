<?php
    include('../config/config.php');

    $loginurl = $google_client->createAuthUrl();
    
?>

<!doctype html>
<html lang="en">

<head>

  <script scr="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script scr="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
  <script scr="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></script>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

  <!-- CUSTOM STYLE -->
  <link rel="stylesheet" href="css/template-style.css">

  <title>Login Onepage</title>

</head>

<body style="background-image: url('../view/images/bg-01.jpg'); background-repeat: no-repeat; background-size: cover;"
  class="size-1140">
  <header>
    <div id="topbar">
      <div class="line">
        <div class="s-12 m-6 l-6">
          <p style="margin-left: 13.1%;">CONTACT US: <strong>+62 811 758 0101 </strong> | <strong>pcr@pcr.ac.id</strong>
          </p>
        </div>
        <div class="s-12 m-6 l-6">
        </div>
      </div>
    </div>
    <nav>
      <div class="line" style="padding-bottom: 1%;">
        <div class="s-12 l-2">
          <p class="logo" style="margin-left: 13.1%;"><strong>One</strong>page</p>
        </div>
      </div>
    </nav>
  </header>

  <div class="content">
    <div class="container">
      <div class="row justify-content-center" style="margin-top: 3%;">
        <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                <div class="mb-4">
                  <h3>Sign In to <strong>Onepage</strong></h3>
                  <p class="mb-4">Welcome to Onepage Your place to create, communicate, collaborate, and get great work done.</p>
                </div>
                <form action="../controller/proses.php?aksi=login" method="post">
                  <div class="form-group first">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">

                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">

                  </div>

                  <div class="d-flex mb-5 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                      <input type="checkbox" checked="checked" />
                      <div class="control__indicator"></div>
                    </label>
                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                  </div>

                  <?php if(isset($_SESSION['error']))  {
                          if($_SESSION['error'] == "true") { ?>
                            <span class="d-block text-center my-4 text" style="color: red;"> Password doesn't match</span>
                  <?php    }
                        }?>

                  <input type="submit" value="Log In" class="btn btn-pill text-white btn-block btn-primary">

                  <span class="d-block text-center my-4 text-muted">Sign in with</span>

                  <div class="social-login text-center">
                    <a href="#" class="facebook">
                      <span class="icon-facebook mr-3"></span>
                    </a>
                    <a href="#" class="twitter">
                      <span class="icon-twitter mr-3"></span>
                    </a>
                    <a href="<?= $loginurl; ?>" class="google">
                      <span class="icon-google mr-3"></span>
                    </a>
                  </div>

                  <span class="d-block text-center my-6 text-muted"> or Not a member?<a href="../controller/proses.php?aksi=refresh"> Register now</a></span>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>