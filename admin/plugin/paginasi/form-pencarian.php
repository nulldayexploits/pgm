<div class="pencarian-paginasi">


			    <link href="assets/paginasi/paginasi.css" rel="stylesheet"> 

				<form method="get">
	
								<select name="Kolom" class="form-control select-column-paginasi" id="select-column-paginasi">
									
									<?php 
									  for ($i=0; $i < count($column['value']); $i++) { 
									?>
									<option value="<?php echo $column['value'][$i]; ?>" <?php if(isset($_GET['Kolom']) AND $_GET['Kolom']==$column['value'][$i]){echo'selected';} ?>><?php echo $column['label'][$i]; ?></option>
							    	<?php } ?>
								</select>
								<br>

								<input type="text" name="KataKunci" placeholder="Masukkan Kata Kunci..." class="form-control" value="<?php if(isset($_GET['KataKunci'])){echo $_GET['KataKunci'];} ?>" id="input-column-paginasi">
								
								<br>

						
								<td>
									<button type="submit" class="btn btn-primary"> 
									  <i class="glyphicon glyphicon-search"></i> Cari
									</button>				
								</td>
								<td>
									<?php 
										if(isset($_GET['Kolom'])|| isset($_GET['KataKunci'])){
									?>
									    <a href="<?php echo $view; ?>" class="btn btn-danger">
									      <i class="glyphicon glyphicon-remove-circle"></i> Batal 
									    </a>
									<?php } ?>
								</td>


				</form>
</div>