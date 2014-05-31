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
							<label class="control-label">Paket Premium</label>
							<div class="controls">
							  <select class="span7" name="paket">
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
							  
							  <button type="submit" class="btn btn-primary" name='daftar'>Daftar</button> <button type="reset" class="btn">Batal</button>
							</div>
						  </div>
						</form>
	</div>
	
	<?php 
		if(isset($_POST['daftar'])){
			$nm = htmlentities(trim($_POST['nama']));
			$username = htmlentities(trim($_POST['username']));
			$pass = htmlentities(md5($_POST['password']));
			$telp = htmlentities(trim($_POST['telp']));
			$paket = htmlentities($_POST['paket']);
			$mask = htmlentities(trim($_POST['namemasking']));
						
			$sql = mysql_query("INSERT users (nama,username,password,nama_masking,telp,paket,status) VALUES ('$nm','$username','$pass',
			'$mask','$telp','$paket',0)");
			echo 'sukses disimpan';
		}
	
	?>