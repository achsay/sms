<?php
	include "../inc/conn.php"; //untuk koneksi db
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { //halaman ini harus dipanggil melalui post
	  $id = $_POST["id"];
	  $nama = $_POST["nama"];
	  $act = $_POST["act"];
	  
	  
	  switch($act){
		  //tambah data
		  case "insert": $sql="INSERT pbk_groups(name,id)VALUES('$nama','$id')";break;
		  //edit data
		  case "edit":$sql="UPDATE paket SET name = '".$nama."' WHERE id='".$id."'";break;
		  //hapus data
		  case "delete":
		    $sql="DELETE FROM paket WHERE id = '".$id."'";
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