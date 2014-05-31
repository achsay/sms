<?php include "inc/conn.php"; ?>


	<div  style="border:1px #DCDCDC dashed;">
	<h3 align="">Form Pendaftaran<h3>
			<form class="form-horizontal" action="" method="POST" name='daftar'>
						  <div class="control-group">
							<label class="control-label">Nama Lengkap</label>
							<div class="controls">
							  <input type="text" placeholder="nama lengkap" name="nama">
							</div>
						  </div>
						  <div class="control-group">
							<label class="control-label">Username</label>
							<div class="controls">
							  <input type="text" placeholder="username" name="username">
							</div>
						  </div>
						  
						  <div class="control-group">
							<label class="control-label" for="inputPassword">Password</label>
							<div class="controls">
							  <input type="password" id="inputPassword" placeholder="Password" name="password">
							</div>
						  </div>
						  
						 
						  <div class="control-group">
							<label class="control-label">No. Telepon</label>
							<div class="controls">
							  <input type="text" placeholder="No. Telepon" name="telp">
							</div>
						  </div>
						  
						<div class="control-group">
							<label class="control-label">Pilih Paket</label>
							<div class="controls">
							  <select class="span7" name="paket" onChange='dis_able()'>
								<option>Pilih Paket</option>
								<?php 
									$q = mysql_query("select distinct(nama_paket) from paket");
									while($data = mysql_fetch_array($q)){
										echo"<option  value='$data[nama_paket]'>$data[nama_paket]</option>";
									}
								?>
							  </select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Paket Reguler</label>
							<div class="controls">
							  <select class="span7" name="reguler">
								<option>Pilih Reguler</option>
								<?php 
									$q = mysql_query("select keterangan from paket where nama_paket = 'reguler'");
									while($data = mysql_fetch_array($q)){
										echo"<option  value='$data[keterangan]'>$data[keterangan]</option>";
									}
								?>
							  </select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Paket Premium</label>
							<div class="controls">
							  <select class="span7" name="prem">
								<option>Pilih Premium</option>
								<?php 
									$q = mysql_query("select keterangan from paket where nama_paket = 'premium'");
									while($data = mysql_fetch_array($q)){
										echo"<option  value='$data[keterangan]'>$data[keterangan]</option>";
									}
								?>
							  </select>
							</div>
						</div>
						  			  
						  
						   <div class="control-group" >
							<label class="control-label">Nama Yang Dimasking</label>
							<div class="controls" >
							  <input type="text" placeholder="Nama Masking" name="namemasking" >
							</div>
						  </div>
						  
						  
						  <div class="control-group">
							<div class="controls">
							  
							  <button type="submit" class="btn btn-primary">Daftar</button> <button type="reset" class="btn">Batal</button>
							</div>
						  </div>
						</form>
	</div>
<script language="javascript">
function dis_able()
{
	if(document.daftar.paket.value != 'premium')
		document.daftar.namemasking.disabled=1;
		
	else
		document.daftar.namemasking.disabled=0;
}
</script>