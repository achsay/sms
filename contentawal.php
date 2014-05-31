<?php
//include "inc/inc.koneksi.php";
$mod = $_GET['module'];

if($mod == 'paket'){
	include "modul/infopaket/infopaket.php";	
}

elseif($mod == 'reguler'){
	include "modul/daftar/reguler.php";	
}
elseif($mod == 'premium'){
	include "modul/daftar/premium.php";	
}

else{
  include "modul/awalan/awal.php";
}
?>