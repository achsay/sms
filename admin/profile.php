<?php 

	include "../inc/conn.php";
	session_start();
	if(isset($_SESSION['user'])){
	
?>
<link rel="stylesheet" type="text/css" href="jquery-ui-1.8.20.custom.css">
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.8.20.custom.min.js"></script>

<br>
<br>
<h2 align='center'>Atur Profile</h2>
	<br>
	<br>
	<!--Dibawah ini adalah dialog setiap aksi-->
<div id="dialog-edit" title="Edit ">
	<form>
    <table border="0">
    <tr>
		<td><label for="idadmin">ID Admin</label></td>
		<td><div id="idedit"></div></td>
    </tr>
    <tr>
		<td><label for="user">User Name</label></td>
		<td><input type="text" name="useredit" id="useredit" value="" /></td>
	</tr>
	 <tr>
		<td><label for="password">Password</label></td>
		<td><input type="text" name="passedit" id="passedit" value="" /></td>
	</tr>
	 <tr>
		<td><label for="nama">Nama</label></td>
		<td><input type="text" name="namaedit" id="namaedit" value="" /></td>
	</tr>
	 <tr>
		<td><label for="telp">No.Telp</label></td>
		<td><input type="text" name="telpedit" id="telpedit" value="" /></td>
	</tr>
    </table>
	</form>
</div>

<div>
	<!--Table penampilan data-->
	<h4> Seting Profile admin</h4>
	<table class="table table-striped">
		<tr>
			<th>Id</th>
			<th>User</th>
			<th>Password</th>
			<th>Nama</th>
			<th>Telepon</th>
			<th>Aksi</th>
		</tr>
		<?php
			$q = mysql_query("SELECT * FROM admin");
			while($data = mysql_fetch_array($q)){
				echo "<tr><td class='idCell'>".$data[id_admin]."</td>
				<td class='userCell'>".$data[user]."</td>
				<td class='passCell'>".$data[password]."</td> 
				<td class='namaCell'>".$data[nama]."</td>
				<td class='telpCell'>".$data[telp]."</td>
				<td><a class='edit' href='#' onClick='EditData($(this))'><img src='image/edit.png'></a></td></tr>";
			}
		?>
	</table>

	
</div>

<script>
var
	objRow;
	$( "#dialog-edit" ).dialog({
	autoOpen: false,
	resizable: false,
	height: 380,
	width: 450,
	modal: true,
	buttons: {
		"Update": function() {
			var
				aid = $("#idedit").html();
				auser = $("input#useredit").val();
				apass = $("input#passedit").val();
				anama = $("input#namaedit").val();
				atelp = $("input#telpedit").val();
				aact= 'edit';
				
			$.ajax({
				type: "POST",
				url: "postdata.php",
				data: {"id":aid,"user":auser,"pass":apass,"nama":anama,"telp":atelp,"act":aact},
				timeout: 10000,
				beforeSend: function(){},
				complete: function(){},
				cache: false,
				success: function(result){
					if (result=='success'){
						//ubah isi data table sesuai dengan perubahan yang terjadi
						objRow.find(".userCell").html($("input#useredit").val());
						objRow.find(".passCell").html($("input#passedit").val());
						objRow.find(".namaCell").html($("input#namaedit").val());
						objRow.find(".telpCell").html($("input#telpedit").val());
																

					}else{alert(result);}
				},
				error: function(error){alert('request timeout, please try again.');}
				}
			);
			
			$( this ).dialog( "close" );
			
		},
		Cancel: function() {
			$( this ).dialog( "close" );
		}
	}
});

	function EditData(obj){
	var id = obj.parent().parent().find(".idCell").html();
	user = obj.parent().parent().find(".userCell").html();
	pass = obj.parent().parent().find(".passCell").html();	
	nama = obj.parent().parent().find(".namaCell").html();
	telp = obj.parent().parent().find(".telpCell").html();
	

	$("#idedit").empty().append(id);
	$("input#useredit").val(user);
	$("input#passedit").val(pass);
	$("input#namaedit").val(nama);
	$("input#telpedit").val(telp);
	objRow = obj.parent().parent();	//simpan object row
	$( "#dialog-edit" ).dialog("open");
	
	}
</script>




<?php 
}else{
	header('Location:index.php');
} 
?>