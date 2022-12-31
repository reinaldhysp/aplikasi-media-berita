<?php
	include ("includes/koneksi.php");
	if(empty($_SESSION['nama']) || $_SESSION['level'] != 3){
		header("Location: error.php");
	}
	include 'includes/assets.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iNews - Berita Harian yang Menyajikan Informasi Tercepat dan Teraktual</title>
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
                    <a class="nav-link" href="ekonomi.php">Ekonomi</a>
                    <a class="nav-link" href="kesehatan.php">Kesehatan</a>
                    <a class="nav-link" href="olahraga.php">Olahraga</a>
                    <a class="nav-link" href="politik.php">Politik</a>
                    <a class="nav-link" href="teknologi.php">Teknologi</a>
                    <a class="nav-link" href="logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <br><br>
            <h1 class ="display-4" style="font-size: 55px;"><b style="color: #e60000;">i</b>News</h1>
            <h1 class="display-4">Selamat datang <?php echo $_SESSION['nama'] ?></h1><br>
            <p class="text">Berita Harian yang Menyajikan Informasi Tercepat dan Teraktual.</p>
            <form method="get" action="semuaberita.php"><br>
			<button type="submit" name="semua" class="btn btn-outline-dark">Semua Berita</button><br><br>&nbsp;
		    </form>
        </div>
    </div>

    <section class="sect1" id="sect1">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br><br>
                    <h2 class="isi">Berita Terkini
                    <hr>
                </div>
            </div>
    
    <br><br><br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div id="content">
                            <div class="container">
                                <div id="kesehatan" class="kategori">
                                    <a class="link" href="kesehatan.php"><h3>Kesehatan</h3></a><hr><br>
                                    <?php
                                    $limit = 3;
                                    $offset = 0;
                                    $query = "SELECT * FROM berita WHERE kategori='kesehatan' LIMIT $offset, $limit";
                                    $hasil = mysqli_query($koneksi, $query);

                                    foreach($hasil as $data)
                                    {
                                        echo "<table class='data'><tr><th><form method='post' action='tampilkan.php'><input hidden type='text' name='nomor' value=$data[nomor]><button class='btn btn-dark' type='submit' name='tampilkan'>$data[judul]</button></form></th></tr><tr><td><center>Diposting Oleh : $data[penulis]</td></tr><tr><td><center>Tanggal Diposting : $data[tanggal]</td></tr><tr><td>&nbsp;</td></tr></table>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div id="content">
                            <div class="container">
                                <div id="olahraga" class="kategori">
                                    <a class="link" href="olahraga.php"><h3>Olahraga</h3></a><hr><br>
                                    <?php
                                    $query = "SELECT * FROM berita WHERE kategori='olahraga' LIMIT $offset, $limit";
                                    $hasil = mysqli_query($koneksi, $query);

                                    foreach($hasil as $data)
                                    {
                                        echo "<table class='data'><tr><th><form method='post' action='tampilkan.php'><input hidden type='text' name='nomor' value=$data[nomor]><button class='btn btn-dark' type='submit' name='tampilkan'>$data[judul]</button></form></th></tr><tr><td><center>Diposting Oleh : $data[penulis]</td></tr><tr><td><center>Tanggal Diposting : $data[tanggal]</td></tr><tr><td>&nbsp;</td></tr></table>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div id="content">
                            <div class="container">
                                <div id="politik" class="kategori">
                                    <a class="link" href="politik.php"><h3>Politik</h3></a><hr><br>
                                    <?php
                                    $query = "SELECT * FROM berita WHERE kategori='politik' LIMIT $offset, $limit";
                                    $hasil = mysqli_query($koneksi, $query);

                                    foreach($hasil as $data)
                                    {
                                        echo "<table class='data'><tr><th><form method='post' action='tampilkan.php'><input hidden type='text' name='nomor' value=$data[nomor]><button class='btn btn-dark' type='submit' name='tampilkan'>$data[judul]</button></form></th></tr><tr><td><center>Diposting Oleh : $data[penulis]</td></tr><tr><td><center>Tanggal Diposting : $data[tanggal]</td></tr><tr><td>&nbsp;</td></tr></table>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br><br><br>
                <div class="row">
                    <div class="col-sm-4 offset-2">
                        <div id="content">
                            <div class="container">
                                <div id="teknologi" class="kategori">
                                    <a class="link" href="teknologi.php"><h3>Teknologi</h3></a><hr><br>
                                    <?php
                                    $query = "SELECT * FROM berita WHERE kategori='teknologi' LIMIT $offset, $limit";
                                    $hasil = mysqli_query($koneksi, $query);

                                    foreach($hasil as $data)
                                    {
                                        echo "<table class='data'><tr><th><form method='post' action='tampilkan.php'><input hidden type='text' name='nomor' value=$data[nomor]><button class='btn btn-dark' type='submit' name='tampilkan'>$data[judul]</button></form></th></tr><tr><td><center>Diposting Oleh : $data[penulis]</td></tr><tr><td><center>Tanggal Diposting : $data[tanggal]</td></tr><tr><td>&nbsp;</td></tr></table>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div id="content">
                            <div class="container">            
                                <div id="ekonomi" class="kategori">
                                    <a class="link" href="ekonomi.php"><h3>Ekonomi</h3></a><hr><br>
                                    <?php
                                    $query = "SELECT * FROM berita WHERE kategori='ekonomi' LIMIT $offset, $limit";
                                    $hasil = mysqli_query($koneksi, $query);

                                    foreach($hasil as $data)
                                    {
                                        echo "<table class='data'><tr><th><form method='post' action='tampilkan.php'><input hidden type='text' name='nomor' value=$data[nomor]><button class='btn btn-dark' type='submit' name='tampilkan'>$data[judul]</button></form></th></tr><tr><td><center>Diposting Oleh : $data[penulis]</td></tr><tr><td><center>Tanggal Diposting : $data[tanggal]</td></tr><tr><td>&nbsp;</td></tr></table>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br><br><br><br><br><br><br>
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