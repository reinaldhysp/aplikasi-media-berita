<?php 
include 'includes/koneksi.php'; 
include 'includes/assets.php'; 
?>

<?php  
if (isset($_POST['tblmasuk'])) {
	$user_login = $_POST['username'];
	$pass_login = md5($_POST['password']);

	$sql    = "SELECT * FROM akun WHERE username = '{$user_login}' and password = '{$pass_login}' ";
	$query  = mysqli_query($koneksi, $sql);
	$count  = mysqli_num_rows($query);

	if(!$query){
		die("Query gagal " . mysqli_error($koneksi));
	}

	if(!empty($user_login) && (!empty($pass_login))){
		if($count==0){
		    echo "<script>alert('Username not found.');history.back(self);</script>";
		} 
		else {
		    while ($row = mysqli_fetch_array($query)){
		    $level = $row['level'];
		    $username = $row['username'];
		    $password = $row['password'];
		    $nama = $row['nama'];
		    $email = $row['email'];
		    $lahir = $row['lahir'];
		    }
		    if($user_login == $username && $pass_login == $password){
		    	if($level == 2){
			        header("Location:admin.php");
			        $_SESSION['level'] = $level;
			        $_SESSION['username'] = $username;
			        $_SESSION['password'] = $password;
			        $_SESSION['nama'] = $nama;
			        $_SESSION['email'] = $email;
			        $_SESSION['lahir'] = $lahir;
		    	} else {
		    		header("Location:user.php");
			        $_SESSION['level'] = $level;
			        $_SESSION['username'] = $username;
			        $_SESSION['password'] = $password;
			        $_SESSION['nama'] = $nama;
			        $_SESSION['email'] = $email;
			        $_SESSION['lahir'] = $lahir;
		    	}
		    } else {
				echo "<script>alert('Username tidak ditemukan.');history.back(self);</script>";
		    }
	    }
	}

		else {
			if(empty($user_login) || empty($pass_login)){
			echo "<script>alert('Username atau password tidak boleh kosong.');history.back(self);</script>";
			}
		}
	}

	if (isset($_POST['daftar'])) {

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

	if($count != 0) {
		echo "<script>alert('Username sudah digunakan.');history.back(self);</script>";
	}
	elseif($password != $password2) {
		echo "<script>alert('Konfirmasi password tidak sesuai.');history.back(self);</script>";
	} 
	else {		
		$sql = "INSERT INTO akun (level, username, password, nama, email, lahir) VALUES ('$level', '$username', '$password', '$nama', '$email', '$lahir')";
		$perintah2  = mysqli_query($koneksi, $sql);

		if($perintah2){
			echo "<script>alert('Registrasi Akun Anda Berhasil. Silahkan Login.');window.location='index.php'</script>";
		} else{
			echo "<script>alert('Terjadi kesalahan : ".$sql."<br>".$koneksi->error."<br>');window.location='kelolaakun.php'</script>";
		}
	}
	$koneksi->close();

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iNews - Registrasi Akun</title>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#daftarakun').validate({
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
            <a class="navbar-brand"><b style="color: #e60000;">i</b>News</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="kategori.php">Kategori</a>
                    <a class="nav-link" href="about.php">About</a>
                    <a class="nav-link" data-toggle="modal" data-target="#masuk">Login</a>
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
                <h2>Registrasi Akun</h2><hr><br>
                <img src="https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_account_circle_48px-512.png" style="width:200px;height:210px">
            </center>
        </tr>
	</table>
	</div><br><br>
    <form method="POST" id="daftarakun">
        <center>
        <fieldset class="field1">
            <legend class="legend1"><center><b style="font-size: 22px">Akun</b></center></legend>
                <label for="name">Nama Lengkap :</label><br>
                <input type="text" name="nama" required><br><br>
                <label for="lahir">Tanggal Lahir :</label><br>
                <input type="date" name="lahir" required><br><br>
                <label for="email">Email :</label><br>
                <input type="email" name="email" required><br><br>
                <label for="username">Username :</label><br>
                <input type="text" name="username" required><br><br>
                <label for="password">Password :</label><br>
                <input type="password" name="password" required><br><br>
                <label for="password2">Konfirmasi Password :</label><br>
                <input type="password" name="password2" required><br><br>
        </fieldset><br><br><br>
        
        <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="index.php"><button type="button" class="btn btn-secondary">Kembali</button></a>
    </center>  
    </form>

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

    <!-- Modal -->
	<div id="modalmasuk">
		<div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="masuk" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form method="post">
						<div class="modal-header">				
							<h4 class="modal-title">Masuk ke Akun Anda</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">				
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username">
							</div>
							<div class="form-group">
								<div class="clearfix">
									<label>Password</label>
								</div>
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						<div class="modal-footer">
							<p style="">Belum punya akun? Daftar <a href="daftar.php">disini!</a></p>
							<button type="submit" name="tblmasuk" class="btn btn-primary">Masuk</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>