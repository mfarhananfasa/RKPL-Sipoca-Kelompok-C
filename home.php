<?php
session_start();

if ($_SESSION['login'] != "true") {
    header('location: login.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    

    <!--CSS Internal-->
    <link rel="stylesheet" href="styles/style.css">

    <title>Home</title>
  </head>
  <body style="background-image: url(img/background.jpg); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">      
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg mt3">
        <div class="container">
          <a class="navbar-brand fw-bold" href="dashboard.php" style="color: #ABE4EC;">DASHBOARD</a>
          <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon-light "></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active fw-bold justify-content-center text-uppercase text-decoration-none" id="navbarDropdown" role="button" style="color: #ABE4EC;" data-bs-toggle="dropdown" aria-expanded="false">Hallo!, 
                    <span class="fw-bold font-3"> <?= $_SESSION['nama'] ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right text-small border-0 shadow text-end m-0 p-0 rounded-5" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-dark rounded-5" href="logout.php">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <!--Navbar Close-->
    <!--Content--> 
    <div class=" justify-content-end container">
        <h1 class="margin1 font-big text-end " style="color: #ABE4EC;">SIPOCA</h1>
        <h2 class="text-end fw-bold text-light" style="color: #61CDBE;">Sistem Inventaris Pondok Cemara</h2>
        <!-- <button class="mt-3 mb-3 rounded-10 shadow-lg border-0" style="background-color: #F4C51E;"><a href="" class="text-dark nav-link ms-3 me-3">Pinjam</a></button> -->
    </div>
    <!-- <div class="d-flex justify-content-center mt-5">
        <div class="col-md-6 col-lg-3">
            
        </div>
    </div> -->
    <!--Content Close-->
    
    <!--Footer-->
    <footer class="margin2 pt-1">
        <div class="pt-5 mt-5 text-center text-white">Kelompok C © 2021. All rights reserved</div>
    </footer>
    <!--Footer Close-->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>