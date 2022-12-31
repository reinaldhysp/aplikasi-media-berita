<?php  
include 'includes/koneksi.php';
include 'includes/assets.php';
?>	

<?php  
if (isset($_POST['penilaian'])) {

$username 	= $_POST['username'];
$nilai 		= $_POST['nilai'];
$kritik 	= $_POST['kritik'];
$saran 		= $_POST['saran'];
$waktu 		= $_POST['waktu'];

$cek	= "SELECT * FROM penilaian WHERE username = '{$username}' ";
$perintah  = mysqli_query($koneksi, $cek);
$count  = mysqli_num_rows($perintah);

if($count != 0) {
	echo "<script>alert('Username sudah melakukan penilaian.');window.location='admin.php'</script>";
}
else {		
	$sql = "INSERT INTO penilaian (username, nilai, kritik, saran, waktu) VALUES ('$username', '$nilai', '$kritik', '$saran', '$waktu')";
	$perintah2  = mysqli_query($koneksi, $sql);

	if($koneksi->query($sql)===TRUE){
		echo "<script>alert('Penilaian berhasil dilakukan.');window.location='admin.php'</script>";
	} else{
		echo "<script>alert('Terjadi kesalahan : ".$sql."<br>".$koneksi->error."<br>');history.back(self);</script>";
	}
}
$koneksi->close();

}
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
    <title>iNews - Form Penilaian</title>
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
                    <h2 class="judul">Form Penilaian</h2>
                    <hr>
                </div>
            </div>

        <div class="container">
            <div class="row">
                    <div class="col-sm-8 offset-2">
                        <div id="form">
                            <form method="post">
                                <div id="form2">
                                    <div class="form-group"><br><br>
                                        <center><label>Username : </label></center>
                                        <input type="text" name="username" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <center><label>Nilai : </label></center>
                                        <select name="nilai" class="form-control" required>
                                            <option>A >= 80</option>
                                            <option>75 <= B+ < 80 </option>
                                            <option>70 <= B < 75</option>
                                            <option>65 <= C+ < 70</option>
                                            <option>60 <= C < 65</option>
                                            <option>50 <= D < 60</option>
                                            <option>E < 50</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <center><label>Kritik : </label></center>
                                        <textarea name="kritik" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <center><label>Saran : </label></center>
                                        <textarea name="saran" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <center><label>Waktu Penilaian : </label></center>
                                        <input type="date" name="waktu" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <center>
                                        <button type="submit" name="penilaian" class="btn btn-primary">Kirim</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="admin.php" class="btn btn-secondary">Batal</a></center>
                                        <br><label>&nbsp;</label>
                                    </div>
                                </div>
                            </form>
                        </div>
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