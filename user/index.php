<?php 
	session_start();
	if(isset($_SESSION['username'])){
 
?>
 
 <!DOCTYPE html>
<html lang="en">
  <head>
  <style>
  #menu{
	height: 20px;
	
  }
	#menu a{
		color: #ffffff;
		display: inline-block;
		text-decoration: none;
		margin-top: -30px;
		padding: 0 10px;
		position: relative;
		line-height: 69px;
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
    <title>Halaman User</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
   	<link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet">
	
   
     
  </head>

  <body>

<div class="row-fluid">
<div style="width:100%">
	<header style="background-image: url(../image/img01.jpg);height:160px; overflow:hide;"> <div class="span2" ></div><div class="span8" style="color:white; font-size:280%; margin-top:20px">SMS CENTER</div><div class="span2" ></div>
	</header>

	<div class="span8" style="margin-left:15.0%">
		<div id="menu" style="margin-top:-75px">
		<ul>
			<li><a href="?module=instantsms">SMS</a></li>
			
			<li><a href="?module=group">Group</a></li>
			<li><a href="?module=phonebook">PhoneBook</a></li>
			
			<li><a href="?module=deposit">Deposit</a></li>
			
		</ul>
		</div>
	</div>
</div>
</div>
<div class="container">
	<div class="row-fluid">
		
		<div class="span10" style="width:85%;height:auto; margin-left:10%;">
			<div id="content">
				<?php include "content.php"; ?>
			</div>
		</div>
		
	</div>
</div>
	
	
 
 

     <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
    
   
  </body>
</html>
<?php 
}else{
	header('Location:../');
}
?>
