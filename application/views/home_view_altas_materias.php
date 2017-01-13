<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<center>
					<h2>Dar de alta una materia</h2>
			</center>
			<form class="form-inline" id="alta_materia" action="http://localhost:8080/cetis/index.php/home/addMaterias" method="POST">
				<fieldset>
					<legend style="font-size: 18px;"><b>Datos de la materia</b></legend>
					<form action="http://localhost:8080/cetis/index.php/home/area" method="POST">
					<div class="form-group">
				    	<label for="nombre_materia">Nombre de la materia</label>
				    	<input type="text" class="form-control" id="area" name="nombre" placeholder="Nombre" required>
				  	</div>

				  	<div class="form-group">
				    	<label for="nombre_materia">Horas a la semana </label>
				    	<input type="text" class="form-control" id="area" name="horas" placeholder="00" required>
				  	</div>

				  	<div class="form-group">
				    	<label for="nombre_materia">semestre</label>
				    	<select  name="semestre">
				    		<option value="1">1</option>
				    				<option value="2">2</option>
				    						<option value="3">3</option>
				    								<option value="4">4</option>
				    										<option value="5">5</option>
				    												<option value="6">6</option>
				    	</select>
				  	</div>






				  	<div class="form-group">
				    	<label for="nombre_materia">area</label>
				    	<select  name="id_area">
				    	<?php 
				    	//while ($row = mysql_fetch_array($result)) {
				    		echo $area;
				    	foreach ($area as $key => $value) {
				    		echo "	<option value=".$value["id_area"].">".$value["nombre"]."</option>";
				    	}
				    	//echo "	<option value=".$row["id_area"].">".$row["nombre"]."</option>";
//}
				    	
				    	
				    	
				    		 ?>
				    	</select>
				  	</div>



				
				  	<br>
				  	<br>
				  	<button type="submit" class="btn btn-primary" id="boton" >Agregar</button>

				  	</form>
				</fieldset>
			</form>
		</div>
</div>
<?php include 'home/home_view_pie.php'; ?>