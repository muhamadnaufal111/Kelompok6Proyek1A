<?php 
session_start();
include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
    <style>
    body {
        background-color: white;
    }
    .nav {
        background: #D3D3D3;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        line-height: 60px;
        z-index: 100;
    }
    .navbar-text {
        position: relative;
        color: black;
        margin-right: auto;
    }

    .navbar-text .navbar-heading {
        font-size: 2rem;
        margin: 0;
        padding: 0;
        text-shadow: 
        2px 2px 0px rgba(0, 0, 0, 0.5), /* Black shadow */
        }
    .btn {
        color: black;
    }
    .card-body, .list-group-item {
        text-align: justify;
        font-family: 'Times New Roman', Times, serif;
    }
    .card-img-top {
        box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease; /* Add transition for smooth zoom effect */
    }
    .card-img-top:hover {
        transform: scale(1.1); /* Scale the image to 1.1 times its size */
    }
    .navbar-brand {
        margin-right: 20px;
    }
    .sticky-card {
        position: fixed;
        bottom: 250px;
        left: 75%;
        transform: translateX(-50%);
        width: 30rem;
        background-color: #03aac0;
    }
    .rating {
        color: gold;
        font-size: 1.2rem;
        text-align: center;
    }
    .card-title-1 {
        text-align: center;
    }
    .highlight {
        background-color: yellow;
    }
    .list-group-item h5 {
        margin-bottom: 0;
        font-size: 1.1rem;
        font-weight: bold;
    }
    .logo-img {
        width: 95px; /* Adjust the width as needed */
        height: auto; /* Maintain aspect ratio */
    }
    .bottomm {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }
    .boxx {
        width: 100%;
        max-width: 900px; /* Sesuaikan ukuran maksimum box */
    }
    .card-list {
        width: 100%; /* Sesuaikan sesuai kebutuhan */
        max-width: 1100px; /* Sesuaikan sesuai kebutuhan */
        margin: 0 auto; /* Pusatkan card */
    }
    .grid-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1px; /* Jarak antar sel */
        background-color: #ddd; /* Warna untuk jarak */
    }
    .grid-item {
        background-color: white;
        padding: 8px;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        font-size: 14px;
    }
    .header {
        background-color: #f1f1f1;
        font-weight: bold;
        font-size: 14px;
    }
    .cool-text {
        font-size: 4rem;
        font-weight: bold;
        color: #FFD700;
        text-shadow: 
          1px 1px 0px rgba(0, 0, 0, 0.2), /* Warna ungu gelap */
          2px 2px 0px rgba(0, 0, 0, 0.2), /* Warna ungu gelap */
          3px 3px 0px rgba(0, 0, 0, 0.2), /* Warna ungu gelap */
          4px 4px 0px rgba(0, 0, 0, 0.2); /* Warna ungu gelap */
    }

    .w-100 {
        border-radius: 10px;
        transition: transform 0.3s ease; /* Add transition for smooth zoom effect */
    }
    .w-100:hover {
        transform: scale(1.1); /* Scale the image to 1.1 times its size */
    }
    .image-container {
        display: flex;
        justify-content: center;
        gap: 80px; /* Jarak antara gambar */
        margin-top: 50px; /* Jarak dari elemen lainnya */
    }
    .round-image {
        width: 180px; /* Atur ukuran lebar gambar sesuai kebutuhan */
        height: 180px; /* Atur ukuran tinggi gambar sesuai kebutuhan */
        border-radius: 50%; /* Membuat gambar menjadi bulat */
        object-fit: cover; /* Memastikan gambar sesuai dengan container */
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3); /* Memberikan bayangan */
        transition: transform 0.3s ease; /* Add transition for smooth zoom effect */
    }
    .round-image:hover {
        transform: scale(1.1); /* Scale the image to 1.1 times its size */
    }
    .caption {
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        font-size: 1.2rem;
        margin-top: 10px;
    }
    .service-description {
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <img src="logo.png" alt="teon service ac" class="logo-img">
        </div>
        <div class="navbar-text">
        <h1 class="navbar-heading">Teon Service AC</h1>
    </div>
        <div class="right-links d-flex align-items-center">
            <?php 
            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM users WHERE Id = $id");
            while ($result = mysqli_fetch_assoc($query)) {
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }
            echo "<a href='edit.php?Id=$res_id' class='me-3'>Change Profile</a>";
            ?>
            <a href="php/logout.php"><button class="btn">Log Out</button></a>
            <a href="rating.php" class="ms-3 btn btn-warning">Beri Penilaian</a> 
        </div>
    </div>
    <div class="row g-0 bg-body-white position-relative">
        <div class="col-md-6 mb-md-0 p-md-4">
            <img src="ac8.jpg" class="w-100" alt="...">
        </div>
        <div class="col-md-6 p-4 ps-md-0">
            <h5 class="mt-0 cool-text">Air Conditioning</h5>
            <h5 class="mt-0 cool-text">Services</h5>
            <p class="service-description">Layanan jasa pembersihan AC secara umum, isi ulang freon untuk R-22 dan R-410, perbaikan kebocoran freon, AC berisik, dan masalah lainnya pada AC. Layanan ini tersedia untuk semua jenis dan merek unit AC. Tersedia garansi hingga 1 bulan setelah waktu pengerjaan.</p>
            <div class="dropdown" style="margin-top: 1rem;">
            <br>
            <br>
            <br>
                <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pesan layanan Disini
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="jasa_cuci.html">Jasa Cuci AC</a></li>
                    <li><a class="dropdown-item" href="jasa_pasang.html">Jasa Pasang dan Bongkar AC</a></li>
                    <li><a class="dropdown-item" href="jasa_tambah_freon.html">Jasa Tambah Freon</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="image-container">
    <div>
    <img src="cuciAC.jpeg" alt="Cuci AC" class="round-image">
    <button class="btn btn-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCuciAC" aria-controls="offcanvasCuciAC">List Harga Cuci AC</button>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasCuciAC" aria-labelledby="offcanvasCuciACLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasCuciACLabel">List Harga Cuci AC</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Layanan</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Cuci AC 1/3, 1/2, 1 PK</td>
                <td>Rp. 75.000</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Cuci AC 2 PK</td>
                <td>Rp. 100.000</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Cuci AC Interver 1/3, 1/2 PK</td>
                <td>Rp. 100.000</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Cuci AC Interver 1 PK</td>
                <td>Rp. 120.000</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Cuci AC Interver 2 PK</td>
                <td>Rp. 150.000</td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>Cuci Besar (Overhaul) 1/3, 1/2 PK</td>
                <td>Rp. 300.000</td>
            </tr>
            <tr>
                <th scope="row">7</th>
                <td>Cuci Besar (Overhaul) 1 PK</td>
                <td>Rp. 350.000</td>
            </tr>
            <tr>
                <th scope="row">8</th>
                <td>Cuci Besar (Overhaul) 2 PK</td>
                <td>Rp. 450.000</td>
            </tr>
        </tbody>
    </table>
</div>

    </div>
</div>

<div>
    <img src="tambah_freon.jpeg" alt="Tambah Freon" class="round-image">
    <button class="btn btn-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTambahFreon" aria-controls="offcanvasTambahFreon">List Harga Tambah Freon</button>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasTambahFreon" aria-labelledby="offcanvasTambahFreonLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasTambahFreonLabel">List Harga Tambah Freon</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Layanan</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Isi Freon R22 1/3 PK</td>
                <td>Rp. 50.000</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Isi Freon R22 1/2 PK</td>
                <td>Rp. 65.000</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Isi Freon R22 1 PK</td>
                <td>Rp. 60.000</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Isi Freon R22 2 PK</td>
                <td>Rp. 150.000</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Isi Freon R32/410 1/3 PK</td>
                <td>Rp. 50.000</td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>Isi Freon R32/410 1/2 PK</td>
                <td>Rp. 65.000</td>
            </tr>
            <tr>
                <th scope="row">7</th>
                <td>Isi Freon R32/410 1 PK</td>
                <td>Rp. 80.000</td>
            </tr>
            <tr>
                <th scope="row">8</th>
                <td>Isi Freon R32/410 2 PK</td>
                <td>Rp. 150.000</td>
            </tr>
        </tbody>
    </table>
        </div>
    </div>
</div>

<div>
    <img src="jasa_pasang_bongkar.jpeg" alt="Pasang/Bongkar AC" class="round-image">
    <button class="btn btn-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasPasangBongkarAC" aria-controls="offcanvasPasangBongkarAC">List Harga Pasang/Bongkar AC</button>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasPasangBongkarAC" aria-labelledby="offcanvasPasangBongkarACLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasPasangBongkarACLabel">List Harga Pasang/Bongkar AC</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Layanan</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Pasang Ac 1/3 / 1/2 PK</td>
                <td>Rp. 200.000</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Pasang Ac 1 PK</td>
                <td>Rp. 250.000</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Pasang Ac 2 PK</td>
                <td>Rp. 275.000</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Bongkar Ac 1/3 PK</td>
                <td>Rp. 175.000</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Bongkar Ac 1/2, 1, 2 PK</td>
                <td>Rp. 200.000</td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>Pasang Bongkar Ac 1/3 PK</td>
                <td>Rp. 300.000</td>
            </tr>
            <tr>
                <th scope="row">7</th>
                <td>Pasang Bongkar Ac 1/2 PK</td>
                <td>Rp. 375.000</td>
            </tr>
            <tr>
                <th scope="row">8</th>
                <td>Pasang Bongkar Ac 1 PK</td>
                <td>Rp. 400.000</td>
            </tr>
            <tr>
                <th scope="row">8</th>
                <td>Pasang Bongkar Ac 2 PK</td>
                <td>Rp. 425.000</td>
            </tr>
            <tr>
                <th scope="row">8</th>
                <td>Penggantian Sparepart 1/3, 1/2, 1, 2 PK</td>
                <td>Rp. 75.000</td>
            </tr>
        </tbody>
    </table>
        </div>
    </div>
</div>
</div>
    <div class="container mt-5">
    <h2 class="text-center mb-4" style="font-family: 'Times New Roman', Times, serif;">Dokumentasi Pengerjaan Service AC</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="dokumentasi_ac.jpeg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="dokumentasi_ac1.jpeg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="dokumentasi__ac2.jpeg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="dokumentasi_ac5.jpeg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="dokumentasi_ac3.jpeg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="dokumentasi_ac4.jpeg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="dokumentasi_ac6.jpeg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="dokumentasi_ac7.jpeg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="dokumentasi_ac8.jpeg" class="card-img-top" alt="...">
            </div>
        </div>
    </div>
</div>
<br>
<footer class="bg-secondary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Informasi Kontak</h5>
                <p>Jl. Desa Plumbon Blok Gembul RT 05 RW 02</p>
                <p>Email: teonserviceac@gmail.com</p>
                <p>Telepon: 0812-3456-7899</p>
                <p>Service AC Khusus Daerah Indramyu</p>
            </div>
            <div class="col-md-4">
                <h5>Layanan</h5>
                <ul>
                    <li>Jasa Cuci AC</li>
                    <li>Jasa Pasang dan Bongkar AC</li>
                    <li>Jasa Tambah Freon</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Jam Operasional</h5>
                <p>Senin - Minggu: 08.00 - 17.00</p>
            </div>
        </div>
    </div>
</footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>