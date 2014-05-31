<?php

$mod = $_GET['module'];

if ($mod=='group'){
    include "modul/group/group.php";
}
elseif ($mod=='phonebook'){
    include "modul/phonebook/phonebook.php";
}
elseif ($mod=='instantsms'){
    include "modul/instantsms/instantsms.php";
}
elseif ($mod=='deposit'){
    include "modul/deposit/deposit.php";
}
else{
  include "welcome.php";
}
?>