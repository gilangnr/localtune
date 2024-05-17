<?php 
require "functions.php";
if(isset($_POST["register"])){
    if(registrasi($_POST)>0){
        echo "
            <script>
                alert('Daftar berhasil');
            </script>
        ";
        header("Location: login.php");
    } else{
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LT REGISTER</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link rel="icon" href="../img/lt2.png" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="../vendor/aos/aos.css" rel="stylesheet" />
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="../vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    

    <!-- Template Main CSS File -->
    <link href="../css/style.css" rel="stylesheet" />
</head>
<body style="background-color: #37517e;">
<section class="vh-50" style="background-color: #37517e;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-flex align-items-center justify-content-center">
              <img src="../img/why-us.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Local Tune</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Create Your Account</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="username">Username</label>
                    <input type="username" name="username" id="username" class="form-control form-control-lg" />
                    
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg" />
                   
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password2">Confirm Password</label>
                    <input type="password" name="password2" id="password2" class="form-control form-control-lg" />
                   
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="register">Create</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #black;">Already have an account? <a href="login.php"
                      style="color: #393f81;">Login here</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div id="preloader"></div>
<!-- Vendor JS Files -->
<script src="../vendor/aos/aos.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../js/main.js"></script>
</body>
</html>