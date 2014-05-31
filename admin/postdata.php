<?php
include "../inc/conn.php"; //untuk koneksi db
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { //halaman ini harus dipanggil melalui post
	  $id = $_POST["id"];
	  $user = htmlentities(trim($_POST["user"]));
	  $pass = htmlentities(md5($_POST["pass"]));
	  $nama = $_POST["nama"];
	  $telp = $_POST["telp"];
	  $act = $_POST["act"];
	  
	  
	  switch($act){
		  //tambah data
		  //case "insert": $sql="INSERT INTO karyawan(nip,nama)VALUES('".$nip."','".$nama."')";break;
		  //edit data
		  case "edit":$sql="UPDATE admin SET user= '".$user."',password= '".$pass."',nama= '".$nama."', telp= '".$telp."' WHERE id_admin ='".$id."'";break;
		  //hapus data
		  /*case "delete":
		    $sql="DELETE FROM karyawan WHERE nip = '".$nip."'";
		    break;*/
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