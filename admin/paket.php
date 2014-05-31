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
<!--Dibawah ini adalah dialog setiap aksi-->

<div id="dialog-add" title="Tambah Paket">
	<form>
    <table border="0">
    <tr>
		<td><label for="nip">Id</label></td>
		<td><input type="text" name="idadd" id="idadd"  /></td>
    </tr>
    <tr>
		<td><label for="nama">Jenis</label></td>
		<td><input type="text" name="jenisadd" id="jenisadd" value=""  /></td>
	</tr>
	<tr>
		<td><label for="nama">Keterangan</label></td>
		<td><input type="text" name="ketadd" id="ketadd" value=""  /></td>
	</tr>
    </table>
	</form>
</div>

<div id="dialog-edit" title="Edit Paket">
	<form>
    <table border="0">
    <tr>
		<td><label for="nip">Id</label></td>
		<td><div id="idedit"></div></td>
    </tr>
    <tr>
		<td><label for="nama">Jenis</label></td>
		<td><input type="text" name="jenisedit" id="jenisedit" value=""/></td>
	</tr>
	<tr>
		<td><label for="nama">Keterangan</label></td>
		<td><input type="text" name="ketedit" id="ketedit" value=""/></td>
	</tr>
    </table>
	</form>
</div>

<div id="dialog-delete" title="Yakin hapus data?">
	<p><span style="float:left; margin:0 7px 20px 0;"></span><div id="isi">isi</div></p>
</div>


<div>
<h3>Data Paket</h3>
	<table class="table table-striped" id="mytable">
		<tr>
			<th>id</th>
			<th>Jenis Paket</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
		<?php
			$q = mysql_query("SELECT * FROM paket");
			while($data = mysql_fetch_array($q)){
				echo "<tr><td class='idCell'>".$data[id_paket]."</td> 
				<td class='jenisCell'>".$data[nama_paket]."</td> 
				<td class='ketCell'>".$data[keterangan]."</td>
				<td><a href='#' class='edit' onClick='EditData($(this))'>Edit</a> |
				<a href='#' class='delete' onClick='DeleteData($(this))'>Hapus</a></td>
				</tr>";
			}
		?>
	</table>
	<button type='submit' class='btn btn-primary' class='tambah' onClick="AddNew()">Tambah</button>
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
	height: 370,
	width: 350,
	modal: true,
	buttons: {
		"Proses": function() {
			var
				//isi variable dengan input data yang telah diisi oleh user
				aid = $("input#idadd").val();
				ajenis = $("input#jenisadd").val();
				aket = $("input#ketadd").val();
				//aksi
				aact= 'insert';
				
			//event untuk melakukan POST/GET pada postdata.php melalui jQuery
			$.ajax({
				type: "POST", //definisikan aksinya (POST/GET)
				url: "postpaket.php", //definisikan urlnya
				data: {"id":aid,"jenis":ajenis,"ket":aket,"act":aact}, //data yang akan dikirim
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
						s = '<tr><td class="idCell">'+aid+'</td><td class="jenisCell">'+ajenis+'</td><td class="ketCell">'+aket+'</td>'+sbutton+'</tr>'; 
						
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
	height: 370,
	width: 350,
	modal: true,
	buttons: {
		"Update": function() {
			var
				aid = $("#idedit").html();
				ajenis = $("input#jenisedit").val();
				aket = $("input#ketedit").val();
				aact= 'edit';
				
			$.ajax({
				type: "POST",
				url: "postpaket.php",
				data: {"id":aid,"jenis":ajenis,"ket":aket,"act":aact},
				timeout: 10000,
				beforeSend: function(){},
				complete: function(){},
				cache: false,
				success: function(result){
					if (result=='success'){
						//ubah isi data table sesuai dengan perubahan yang terjadi
						objRow.find(".jenisCell").html($("input#jenisedit").val());
						objRow.find(".ketCell").html($("input#ketedit").val());
																

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
	$("input#jenisadd").val('');
	$("input#ketadd").val('');
	
	//buka dialog
	$( "#dialog-add" ).dialog("open");
}


function EditData(obj){
	var id = obj.parent().parent().find(".idCell").html();
	jenis = obj.parent().parent().find(".jenisCell").html();
	ket = obj.parent().parent().find(".ketCell").html();
	

	$("#idedit").empty().append(id);
	$("input#jenisedit").val(jenis);
	$("input#ketedit").val(ket);
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





<?php 
}else{
	header('Location:index.php');
} 
?>