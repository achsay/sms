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

}

ul li a:hover{
	margin-left:2px;
}

ul li a{ 
	color:#8B4513;
	
}


</style>

<div class="container">
	<div class="span3">
		<div class="headersub"><h4>Sub Menu</h4></div>
		<div class="submenu">
			<ul class="nav nav-list" >
				<li><a href="#">Inbox</a></li>
				<li><a href="#">Hapus semua inbox</a></li>
				<li><a href="#">Export inbox ke excel</a></li>
				<li><a href="#">Logout</a></li>
			</ul>
		</div>
		<img src="image/sms.jpg">
	</div>
	<div class="span7" >
		<div class="headerhome"><h4>INBOX</h4></div>
		<div class="content">
			<div class="cari">
			   
			    <form class="form-search" style="padding-top:3%">
				 <i>Pencarian</i>
				  <input type="text" class="input-xlarge ">
				  <button type="submit" class="btn">Cari SMS</button>
				  <img src="image/inbox.jpg" style="padding-left:100px;">
			    </form>
			</div>
			<div class="hasil">
				<table border="1" class="table">
					<tr style="background-color:black;color:white;">
						<td>
							<label class="checkbox">
							<input type="checkbox" value="">
							</label>
						</td>
						<th>ISI SMS</th><th>[R]</th><th>PENGIRIM</th><th>ACTION</th>
					</tr>
					<tr >
						<td>
							<label class="checkbox">
							<input type="checkbox" value="">
							</label>
						</td>
						<td>Segera join</td><td></td><td>08733251933</td><td><a href="#">DEL</a>|<a href="#">SPAM</a></td>
					</tr>
					
				</table>
				<button class="btn">Hapus SMS</button>
			</div>
		</div>
	</div>
	
</div>