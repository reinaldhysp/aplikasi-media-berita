<?php  
include 'includes/assets.php';
include 'includes/koneksi.php';

$nomor=$_POST['nomor'];
$query = "SELECT * FROM akun WHERE nomor=$nomor";
$result = mysqli_query($koneksi, $query);

foreach ($result as $data) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iNews - Ubah Akun</title>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#ubahakun').validate({
			rules:{
				username:{
					minlength:8,
					maxlength:20
				},
				password:{
					minlength:8,
					maxlength:20
				},
				email:{
					email:true
				}
			},
			messages:{
				username:{
					required:"Username tidak boleh kosong.",
					minlength:"Username minimal terdiri dari 8 karakter.",
					maxlength:"Username maksimal terdiri dari 20 karakter."
				},
				password:{
					required:"Password tidak boleh kosong.",
					minlength:"Password minimal terdiri dari 8 karakter.",
					maxlength:"Password maksimal terdiri dari 20 karakter."
				},
				email:{
					required:"Email tidak boleh kosong.",
					email:"Format email tidak sesuai."
				}
			}
		});
	});
	</script>
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
						<br><a href="kelolaakun.php" class="btn btn-outline-dark">Kembali</a>
						</form>
					</div>
				</div>
			</div>
	</nav>

	<br><br>
	<div class="regis">
    <table style="width:75%" border="0" align="center">
        <tr>
            <td colspan="2">
            <center>
                <h2>Ubah Akun</h2><hr><br>
                <img src="https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_account_circle_48px-512.png" style="width:200px;height:210px">
            </center>
        </tr>
	</table>
	</div><br><br>
    <form method="POST" id="ubahakun">
        <center>
        <fieldset class="field1">
            <legend class="legend1"><center><b style="font-size: 22px">Akun</b></center></legend>
				<td><input type="text" name="nomor" hidden value="<?php echo $data['nomor']; ?>"></td>
                <label for="name">Nama Lengkap :</label><br>
                <input type="text" name="nama" required value="<?php echo $data['nama']; ?>"><br><br>
                <label for="lahir">Tanggal Lahir :</label><br>
                <input type="date" name="lahir" required value="<?php echo $data['lahir']; ?>"><br><br>
                <label for="email">Email :</label><br>
                <input type="email" name="email" required value="<?php echo $data['email']; ?>"><br><br>
                <label for="username">Username :</label><br>
                <input type="text" name="username" required value="<?php echo $data['username']; ?>"><br><br>
                <label for="password">Password :</label><br>
                <input type="password" name="password" required value="<?php echo $data['password']; ?>"><br><br>
                <label for="password2">Konfirmasi Password :</label><br>
                <input type="password" name="password2" required><br><br>
        </fieldset><br><br><br>
        
        <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="admin.php"><button type="button" class="btn btn-secondary">Batal</button></a>
    </center>  
    </form>

	<?php 
}
?>
	<br><br>

<?php  
if (isset($_POST['ubah'])) {

$level		= 3;
$username	= $_POST['username']; 
$password	= md5($_POST['password']);
$password2	= md5($_POST['password2']);
$nama		= $_POST['nama']; 
$email		= $_POST['email'];
$lahir		= $_POST['lahir']; 

$cek	= "SELECT * FROM akun WHERE username = '{$username}' ";
$perintah  = mysqli_query($koneksi, $cek);
$count  = mysqli_num_rows($perintah);

if($count != 0 && $username != $_POST['username']) {
	echo "<script>alert('Username sudah digunakan.');history.back(self);</script>";
	
}
elseif($password != $password2) {
	echo "<script>alert('Konfirmasi password tidak sesuai.');history.back(self);</script>";
} 
else {	

	if ($koneksi){
		$sql = "UPDATE akun SET level='$level', username='$username', password='$password', nama='$nama', email='$email', lahir='$lahir' WHERE nomor=$nomor";
		mysqli_query($koneksi,$sql);
		echo "<script>alert('Perubahan Akun Berhasil Disimpan');window.location='kelolaakun.php'</script>";
	} 
	elseif ($koneksi->connect_error) {
		echo "<script>alert('Terjadi kesalahan: '$error);window.location='kelolaakun.php'</script>";
	}
}
$koneksi->close();
}

?>

    <br><br><br><br><br>

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