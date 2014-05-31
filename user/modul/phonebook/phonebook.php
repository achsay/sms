<script src="modul/phonebook/jquery-1.11.1.js"></script>
<style>
.headersub{
  background-color:#8B4513;
  
  color:white;
  padding:2px;
}
.headersub h4{
  padding-left:15px;
}

.submenu{
 margin-top:15px;
}

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
.content ul{
	margin-left:45px;
}

.submenu ul li{
 padding:5px;
 border-bottom:1px #DCDCDC dashed; 

}

.submenuul li a:hover{
	margin-left:2px;
}

.submenu ul li a{ 
	color:#8B4513;
	cursor:pointer;
}


</style>

<div>
	<div class="span3">
		<div class="headersub"><h4>Sub Menu</h4></div>
		<div class="submenu">
			<ul class="nav nav-list" >
				<li><a class="tampil">Tampilkan Semua phonebook</a></li>
				<li><a class="tambah">Tambah Phonebook</a></li>
				<li><a href="#">Import Phonebook(from excel)</a></li>
				<li><a href="#">Hapus Semua Phonebook</a></li>
				<li><a href="#">Export Phonebook(to excel)</a></li>
				<li><a href="#">Logout</a></li>
			</ul>
		</div>
		<img src="../image/sms.jpg">
	</div>
	<div class="span8" >
		<div class="headerhome"><h4>Phonebook</h4></div>
		<div class="content">
			<div id="tampil">
				<?php include"tampil.php"; ?>
			</div>
			
			<div id="tambah">
				<?php include"tambah.php"; ?>
			</div>
		</div>
	</div>
	
</div>

<script>
	$("#tampil").show();
	$("#tambah").hide();
	
	$(".tampil").click(function() {
	 $("#tampil").show();     // TAMPILKAN ELEMENT DENGAN ID "TAMPIL"
	 $("#tambah").hide();   // SEMBUNYIKAN ELEMENT DENGAN ID "TAMBAH"
	 
	});
	
	$(".tambah").click(function() {
	 $("#tambah").show();     
	 $("#tampil").hide();   
	 
	});

</script>