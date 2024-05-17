<?php 
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require "functions.php";
$conn = mysqli_connect("localhost", "root", "", "cloud");

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>alert('Data berhasil ditambahkan');";
    } else {
        echo "<script>alert('Data gagal ditambahkan');";
    }

    // Redirect berdasarkan peran
    if ($_SESSION["role"] === "admin") {
        echo "window.location.href='feedAdmin.php';";
    } elseif ($_SESSION["role"] === "user") {
        echo "window.location.href='feed.php';";
    } else {
        echo "console.error('Error: Peran tidak dikenali');";
    }

    echo "</script>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LT STUDIO</title><meta content="" name="description" />
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
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top" style="background-color: #37517e;">
      <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="#" class="logo me-auto"><img src="../img/lt3.png" alt="" class="img-fluid">  STUDIO</a></h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="getstarted scrollto" href="feed.php">FEED</a></li>
                <li>
                    <a class="nav-link scrollto d-flex flex-column align-items-center" href="logout.php"><i class='bx bx-log-out-circle bx-md'></i></a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        <!-- .navbar -->
       </div>
    </header>
    <!-- End Header -->
    <section class="vh-50">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-flex align-items-center justify-content-center">
              <img src="../img/studio.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="" method="post" enctype="multipart/form-data">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h2 fw-bold mb-0">Unggah Karyamu Disini</span>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="band">Nama Band</label>
                    <input type="text" name="band" id="band" class="form-control form-control-lg" required autocomplete="off" autofocus />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="title">Judul Musik</label>
                    <input type="text" name="title" id="title" class="form-control form-control-lg" required autocomplete="off"/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="genre">Genre Musik</label>
                    <input type="text" name="genre" id="genre" class="form-control form-control-lg" required autocomplete="off" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="photo">Logo Band</label>
                    <input type="file" name="photo" id="photo" class="form-control form-control-lg" required autocomplete="off" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="song">File Musik</label>
                    <input type="file" name="song" id="song" class="form-control form-control-lg" required autocomplete="off" />
                  </div>
                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Unggah</button>
                  </div>

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