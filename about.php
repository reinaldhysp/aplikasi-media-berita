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
    <title>iNews - About</title>
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
    
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <br><br>
			<h1 class="display-4">Kelompok 4 TI USU 2020</h1><br>
			<p class="text">Anggota :</p><br>
			<center>
				<table>
					<tr>
						<td>
							<p class="text"><a class="ig" href="https://www.instagram.com/bobbymanik__/">Bobby Adithya Manik</a></p>
						</td>
						<td>
							<p class="text">&nbsp;&nbsp;&nbsp;201402034</p>
						</td>
					</tr>
					<tr>
						<td>
							<p class="text"><a class="ig" href="https://www.instagram.com/reinaldhysp/">Reinaldhy Suzeta Purba</a></p>
						</td>
						<td>
							<p class="text">&nbsp;&nbsp;&nbsp;201402064</p>
						</td>
					</tr>
					<tr>
						<td>
							<p class="text"><a class="ig" href="https://www.instagram.com/riskisaragih12/">Riski Hartanto Saragih</a></p>
						</td>
						<td>
							<p class="text">&nbsp;&nbsp;&nbsp;201402112</p>
						</td>
					</tr>
					<tr>
						<td>
							<p class="text"><a class="ig" href="https://www.instagram.com/ruthdamay/">Ruth Damayanthy Purba</a></p>
						</td>
						<td>
							<p class="text">&nbsp;&nbsp;&nbsp;201402028</p>
						</td>
					</tr>
					<tr>
						<td>
							<p class="text"><a class="ig" href="https://www.instagram.com/vanissya/">Vanissya Arbashika Putri</a></p>
						</td>
						<td>
							<p class="text">&nbsp;&nbsp;&nbsp;201402103</p>
						</td>
					</tr>
				</table>
			</center>
        </div>
	</div>
	<br>

    <br><br><br><br><br>
    <section class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="isi">About</h2>
                    <hr>
                </div>
            </div>
        
            <div class="row">
                <div class="col-sm-5 offset-sm-1">
                    <br><p>Hello World, Kami dari Kelompok 4A TI USU 2020 ingin membagikan hasil project tugas besar kami kepada teman teman sekalian. Website ini kami beri nama iNews. iNews merupakan sebuah portal berita yang menyajikan berbagai jenis berita, yang dikemas secara menarik dan pastinya terpercaya. Di dalam portal berita ini, kami menggunakan beberapa fitur seperti login & registrasi, validasi form, hashing password, level user, pagination dan masih banyak lagi.</p>
                </div>
                <div class="col-sm-5">
                    <br><p>Dengan adanya portal ini, kami berharap teman - teman sekalian dapat menggunakannya sebagai sarana untuk membagikan dan mendapatkan informasi terbaru. Kami juga berharap portal ini mampu meningkatkan minat membaca di kalangan muda. Tentu saja masih banyak kekurangan di dalam portal ini, kami harap teman-teman sekalian dapat memberikan saran dan masukan demi perkembangan portal ini kedepannya. Terimakasih telah mengunjungi iNews. 😁🙏</p>
				</div>
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