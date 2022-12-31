<?php
	include ("includes/koneksi.php");
	if(empty($_SESSION['nama']) || $_SESSION['level'] != 2){
		header("Location: error.php");
	}
	include 'includes/assets.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iNews - Kategori Berita</title>
    <link rel="stylesheet" href="bootstrap/bootstrap-4.5.3-dist/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link rel="stylesheet" href="mainstyle.css">
    <script type="text/javascript" src="bootstrap/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.5.1.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand"><b style="color: #e60000;">i</b>News</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
					<a class="nav-link" href="input.php">Masukkan Berita</a>
                    <a class="nav-link" href="kelolaberita.php">Kelola Berita</a>
                    <a class="nav-link" href="kelolaakun.php">Kelola Akun</a>
                    <a class="nav-link" href="penilaian.php">Penilaian</a>
                    <a class="nav-link" href="kategori.php">Lihat Berita</a>
                    <a class="nav-link" href="logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="sect2" id="sect2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br><br>
                    <h2 class="isi">Kategori Berita</h2>
                    <hr>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                    <br>
                        <a class="btn btn-outline-dark" href="ekonomi.php" role="button">Ekonomi</a><br><br>
                        <a class="btn btn-outline-dark" href="kesehatan.php" role="button">Kesehatan</a><br><br>
                        <a class="btn btn-outline-dark" href="olahraga.php" role="button">Olahraga</a><br><br>
                        <a class="btn btn-outline-dark" href="politik.php" role="button">Politik</a><br><br>
                        <a class="btn btn-outline-dark" href="teknologi.php" role="button">Teknologi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p>Copyright 2020 | by <a href="https://fasilkom-ti.usu.ac.id/">Kelompok 4</a>.</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>