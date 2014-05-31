<?php
session_start();
include "../inc/conn.php";

if(isset($_POST['login'])){
	$user = htmlentities(trim($_POST['user']));
	$pass = htmlentities(md5($_POST['passwd']));

	$q = mysql_query("select * from admin where user = '$user' and password = '$pass' ");
	$cek = mysql_num_rows($q);
	if($cek>0){
		while($data = mysql_fetch_array($q)){
			$_SESSION['user'] = $data['user'];
			header('Location:home.php');
		}
	}else{
		header('Location:index.php');
	}
}
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

  </head>

  <body>
  <div style="background-color:silver; height:75px;margin-top:-10px"><h2>Halaman Admin</h1></div>
	<div class="container" style="margin-top:7%">
	<div class="span4"></div>
	<div class="span2" >
	<h2>Login</h2>
	<form class="form-horizontal" action="" method="POST">
		<table class="table">
			<tr> 
				<td><label>Username</label><input type="text" name="user"></td>
			</tr>
			<tr>
				<td><label>Username</label><input type="password" name="passwd"></td>
			</tr>
			<tr>
				<td>
					<button class="btn btn-primary" type="submit" name="login" value="login">Login</button> 
					<button class="btn" type="reset" name="reset" value="reset">Batal</button>
				</td>
				
			</tr>
		</table>
	</form>
	</div>
</div>
<div style="background-color:black; height:60px;margin-top:105px; color:white"><h6 align="center">&copy administrator</h6></div>



     <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    
   
  </body>
</html>

