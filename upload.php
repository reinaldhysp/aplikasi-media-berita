<?php  
$ds = DIRECTORY_SEPARATOR;

$folder_gambar = 'upload';

if(!empty($_FILES))
{
	$tempFile = $_FILES['file']['tmp_name'];

	$targetPath = dirname(__FILE__).$ds.$folder_gambar.$ds;

	$file_name = substr(md5(rand(1,213213212)),1,5)."_".str_replace(array('\'','"', '', '`'), '_', $_FILES['file']['name']);

	$targetFile = $targetPath.$file_name;

	if(move_uploaded_file($tempFile, $targetFile)){
		die("http://localhost/tubes"."/".$folder_gambar."/".$file_name);
	} else{
		die("Fail");
	}
}

?>