<?php  
include 'includes/koneksi.php';
include 'includes/assets.php';
?>	

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iNews - Kelola Akun</title>
	<script type="text/javascript" src="jquery/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="bootstrap/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap-4.5.3-dist/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link rel="stylesheet" href="mainstyle.css">
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
                    <h2 class="judul">Kelola Akun</h2>
                    <hr>
                </div>
            </div>

        <div class="container">
            <div class="row">
                    <div class="col-sm-7"><br><br>
                        <?php  
                            $query = "SELECT * FROM akun";
                            $hasil = mysqli_query($koneksi, $query);
                            $num_char = 100;

                            echo "<table class='table table-bordered'>";
                            echo "<tr><th><center>Nomor</th><th><center>Level</th><th><center>Username</th><th><center>Password</th><th><center>Nama</th><th><center>Email</th><th><center>Lahir</th><th colspan='2'><center>Pilihan</th></tr>";

                            foreach ($hasil as $data) 
                            {
                                echo "<tr><td><center>".$data['nomor']."</td><td><center>".$data['level']."</td><td>".$data['username']."</td><td>".$data['password']."</td><td>".$data['nama']."</td><td>".$data['email']."</td><td>".$data['lahir']."</td>";
                                echo "<td><form method='post' action='ubahakun.php'><input hidden type='text' name='nomor' value=".$data['nomor']."><button type='submit' name='btnUpdate' class='btn btn-info'>Ubah</button></form></td>";
                                echo "<td><form onsubmit=\"return confirm('Anda yakin mau menghapus data?');\" method='post'><input hidden type='text' name='nomor' value=".$data['nomor']."><button type='submit' name='btnHapus' class='btn btn-danger'>Hapus</button></form></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            ?>

                            <?php
                            if(isset($_POST['btnHapus'])){

                            $nomor=$_POST['nomor'];

                            if ($koneksi){
                                $sql = "DELETE FROM akun WHERE nomor = $nomor";
                                mysqli_query($koneksi,$sql);
                                echo "<script>alert('Data akun berhasil dihapus.');history.back(self);</script>";
                            } elseif ($koneksi->connect_error){
                                echo "<script>alert('Berita gagal dihapus. Terjadi kesalahan: ". $koneksi->connect_error."');history.back(self);</script>";
                            }
                            }          
                        ?>
                    </div>
                </div>
            </div>
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