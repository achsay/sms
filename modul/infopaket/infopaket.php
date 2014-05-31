<?php include "inc/conn.php"; ?>
<style>
.headerhome{
	background-color:#8B4513;
	color:white;
	padding:2px;
}

.headerhome h4{
	padding-left:15px;
}


.content{
  margin-top:15px;
  
}

</style>

	<div>
		<div class="headerhome"><h4>Daftar Paket SMS</h4></div>
		<div class="content">
		<table class='table '>
		<tr style='background:#8B4513; color:white; '><th>Jenis</th><th>Keterangan</th></tr>
			<?php 
				$q = mysql_query("SELECT * FROM PAKET where nama_paket='premium'");
				while($d = mysql_fetch_array($q)){
					echo"
						<tr><th> $d[nama_paket] </th> <td> $d[keterangan] </td></tr>";
				}
			?>
			</table>
			<a href='?module=premium'><button class='btn btn-primary'>Daftar</button></a>
			<br><br>
			<table class='table'>
			<tr style='background:#8B4513; color:white'><th>Jenis</th><th>Keterangan</th></tr>
			<?php 
				$query = mysql_query("SELECT * FROM PAKET where nama_paket = 'reguler' ");
				while($data = mysql_fetch_array($query)){
					echo"
						<tr><th> $data[nama_paket] </th> <td> $data[keterangan] </td></tr>";
				}
			?>
			</table>
			<a href='?module=reguler'><button class='btn btn-primary'>Daftar</button></a>
			
		</div>
			
	</div>

