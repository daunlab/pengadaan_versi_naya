<?php


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login - Pendataan</title>
</head>
<body>
</html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Deran Kusen</title>
        <link href="<?php echo base_url("assets/css/styles.css")?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <section class="vh-80" style="background-image: url('../11.jpg)">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style = "border-radius: 0rem">
          <div class="row g-0">
          <div class="col-md-6 col-lg-5 d-none d-md-block">
              
            </div>
            <div class="col-md-3 col-lg-6 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-white">

                <form method="post" action="<?php echo base_url("index.php/hitlogin") ?>">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: white;"></i>
                    <span class="h1 fw-bold mb-0">Login</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input name="email" type="email" id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input name="password" type="password" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <!-- <button name="login" class="btn btn-white btn-lg btn-block" type="button">Login</button> -->
                    <input type="submit" name="login" value="Login">
                  </div>
                  <a href="#!" class="small text-muted">DERAN JAYA KUSEN</a>
                  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </body>
</html>
 
