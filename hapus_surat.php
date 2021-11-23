<?php
include("koneksi.php");
$id = $_GET['id'];
$sql = $koneksi->query("select * from arsip_surat where id ='$id'");
$data = $sql->fetch_assoc();
$pdf = $data['file_surat'];
if (file_exists("files/$pdf")){
	unlink("files/$pdf");
}
$sql = $koneksi->query("delete from arsip_surat where id = '$id'");

if ($sql) {
	
	header('Location:index.php');
	
}
?>