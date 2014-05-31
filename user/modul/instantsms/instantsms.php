<script src="modul/instantsms/jquery-1.11.1.js"></script>
<script type="text/javascript">
		
	$(document).ready(function(){
		$('#sms').click(function(){
			$('#tampung').load('modul/instantsms/tulis.php');
		});
		$('#inbox').click(function(){
			$('#tampung').load('modul/instantsms/inbox.php');
		});
		
		$('#outbox').click(function(){
			$('#tampung').load('modul/instantsms/keluar.php');
		});
		$('#deliver').click(function(){
			$('#tampung').load('modul/instantsms/terkirim.php');
		});
		
		$('#bgroup').click(function(){
			$('#tampung').load('modul/instantsms/brodgroup.php');
		});
	
	});
</script>

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

#tampung{
  margin-top:15px;
  
}


.submenu ul li{
 padding:5px;
 border-bottom:1px #DCDCDC dashed; 
 cursor:pointer;
 
}

.submenu ul li a:hover{
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
		<div class="submenu" >
			<ul class="nav nav-list" >
				<li><a id="sms" >Tulis Pesan</a></li>
				<li><a id="inbox" >Pesan Masuk</a></li>
				<li><a id="outbox" >Pesan Keluar</a></li>
				<li><a id="deliver" >Pesan Terkirim</a></li>
				
			</ul>
		</div>
		<br>
		<div class="headersub"><h4>Broadcast</h4></div>
		<div class="submenu" >
			<ul class="nav nav-list" >
				<li><a id="bgroup" >Berdasar Group</a></li>
				<li><a id="" >Berdasar import (.xls)</a></li>
				<li><a id="" >Berdasar import (.csv)</a></li>
				<li><a id="" >logout</a></li>
				
			</ul>
		</div>
		
		<img src="../image/sms.jpg">
	</div>
	<div class="span8" >
		<div class="headerhome"><h4>sms</h4></div>
		<div id="tampung">
			<?php include"tulis.php";?>
			
			<?php 
			/*	$hal = $_GET['hal'];
				if($hal=='sms'){
					include "tulis.php";
				}elseif($hal='inbox'){
					include "inbox.php";
				}*/
			?>
		</div>
	</div>
	
</div>

