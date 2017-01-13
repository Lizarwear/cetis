<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<center>
					<h2>Dar de alta un grupo</h2>
			</center>
			<form class="form-inline" id="alta_grupo" action="http://localhost:8080/cetis/index.php/home/addGrupo" method="POST">
				<fieldset>
					<legend style="font-size: 18px;"><b>Datos Generales</b></legend>
					<div class="form-group">
				    	<label for="semestre_grupo">Semestre</label>
				    	<select class="form-control" name="semestre_grupo">
				    		<option>1</option>
				    		<option>2</option>
				    		<option>3</option>
				    		<option>4</option>
				    		<option>5</option>
				    		<option>6</option>
				    	</select>
				  	</div>
					<div class="form-group">
				    	<label for="nombre_grupo">Grupo</label>
				    	<select class="form-control" name="nombre_grupo">
				    		<option>A</option>
				    		<option>B</option>
				    		<option>C</option>
				    		<option>D</option>
				    		<option>E</option>
				    		<option>F</option>
				    	</select>
				  	</div>
				  	<div class="form-group">
				    	<label for="cantidad_grupo">Cantidad de Alumnos</label>
				    	<input type="text" style="width: 50px;" class="form-control" id="cantidad_grupo" name="cantidad_grupo" placeholder="N°" required>
				  	</div>
				  	<div class="form-group">
				    	<label for="carrera_grupo">Carrera</label>
				    	<!--input type="text" class="form-control" id="carrera_grupo" name="nombre_grupo" placeholder="Grupo" required-->
				    	<select class="form-control" name="carrera_grupo">
				    		<option>Ofimática</option>
				    		<option>Programación</option>
				    		<option>Mantenimiento Automotríz</option>
				    		<option>Laboratorio Clínico</option>
				    		<option>Contabilidad</option>
				    	</select>
				  	</div>
				  	<div class="form-group">
				    	<label for="ciclo_escolar">Ciclo Escolar</label>
				    	<input type="text" style="width: 250px;" class="form-control" id="ciclo_escolar" name="ciclo_escolar" placeholder="Ciclo Escolar" required>
				  	</div>
				  	<br>
				  	<br>
				  	<div class="form-group">
				    	<label for="periodo">Periodo</label>
				    	<input type="text" style="width: 195px;" class="form-control" id="periodo" name="periodo" placeholder="Periodo" required>
				  	</div>
				  	<br>
				  	<br>
				  	<button type="submit" class="btn btn-primary" id="boton">Agregar</button>
				</fieldset>
			</form>
		</div>
</div>
<?php include 'home/home_view_pie.php'; ?>