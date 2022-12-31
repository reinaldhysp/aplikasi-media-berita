<?php 
include 'includes/koneksi.php'; 
include 'includes/assets.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iNews - Semua Berita</title>
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
					<form method="post">
					<br><button type="submit" name="kembali" class="btn btn-outline-dark">Kembali</button>
					</form>
                </div>
            </div>
        </div>
    </nav>

    <section class="sect2" id="sect2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br><br>
                    <h2 class="isi">Semua Berita</h2>
                    <hr>
                </div>
            </div>

   
    <div>
        <?php
            if(isset($_GET['semua'])){

            if (isset($_GET['semua']) && $_GET['semua']!="") {	
                $halaman = $_GET['semua'];}
            else{	
                $halaman = 1;}

            $limit = 2;
            if($halaman>1){
                $offset = ($halaman * $limit) - $limit;}
            else {
                $offset = 0;}

            $query2 = "SELECT * FROM berita LIMIT $offset, $limit";
            $hasil2 = mysqli_query($koneksi, $query2);
            
            foreach($hasil2 as $data) {

                echo "<br><p><h2>$data[judul]</h2></p>";
                echo "<p><center>Diposting oleh : $data[penulis], Tanggal : $data[tanggal], Kategori : $data[kategori]</center></p>";
                echo "<p>$data[isi]</p>";
                echo "<br><hr>";
            }

            echo "<center><br><h6>Halaman ke-".$halaman." || ";

            $query 		= mysqli_query($koneksi, "SELECT * FROM berita");
            $jlh_data 	= mysqli_num_rows($query);
            echo "Jumlah data : $jlh_data || ";

            $jlh_halaman 	= ceil($jlh_data / $limit);
            $hal_akhir 		= $jlh_halaman;
            echo "Jumlah halaman : $jlh_halaman </h6><br></center><br>";
        }
        ?>
    </div>

   
        <?php
            if (isset($_POST['kembali']))
            {
                if($_SESSION['level'] == 2){
                    header("Location: admin.php");
                }
                elseif($_SESSION['level'] == 3){
                    header("Location: user.php");
                }
                else{
                    header("Location: index.php");
                }
            }  


            if(isset($_GET['semua']))
            {
                $limit = 2;
                $query 		= mysqli_query($koneksi, "SELECT * FROM berita");
                $jlh_data 	= mysqli_num_rows($query);
                $jlh_halaman 	= ceil($jlh_data / $limit);
                echo "<center>";
                for($i=1;$i<=$jlh_halaman;$i++)
                {
                    echo "<a href=?semua=".$i.">";
                    echo $i." || ";
                    echo "</a>";
                }
                echo "</center>";
            }
        ?>

        </div>

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