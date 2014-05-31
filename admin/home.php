<?php
session_start();
	if(isset($_SESSION['user'])){
?>
 
 <!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="UTF-8">
    <title>Halaman Utama</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
   	<link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet">
	
	<style>
		.header{
			margin-top:-10px;
			height: 65px;
			width: 100%;
			background: #222222 url(image/header.png) repeat-x;
		}
		#sidebar{
			background: #E0E0E3 url(image/sidebar.png) repeat-x;
			float: left;
			min-height: 500px;
		}
				
		ul li{
			border-bottom:1px #999999 dashed;
		}
		#content{
			border-radius:10px;
			border:#E0E0E3 2px solid;
			margin-left:10px;
		}
	</style>

	
  </head>

  <body>
  <div class='header'>
	<h3 style="color:white">Halaman Admin</h3>
  </div>
  <div class="row-fluid">
	<div class="span2" id="sidebar">
		<div class="headersub"><h4>Menu</h4></div>
		<div STYLE='background-color:#E6E6E6'>
			<ul class="nav nav-list" >
				<li><a  href="?hal=user">Lihat Pengguna</a></li>
				<li><a  href="?hal=aktivasi">Aktivasi</a></li>
				<li><a  href="?hal=profile">Profile</a></li>
				<li><a  href="?hal=paket">Paket</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>		
	</div>
	
	<div class="span8" id="tampung">
		<?php 
			include "content.php";
		?>
	</div>
  </div>


     <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    
   
  </body>
</html>

<?php
} else{
	header('Location:index.php');
}
?>

