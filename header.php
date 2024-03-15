<?php

require_once './config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIG UMKM TTU</title>
    <link rel="icon" href="./assets/dist/img/logo_dinas.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,600&family=Lato:wght@300;400;700&family=Manrope:wght@400;700;800&family=Martian+Mono:wght@800&family=Open+Sans:wght@300&family=Prompt&family=Public+Sans:wght@200&family=Righteous&family=Roboto:wght@500&family=Rubik:wght@600&family=Teko:wght@300&family=Vina+Sans&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- ==== AOS ==== -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        .hero {
            margin-top: 160px;
            margin-bottom: 160px;
        }

        @media (max-width: 768px) {
            .logo-title {
                display: none;
            }
        }

        #mapid {
            height: 100vh;
        }
    </style>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary" style="font-family: 'Roboto', sans-serif">
        <div class="container-fluid m-2">
            <a class="navbar-brand" href="#">
                <img src="./assets/dist/img/logo_dinas.png" alt="Logo" width="24" height="24" class="d-inline-block align-text-top" />
                <small class="logo-title"><strong>DINAS KOPERASI & UMKM KAB. TTU</strong></small>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $last_segment == 'home.php' || $last_segment == '' ? 'active' : ''; ?>" aria-current="page" href="./home.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $last_segment == 'produk.php' ? 'active' : ''; ?>" href="./produk.php">UMKM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $last_segment == 'faq.php' ? 'active' : ''; ?>" href="faq.php">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $last_segment == 'maps.php' ? 'active' : ''; ?>" href="./maps.php">Maps</a>
                    </li>
                </ul>
                <a href="./auth/login.php" class="btn btn-outline-primary mx-2">Login</a>
            </div>
        </div>
    </nav>
    <hr />