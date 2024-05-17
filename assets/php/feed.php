<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}

require "functions.php";
$dataMusic = query("SELECT * FROM data_music");

if(isset($_POST["cari"])) {
    $genre = isset($_POST["genre"]) ? $_POST["genre"] : "all";
    $keyword = $_POST["keyword"];
    $dataMusic = filterAndSearch($genre, $keyword);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LT FEED</title><meta content="" name="description" />
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
            <h1 class="logo me-auto"><a href="#" class="logo me-auto"><img src="../img/lt3.png" alt="" class="img-fluid">  FEED</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="getstarted scrollto" href="studio.php">STUDIO</a></li>
                    <li>
                    <a class="nav-link scrollto d-flex flex-column align-items-center" href="logout.php"><i class='bx bx-log-out-circle bx-md'></i></a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <!-- End Header -->
    <!-- Table list  -->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-10 mt-5 mx-auto">
                <!-- Filter and Search Form -->
                <form class="mb-4" action="" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select class="form-select" name="genre">
                                <option value="all">All</option>
                                <option value="POP">POP</option>
                                <option value="ROCK">ROCK</option>
                            </select>
                        </div>
                        <input type="text" class="form-control ms-3" placeholder="Cari musik.." aria-label="Search" aria-describedby="button-addon2" name="keyword" autocomplete="off">
                        <button class="btn btn-primary" type="submit" id="button-addon2" name="cari">Search</button>
                    </div>
                </form>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table mx-auto">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Band</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Play</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach($dataMusic as $music) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><img src="../img/band/<?= $music["photo"];?>" width="50px" height="50px" alt=""></td>
                                <td><?= $music["title"]; ?></td>
                                <td><?= $music["band"]; ?></td>
                                <td><?= $music["genre"]; ?></td>
                                <td><audio src="../musik/<?= $music["song"]; ?>" controls></audio></td>
                                <td>
                                    <a href="../musik/<?= $music["song"]; ?>" download>
                                        <i class='bx bxs-cloud-download bx-md'></i>
                                    </a>
                                    <!-- <a href="hapus.php?id=<?= $music['id_music']; ?>" onclick="return confirm('Apakah anda ingin menghapus musik ini?')">
                                    <i class='bx bxs-trash bx-md' ></i>
                                    </a> -->
                                </td>

                            </tr>
                            <?php $i++ ?>
                            <?php endforeach ?>
                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Table list  -->
    <!-- Footer -->
    
    <!-- End Footer -->






    <div id="preloader"></div>
    <!-- JQUERY JS -->
    <script src="../js/jquery-3.7.1.min.js"></script>
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