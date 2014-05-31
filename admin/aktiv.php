<?php 
	include "../inc/conn.php";
	session_start();
	if(isset($_SESSION['user'])){
?>
<br>
<br>
<div>
<h4>
Aktivasi Pengguna
</h4>
	<table class="table table-striped">
		<tr>
			<td>Nama</td>
			<td>No Telp</td>
			<td>Masking</td>
			<td>Status</td>
		</tr>
		<?php
			$q = mysql_query("SELECT * FROM users");
			while($data = mysql_fetch_array($q)){
				echo "<tr><td>".$data[nama]."</td> <td>".$data[telp]."</td> <td>".$data[nama_masking]."</td><td>".$data[status]."</td></tr>";
			}
		?>
	
	</table>
</div>
<?php 
}else{
	header('Location:index.php');
} 
?>