<?php
include "inc/conn.php";
$query=mysql_query("select * from sentitems");
$jumlah=mysql_num_rows($query);
echo "Jumlah Pesan Keluar: ".$jumlah;
echo "<hr>";
?>
<?php
while($row=mysql_fetch_array($query))
{
 echo "Pesan ke-"; echo $c=$c+1; echo "<br>";
 echo "Tujuan           :$row[DestinationNumber]<br>";
 echo "Isi Pesan        :$row[TextDecoded]<br>";
 echo "Waktu Pengiriman :$row[SendingDateTime]<br>";
 echo "<hr>";
}
?>