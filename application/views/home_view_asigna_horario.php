<?php include 'home/home_view_cabecera.php';

 ?>


		<div class="col-md-10" id="panel-general">
			<center>
			<?php
				foreach ($nombre as $key => $value) {
				    ?>
					<h2>Asignar horario a <?php echo $value["nombre_completo"]; ?> </h2>
					<?php 	
					    }
					?>
					
					
			</center>
			
			<center>
			<div class="form-group">
			<fieldset>
			<center>
			<form action="../addHorario_maestra/<?php echo $id_maestro; ?>" method="POST">	
			<label>Clave presupuestal</label>
					<select name="clave_horas_" id="clave_horas_"> 

					<?php foreach ($claves as $key => $value) {
						echo "<option selected disabled>Seleccione una opción</option>";
						echo "<option>".$value["clave_presupuestal_1"]."</option>";
						echo "<option>".$value["clave_presupuestal_2"]."</option>";
						echo "<option>".$value["clave_presupuestal_3"]."</option>";

					} ?>
					
					
						
						
					</select>
					<input id="hora_total_" value="">Horas</input>
					<br>
				
					
			<label for="nombre_materia">Materia</label>
			

				  <?php 

// echo $id_maestro;
				   ?>

				    	
				    	<select class="qq" id="select_materia" name="id_materia" >
						<option value="" >Seleciona una materia</option>
				    	<?php 
				    
				    		
				    	foreach ($materias as $key => $value) {
				    		
						 ?>
						<option data-semestre="<?php echo $value["semestre"]?>"
						   value=<?php echo $value["id_materia"].">" ?>   <?php echo $value["materia_nombre"]; ?>  </option>	
					

				    		<?php 	
				    		
				    	}
						
				    	?>
	
							 
				     				    			</select>
				     				    			<input class="qq3" type="hidden" name="semestre" value="<?php echo $value["semestre"] ?>" id="semestre">
											
                    <div class="qq2"></div>




						


			<label for="nombre_materia">Horario disponible</label>
				  

				    	
				    	<select  name="horario_inicio">
				    	<?php 
				    	//while ($row = mysql_fetch_array($result)) {
				    		
				    	foreach ($hora as $key => $value) {
				    		echo "	<option value=".$value["hora"].">".$value["hora"]."</option>";
				    	}
				    	//echo "	<option value=".$row["id_area"].">".$row["nombre"]."</option>";
//}
				    	
				    	
				    	
				    		 ?>
				    	</select>
		<label for="dias">Dias</label>
		<select name="dia">
			<option value="LUNES" >Lunes</option>
			<option value="MARTES" >Martes</option>
			<option value="MIERCOLES">Miercoles</option>
			<option value="JUEVES">Jueves</option>
			<option value="VIERNES">Viernes</option>


		</select>

		<label for="grupo">Grupo</label>
		<select name="grupo">
			<option value="A" >A</option>
			<option value="B" >B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value="E">E</option>
			<option value="F">F</option>


		</select>
<button type="submit" class="btn btn-primary" id="boton" >Agregar</button>
</form>
				 </center>
			</div>
			<div>
				<table border="1" style="margin-top: 17.2px;">
					<tr>
						<td style=" width: 105px;">
							<center>
								<b>DOCENTE:</b> <br>
								<b>CLAVE:</b>
							</center>
						</td>
						<td style="width: 1055px;">
							<?php
								foreach ($nombre as $key => $value) {
				   					echo strtoupper($value["nombre_completo"]);
				   					?>
				   						<br>
				   					<?php
				   					echo strtoupper($value["clavepresupuestal"]);
					    		}
							?>
						</td>
					</tr>
				</table>
				<br>
				<div style=" width:50%; margin-bottom:10px;">	
				<table border="1" style="margin-top: -10px;">
					<tr>
						<td style="width: 105px;">
							
						</td>
						<td style="width: 211px;">
							<center>
								<b>LUNES</b>
							</center>
						</td>
						<td style="width: 211px;">
							<center>
								<b>MARTES</b>
							</center>
						</td>
						<td style="width: 211px;">
							<center>
								<b>MIÉRCOLES</b>
							</center>
						</td>
						<td style="width: 211px;">
							<center>
								<b>JUEVES</b>
							</center>
						</td>
						<td style="width: 211px;">
							<center>
								<b>VIERNES</b>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<center>
								AULA
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '07:30:00' && $value["horario_final"] == '08:20:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '07:30:00' && $value["horario_final"] == '08:20:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '07:30:00' && $value["horario_final"] == '08:20:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '07:30:00' && $value["horario_final"] == '08:20:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '07:30:00' && $value["horario_final"] == '08:20:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<center>
								7:30 <br> 
								8:20
							</center>
						</td>
						<td>
							<center>
									<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '07:30:00' && $value["horario_final"] == '08:20:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
									<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '07:30:00' && $value["horario_final"] == '08:20:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
									<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '07:30:00' && $value["horario_final"] == '08:20:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
									<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '07:30:00' && $value["horario_final"] == '08:20:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
									<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '07:30:00' && $value["horario_final"] == '08:20:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<center>
								AULA
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '08:20:00' && $value["horario_final"] == '09:10:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '08:20:00' && $value["horario_final"] == '09:10:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '08:20:00' && $value["horario_final"] == '09:10:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '08:20:00' && $value["horario_final"] == '09:10:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '08:20:00' && $value["horario_final"] == '09:10:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<center>
								8:20 <br> 
								9:10
							</center>
						</td>
						<td>
							<center>
									<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '08:20:00' && $value["horario_final"] == '09:10:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
									<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '08:20:00' && $value["horario_final"] == '09:10:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '08:20:00' && $value["horario_final"] == '09:10:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '08:20:00' && $value["horario_final"] == '09:10:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '08:20:00' && $value["horario_final"] == '09:10:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<center>
								AULA
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '09:10:00' && $value["horario_final"] == '10:00:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '09:10:00' && $value["horario_final"] == '10:00:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '09:10:00' && $value["horario_final"] == '10:00:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '09:10:00' && $value["horario_final"] == '10:00:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '09:10:00' && $value["horario_final"] == '10:00:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<center>
								9:10 <br> 
								10:00
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '09:10:00' && $value["horario_final"] == '10:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '09:10:00' && $value["horario_final"] == '10:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '09:10:00' && $value["horario_final"] == '10:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '09:10:00' && $value["horario_final"] == '10:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '09:10:00' && $value["horario_final"] == '10:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<center>
								AULA
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '10:30:00' && $value["horario_final"] == '11:20:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '10:30:00' && $value["horario_final"] == '11:20:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '10:30:00' && $value["horario_final"] == '11:20:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '10:30:00' && $value["horario_final"] == '11:20:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '10:30:00' && $value["horario_final"] == '11:20:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<center>
								10:30 <br> 
								11:20
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '10:30:00' && $value["horario_final"] == '11:20:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '10:30:00' && $value["horario_final"] == '11:20:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '10:30:00' && $value["horario_final"] == '11:20:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '10:30:00' && $value["horario_final"] == '11:20:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '10:30:00' && $value["horario_final"] == '11:20:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<center>
								AULA
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '11:20:00' && $value["horario_final"] == '12:10:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '11:20:00' && $value["horario_final"] == '12:10:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '11:20:00' && $value["horario_final"] == '12:10:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '11:20:00' && $value["horario_final"] == '12:10:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '11:20:00' && $value["horario_final"] == '12:10:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<center>
								11:20 <br> 
								12:10
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '11:20:00' && $value["horario_final"] == '12:10:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '11:20:00' && $value["horario_final"] == '12:10:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '11:20:00' && $value["horario_final"] == '12:10:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '11:20:00' && $value["horario_final"] == '12:10:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '11:20:00' && $value["horario_final"] == '12:10:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<center>
								AULA
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
									<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
									<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
									<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
									<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["semestre"].$value["grupo"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<center>
								12:10 <br> 
								13:00
							</center>
						</td>

						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<tr>
						<td>
							<center>
								13:00 <br> 
								13:50
							</center>
						</td>
						
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:50:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:50:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					<!-- 	<- -->
					<tr>
						<td>
							<center>
								13:50 <br> 
								14:40
							</center>
						</td>
						
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'LUNES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:50:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MARTES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:50:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'MIERCOLES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'JUEVES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
						<td>
							<center>
								<?php
									foreach ($horario_maestro as $key => $value) {
										if($value["dia"] == 'VIERNES' && $value["horario_inicio"] == '12:10:00' && $value["horario_final"] == '01:00:00'){
											echo $value["NombreMateria"];
										}else{
											echo "";
										}
				  				}
					?>
							</center>
						</td>
					<!-- 	<- -->
					<!-- 	<- -->
				

					</tr>
				</table>
				</div>
			</div>
</div>


<?php  //include 'home/home_view_pie.php'; ?>

