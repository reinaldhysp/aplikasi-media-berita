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
    <title>iNews - Admin Area</title>
    <script type="text/javascript" src="jquery/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="bootstrap/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap-4.5.3-dist/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link rel="stylesheet" href="mainstyle.css">
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
                    <a class="nav-link" href="lihatberita.php">Lihat Berita</a>
                    <a class="nav-link" href="logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <br><br>
            <h1 class ="display-4" style="font-size: 55px;"><b style="color: #e60000;">i</b>News</h1>
            <h1 class="display-4">Admin Area</h1>
            <h1 class="display-4">Selamat datang <?php echo $_SESSION['nama'] ?></h1>
            <form method="get" action="semuaberita.php"><br>
			<button type="submit" name="semua" class="btn btn-outline-dark">Semua Berita</button><br><br>&nbsp;
            </form>
        </div>
    </div>
    

    <section class="sectionUser" id="sectionUser">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br><br>
                    <hr><br><br>
                    <h2 class="isi">Silahkan Pilih Menu pada Navigation Bar<br><br><br>
                    <hr>
                </div>
            </div>
    </section>

    <br><br>
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