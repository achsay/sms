<?php
include "inc/conn.php";
$no_hp=$_POST['no_hp'];
$pesan=$_POST['pesan'];
$query=mysql_query("INSERT INTO outbox (DestinationNumber, 
TextDecoded, CreatorID) VALUES ('$no_hp', '$pesan', 'Gammu')");
if($query){
echo "Pesan Berhasil dikirim";
?><a href="outbox.php">Lihat Pesan Keluar</a><?php
}else{
echo "Gagal input data";
echo mysql_error();
}
?>