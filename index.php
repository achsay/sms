<?php
	session_start();
	include "inc/conn.php";
	
	if(isset($_POST['login'])){
		$user = htmlentities(trim($_POST['username']));
		$pass = htmlentities(md5($_POST['password']));
		
		if(empty($user)||empty($pass)){
			header('Location:index.php');
		}else{
			$cek = mysql_query("SELECT username FROM users where username = '$user' AND password = '$pass'");
			$baris = mysql_num_rows($cek);
			if($baris>0){
				while($data = mysql_fetch_array($cek)){
					$_SESSION['username'] = $data['username'];
					header('Location:user/index.php');
				}
			}else{
				header('Location:index.php');
			}
		}
	}
	
?>
 
 <!DOCTYPE html>
<html lang="en">
  <head>
  <style>
	.headerlogin{
  background-color:#8B4513;
  
  color:white;
  padding:2px;
}
.headerlogin h4{
  padding-left:15px;
}

.login{
 margin-top:15px;
}

form{
 border-bottom:1px #DCDCDC dashed;
}
  
  #menu{
	height: 30px;
	
  }
	#menu a{
		color: #ffffff;
		display: inline-block;
		text-decoration: none;
		margin-top: -30px;
		padding: 0 10px;
		position: relative;
		line-height: 79px;
	}
	#menu ul {
		list-style: none;
		display: block;
		clear: both;
		float: left;
	}
	#menu ul li {
		float: left;
	}
  </style>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
   	<link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
	
   
     
  </head>

  <body>

<div class="row-fluid">
<div style="width:100%">
	<header style="background-image: url(image/img01.jpg);height:160px; overflow:hide;"> <div class="span2" ></div><div class="span8" style="color:white; font-size:280%; margin-top:20px">SMS CENTER</div><div class="span2" ></div>
	</header>

	<div class="span8" style="margin-left:15%">
		<div id="menu" style="margin-top:-75px">
		<ul>
			<li><a href="?module=#">Home</a></li>
			<li><a href="?module=paket">Daftar Paket</a></li>
		</ul>
		</div>
	</div>
</div>
</div>
<div class="container">
	<div class="row-fluid">
		
		<div class="span10" style="width:85%;height:auto; margin-left:10%;">
			<div id="content">
				<div class='span3'>
					<div class="headerlogin"><h4>Login</h4></div>
						<div class="login">
							<form action='' method="POST">
								<p> Username :</p>
								<input type="text" name="username">
								<p> Password :</p>
								<input type="password" name="password">
								<button type="submit" name="login" value="login" class="btn btn-primary">Login</button>
							</form>
							<image src="image/sms.jpg"></image>
						</div>
				</div>
				<div class='span7'>
					<?php include"contentawal.php"?>
				</div>
				
			</div>
		</div>
		
	</div>
</div>
	
	
 
 

     <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    
   
  </body>
</html>

