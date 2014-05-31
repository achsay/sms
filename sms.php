<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kirim SMS<strong class="caret"></strong></a>
		

<ul class="dropdown-menu">
									
<li>
									

	<form method="post" align="center">
				

	<input type="text" name="nohp" style="width:50%;resize:none;" placeholder="No. HP"></br>
						

<textarea cols="50" rows="3" style="height:80px; width:50%;resize:none;" id="chatval" class="chatval" name="pesan" required placeholder="Pesan Anda"></textarea>	
					

				</li>

					

				<li class="divider">
			

						</li>
			

						<li>
			

							<div 

class="panel-footer">
							

			<input type="submit" name="kirimr" 

value="Kirim">
								

		</form>
							

		</li>
							

		
							

		
							

			</div>
						

				</ul>
					

			
						

	</li>
							</h3>
	

							
		

						
			

			</div>
						

<div class="panel-body">
						

	
						
		

				<?php
					

			if(isset($_POST['kirimr']))
			

					{
				

					mysql_connect

("localhost","root","");
						

			mysql_select_db("sms"); 
			

						$query=mysql_query

("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) 
	

								VALUES 

('".$_POST['nohp']."', '".$_POST['pesan']."', 'gammu')");
		

							if($query)
	

								{
	

									

echo "<script>alert('Sukses kirim sms')</script>";
			

						}else
			

						{
			

							echo 

"<script>alert('gagal')</script>";
					

				}
					

			}