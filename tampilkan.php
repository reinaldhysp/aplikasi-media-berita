

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iNews - Tampilkan Berita</title>
    <link rel="stylesheet" href="bootstrap/bootstrap-4.5.3-dist/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link rel="stylesheet" href="mainstyle.css">
    <script type="text/javascript" src="bootstrap/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.5.1.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="fontnews"><b style="color: #e60000;">i</b>News</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
					<form method="post">
					<br><a href="kelolaberita.php" class="btn btn-outline-dark">Kembali</a>
					</form>
                </div>
            </div>
        </div>
    </nav>

    <section class="sect2" id="sect2">
        <div class="container">
        <?php

		include 'includes/koneksi.php'; 
		include 'includes/assets.php';

        $nomor=$_POST['nomor'];
        $query = "SELECT * FROM berita WHERE nomor=$nomor";
        $hasil = mysqli_query($koneksi, $query);

        foreach($hasil as $data)
        {
            echo "<br><p><h2>$data[judul]</h2></p>";
            echo "<p><center>Diposting oleh : $data[penulis], Tanggal : $data[tanggal], Kategori : $data[kategori]</center></p>";
            echo "<p>$data[isi]</p>";
            echo "<br>";
        }

    ?>
        </div>
    </section>

    <br><br><br><br><br><br><br><br>
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