<?php
include "../inc/conn.php"; //untuk koneksi db
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { //halaman ini harus dipanggil melalui post
	  $id = $_POST["id"];
	  $jenis = $_POST["jenis"];
	  $ket = $_POST["ket"];
	  $act = $_POST["act"];
	  
	  
	  switch($act){
		  //tambah data
		  case "insert": $sql="INSERT INTO paket(id_paket,nama_paket,keterangan)VALUES('".$id."','".$jenis."','".$ket."')";break;
		  //edit data
		  case "edit":$sql="UPDATE paket SET nama_paket= '".$jenis."',keterangan '".$ket."' WHERE id_paket ='".$id."'";break;
		  //hapus data
		  case "delete":
		    $sql="DELETE FROM paket WHERE id_paket = '".$id."'";
		    break;
	  }
	  //eksekusi sql
	  $kueri = mysql_query($sql);
	  
	  //tampilkan hasil
	  if($kueri){
		  echo "success";
	  }else{
		  echo "gagal simpan data";
	  }
  }else{
	  echo "This link can't run directly.";
  }
?>