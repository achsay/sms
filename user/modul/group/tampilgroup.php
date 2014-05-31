<?php 
	include "../inc/conn.php";
	session_start();
	if(isset($_SESSION['username'])){
?>

<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.20.custom.css">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.20.custom.min.js"></script>


<div id="dialog-add" title="Tambah group">
	<form>
    <table border="0">
    <tr>
		
		<td><input type="text" name="idadd" id="idadd" /></td>
    </tr>
    <tr>
		<td><label for="nama">Nama</label></td>
		<td><input type="text" name="namaadd" id="namaadd" value=""  /></td>
	</tr>
	
    </table>
	</form>
</div>

<div id="dialog-edit" title="Edit Group">
	<form>
    <table border="0">
    <tr>
		<td><label for="id">Id</label></td>
		<td><div id="idedit"></div></td>
    </tr>
    <tr>
		<td><label for="nama">Nama</label></td>
		<td><input type="text" name="namaedit" id="namaedit" value=""/></td>
	</tr>
    </table>
	</form>
</div>

<div id="dialog-delete" title="Yakin hapus data?">
	<p><span style="float:left; margin:0 7px 20px 0;"></span><div id="isi">isi</div></p>
</div>
				<div>
					  <img src="../image/group.jpg" style="float:right; padding-bottom:10px">
				</div>
				<div class="hasil">
						<div>
								<table border="1" class="table" id='mytable'>
									<tr style="background-color:black;color:white;">
										
										<th>ID GROUP</th><th>NAMA GROUP</th><th>ATUR</th>
									</tr>
									<?php
										$q = mysql_query("SELECT * FROM pbk_groups");
										while($data = mysql_fetch_array($q)){
											echo "<tr><td class='idCell'>".$data[ID]."</td> 
											<td class='namaCell'>".$data[Name]."</td> 
											<td><a href='#' class='edit' onClick='EditData($(this))'>Edit</a> |
											<a href='#' class='delete' onClick='DeleteData($(this))'>Hapus</a></td>
											</tr>";
										}
									?>
								</table>
								<button type='submit' class='btn btn-primary' class='tambah' onClick="AddNew()">Tambah</button>
							</div>
					
				</div>
				
<script>	
var
  objRow, //variable row yg diisi pada saat dialog edit
  nipdelete; //variable nip yang diisi pada saat event delete

<!--Dibawah ini adalah inisialisasi dialog jQuery-->
//inisialisasi dialog tambah data
$( "#dialog-add" ).dialog({
	autoOpen: false,
	resizable: false,
	height: 250,
	width: 350,
	modal: true,
	buttons: {
		"Proses": function() {
			var
				//isi variable dengan input data yang telah diisi oleh user
				aid = $("input#idadd").val();
				ajenis = $("input#namaadd").val();
				
				//aksi
				aact= 'insert';
				
			//event untuk melakukan POST/GET pada postdata.php melalui jQuery
			$.ajax({
				type: "POST", //definisikan aksinya (POST/GET)
				url: "postpaket.php", //definisikan urlnya
				data: {"id":aid,"nama":ajenis,"act":aact}, //data yang akan dikirim
				timeout: 10000, //timeout dari request
				beforeSend: function(){}, //event yang akan dieksekusi sebelum pengiriman data
				complete: function(){}, //event yang akan dieksekusi setelah pengiriman data
				cache: false, //cache
				success: function(result){ //event yang akan dieksekusi setelah data berhasil dikirim
					if (result=='success'){ //apabila respon dari postdata.php success maka
						var
						//link button aksi
						sbutton = "<td > <a class='edit' href='#' onClick='EditData($(this))'>Edit</a> | <a class='delete' href='#' onClick='DeleteData($(this))'>Delete</a></td>";
						
						//isi data row baru
						s = '<tr><td class="idCell">'+aid+'</td><td class="namaCell">'+ajenis+'</td>'+sbutton+'</tr>'; 
						
						//tambahkan row baru pada baris terakhir
						$('#mytable > tbody:last').append(s);																					

					}else{alert(result);}
					//close waiting
				},
				error: function(error){alert('request timeout, please try again.');$( this ).dialog( "close" );} //event yang akan diseksekusi pada saat error berlangsung
				}
			);
			$( this ).dialog( "close" );			
			
		},
		Cancel: function() {
			$( this ).dialog( "close" );
		}
	}
});

//inisialisasi dialog edit data
//penjelasan dari code ini hampir sama dengan dialog tambah data
$( "#dialog-edit" ).dialog({
	autoOpen: false,
	resizable: false,
	height: 250,
	width: 350,
	modal: true,
	buttons: {
		"Update": function() {
			var
				aid = $("#idedit").html();
				anama = $("input#namaedit").val();
				aact= 'edit';
				
			$.ajax({
				type: "POST",
				url: "postpaket.php",
				data: {"id":aid,"nama":anama,"act":aact},
				timeout: 10000,
				beforeSend: function(){},
				complete: function(){},
				cache: false,
				success: function(result){
					if (result=='success'){
						//ubah isi data table sesuai dengan perubahan yang terjadi
						objRow.find(".namaCell").html($("input#namaedit").val());
																

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

//inisialisasi dialog hapus data
//penjelasan dari code ini hampir sama dengan dialog tambah data
$( "#dialog-delete" ).dialog({
	autoOpen:false,
	resizable: false,
	height:210,
	modal: true,
	buttons: {
		"Proses": function() {
			var
				aact= 'delete';				
			$.ajax({
				type: "POST",
				url: "postpaket.php",
				data: {"id":iddelete,"act":aact},
				timeout: 10000,
				beforeSend: function(){},
				complete: function(){},
				cache: false,
				success: function(result){
					if (result=='success'){
						//hapus baris table yang terpilih
						objRow.remove();										
						
					}else{
						alert(result);
					}
					
				},
				error: function(error){alert('request timeout, please try again.');}
				}
			);
			$( this ).dialog( "close" );
			
			
		},
		"Batal": function() {
			$( this ).dialog( "close" );
		}
	}
});

<!--Akhir dari inisialisasi dialog jQuery-->
		


<!--Dibawah ini adalah event handler dari setiap aksi (add,edit,delete)-->
function AddNew(){
	//untuk data baru, kosongkan fieldnya terlebih dahulu
	$("input#idadd").val('');
	$("input#namaadd").val('');
	
	//buka dialog
	$( "#dialog-add" ).dialog("open");
}


function EditData(obj){
	var id = obj.parent().parent().find(".idCell").html();
	nama = obj.parent().parent().find(".namaCell").html();
	

	$("#idedit").empty().append(id);
	$("input#namaedit").val(nama);
	objRow = obj.parent().parent();	//simpan object row
	$( "#dialog-edit" ).dialog("open");
	
}

function DeleteData(obj){
	iddelete = obj.parent().parent().find(".idCell").html();
	$("#isi").empty().append('Apakah anda yakin akan menghapus data dengan id : ' + iddelete + ' ?');
	$( "#dialog-delete" ).dialog( "open" );	
	objRow = obj.parent().parent();	//simpan object row
}
<!--Akhir dari Event Handler-->

</script>

<?php } 

?>