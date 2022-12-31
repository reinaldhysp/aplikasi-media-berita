<?php 
include 'includes/koneksi.php'; 
include 'includes/assets.php';

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
                    <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="kategori.php">Kategori</a>
                    <a class="nav-link" href="about.php">About</a>
                    <a class="nav-link" data-toggle="modal" data-target="#masuk">Login</a>
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