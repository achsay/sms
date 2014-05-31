<?php 
	include "../inc/conn.php";
	session_start();
	if(isset($_SESSION['user'])){
?>
<br>
<br>
<div>
	<h4> Pengguna</h4>
	<table class="table table-striped">
		<tr>
			<td>No</td>
			<td>Nama</td>
			<td>No Telp</td>
			<td>Masking</td>
			<td>Paketan</td>
		</tr>
		<?php
			$q = mysql_query("SELECT * FROM users");
			while($data = mysql_fetch_array($q)){
				echo "<tr><td>".$data[id_user]."</td> <td>".$data[nama]."</td> <td>".$data[telp]."</td> <td>".$data[nama_masking]."</td><td>".$data[paket]."</td></tr>";
			}
		?>
	
	</table>
</div>
<?php 
}else{
	header('Location:index.php');
} 
?>