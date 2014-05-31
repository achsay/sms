<?php
	session_start();
	if(isset($_SESSION['username'])){
	
?>
<script src="modul/group/jquery-1.11.1.js"></script>
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
  margin-top:15px;}
  
  ul li {
	cursor:pointer;
  }
  
  
</style>

<div >
	<div class="span3">
		<div class="headersub"><h4>Sub Menu</h4></div>
		<div class="submenu" >
			<ul class="nav nav-list" >
				<li><a class="tampil">Tampil Group</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		<img src="../image/sms.jpg">
	</div>
	<div class="span8" >
		<div class="headerhome"><h4>Atur Group Phonebook</h4></div>
		<div class="content" >
		
			<div id="tampil">
				<?php include "tampilgroup.php"; ?>
			</div>
			
		</div>
		
		
	</div>
	
</div>
<script>
	$("#tampil").show();
	
	$(".tampil").click(function() {
	 $("#tampil").show();     // TAMPILKAN ELEMENT DENGAN ID "HOME"
	 // SEMBUNYIKAN ELEMENT DENGAN ID "PROFIL"
	 
	});
	

</script>

<?php 
}else{
	header('Location:../');
}

?>
