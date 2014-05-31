<head><script src="modul/instantsms/jquery-1.11.1.js"></script>
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

ul li{
 padding:5px;
 border-bottom:1px #DCDCDC dashed; 
 cursor:pointer;
 color:#8B4513;
}
</style>
</head>
<body>
<div class="container">
	<div class="span3">
		<div class="headersub"><h4>Sub Menu</h4></div>
		<div class="submenu" >
			<ul class="nav nav-list" >
				<li><a class="sms" href="?module=instantsms&hal=sms">sms</a></li>
				<li><a class="inbox" href="?module=instantsms&hal=inbox">inbox</a></li>
				<li><a href="#">Logout</a></li>
			</ul>
		</div>
		<img src="image/sms.jpg">
	</div>
	<div class="span7" >
		<div class="headerhome"><h4>sms</h4></div>
		<div class="content" >
		<!--
			<div id="sms">
				<?php include "tulis.php"; ?>
			</div>
			
			<div id="inbox">
				testsdhdfhfdhdfahadhaha
			</div>
			-->
			
			<?php 
				$hal = $_GET['hal'];
				if($hal=='sms'){
					include "tulis.php";
				}elseif($hal='inbox'){
					include "inbox.php";
				}
			?>
		</div>
		
		
	</div>
	
</div>
<script>
	$("#sms").show();
	$("#inbox").hide();
	
	$(".sms").click(function() {
	 $("#sms").show();     // TAMPILKAN ELEMENT DENGAN ID "HOME"
	 $("#inbox").hide();   // SEMBUNYIKAN ELEMENT DENGAN ID "PROFIL"
	 
	});
	
	$(".inbox").click(function() {
	 $("#inbox").show();     // TAMPILKAN ELEMENT DENGAN ID "HOME"
	 $("#sms").hide();   // SEMBUNYIKAN ELEMENT DENGAN ID "PROFIL"
	 
	});

</script>
</body>