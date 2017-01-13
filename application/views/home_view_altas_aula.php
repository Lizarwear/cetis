<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<center>
					<h2>Dar de alta un aula</h2>
			</center>
			<form class="form-inline" id="alta_aula" action="http://localhost:8080/cetis/index.php/home/addAula" method="POST">
				<fieldset>
					<legend style="font-size: 18px;"><b>Datos Generales</b></legend>
					<div class="form-group">
				    	<label for="nombre_aula">Nombre</label>
				    	<input type="text" class="form-control" id="nombre_aula" name="nombre_aula" placeholder="Nombre" required>
				  	</div>
				  	<div class="form-group">
				    	<label for="capacidad_aula">Capacidad</label>
				    	<input type="text" style="width: 50px;" class="form-control" id="capacidad_aula" name="capacidad_aula" placeholder="N°" required>
				  	</div>
				  	<div class="form-group">
				    	<label for="tipo_aula">Tipo</label>
				    	<select class="form-control" name="tipo_aula">
				    		<option >General</option>
				    		<option >Taller</option>
				    		<option >Laboratorio Análisis Clínicos</option>
				    		<option >Laboratorio de Ciencias</option>
				    		<option >Laboratorio de Cómputo</option>
				    	</select>
				  	</div>
				  	<br>
				  	<br>
				  	<button type="submit" class="btn btn-primary" id="boton" >Agregar</button>
				</fieldset>
			</form>
		</div>
</div>
<?php include 'home/home_view_pie.php'; ?>