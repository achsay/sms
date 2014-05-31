<?php
//include "inc/inc.koneksi.php";
$mod = $_GET['hal'];
if ($mod=='user'){
	include "user.php";	
}
elseif($mod == 'aktivasi'){
	include "aktiv.php";	
}

elseif($mod == 'profile'){
	include "profile.php";	
}
elseif($mod == 'paket'){
	include "paket.php";	
}
else{
  include "welcome.php";
}
?>