<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iNews - Ubah Berita</title>
    <script src="https://cdn.tiny.cloud/1/tcfgt8jyxqtrkjvvbnwgo07dqm1kr8p67sm52l0bf4av53ml/tinymce/5/tinymce.min.js"></script>
	<script type="text/javascript" src="jquery/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="bootstrap/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap-4.5.3-dist/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link rel="stylesheet" href="mainstyle.css">
</head>
<body>

<?php  
include 'includes/assets.php';
include 'includes/koneksi.php';

$nomor=$_POST['nomor'];
$query = "SELECT * FROM berita WHERE nomor=$nomor";
$result = mysqli_query($koneksi, $query);

foreach ($result as $data) {
?>


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
            <div class="row">
                <div class="col-sm-12">
                    <br><br>
                    <h2 class="judul">Ubah Berita</h2>
                    <hr>
                </div>
            </div>

        <div class="container">
            <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <div id="input">
                            <form method="post">
                                <div class="form-group">
                                <input type="text" name="nomor" hidden value="<?php echo $data['nomor']; ?>"><br><br>
                                    <center><label><h6>Judul : </h6></label></center>
                                    <input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>">
                                </div>
                                <div class="form-group">
                                    <center><label><h6>Kategori : </h6></label>
                                    <input type="text" class="form-control" name="kategori" value="<?php echo $data['kategori']; ?>">
                                </div>
                                <div class="form-group">
                                    <center><label><h6>Isi : </h6></label></center>
                                    <textarea id="isi" name="isi" class="form-control" value="<?php echo $data['isi']; ?>"></textarea>
                                </div>
                                <div class="form-group">
                                    <center><label for="isi"><h6>Tanggal : </h6></label></center>
                                    <input type="date" class="form-control" name="tanggal" value="<?php echo $data['tanggal']; ?>">
                                </div>
                                <div class="form-group">
                                    <center><label><h6>Penulis : </h6></label></center>
                                    <input type="name" class="form-control" name="penulis" value="<?php echo $data['penulis']; ?>">
                                </div>
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit" class="btn btn-primary" name="ubah">Ubah</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="admin.php" class="btn btn-secondary">Batal</a></center>
                                    <br><br>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </section>

    <?php 
}
?>

<script type="text/javascript">
tinymce.init({
selector: '#isi',
height: 400,
file_browser_callback_types: 'file image media',
file_picker_types: 'file iamge media',
forced_root_block: "",
force_br_newlines: true,
force_p_newlines: false,
plugins:[
'autolink lists link image charmap print preview hr anchor pagebreak',
'searchreplace wordcount visualblocks visualchars code fullscreen',
'insertdatetime media nonbreaking save table contextmenu directionality',
'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
],
toolbar1:
'undo redo | insert | styleselect table | bold italic | hr alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
toolbar2:
'print preview | forecolor backcolor emoticons | fontselect | fontsizeselect | codesample code fullscreen',
templates:[          
{ title: 'Test template 1', content: '' },          
{ title: 'Test template 2', content: '' }        
],
content_css:[
'//fonts//googleapis.com/css?family=Lato:300,300i,400,400i',
'//www.tinymce.com/css/codepen.min.css'
],

images_upload_handler: function(blobInfo, success, failure)
{
	var xhr, formData;

	xhr = new XMLHttpRequest();
	xhr.withCredentials = false;
	xhr.open('POST','upload.php');

	xhr.onload = function(){
		var json;

		if(xhr.status != 200){
			failure('HTTP Error: ' + xhr.status);
			return;
		}

		console.log(xhr.response);
		success(xhr.response);
	};
	
	formData = new FormData();
	formData.append('file',blobInfo.blob(),blobInfo.filename());
	xhr.send(formData);
}

});
</script>

<?php  
if (isset($_POST['ubah'])) {
	$judul 		= $_POST['judul'];
	$kategori 	= $_POST['kategori'];
	$isi 		= $_POST['isi'];
	$tanggal 	= $_POST['tanggal'];
	$penulis	= $_POST['penulis'];

	if (!empty($judul)){
		$sql = "UPDATE berita SET judul='$judul', kategori='$kategori', isi='$isi', tanggal='$tanggal', penulis='$penulis' WHERE nomor=$nomor";
		mysqli_query($koneksi,$sql);
		echo "<script>alert('Perubahan Berita Berhasil Disimpan');window.location='kelolaberita.php'</script>";
	} 
	elseif ($koneksi->connect_error) {
		echo "<script>alert('Terjadi kesalahan: '$error);window.location='kelolaberita.php'</script>";
	}
}
?>

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