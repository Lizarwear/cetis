<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<center>
					<h2>Dar de alta una materia</h2>
			</center>
			<form class="form-inline" id="alta_materia" action="http://localhost:8080/cetis/index.php/home/addMaterias" method="POST">
				<fieldset>
					<legend style="font-size: 18px;"><b>Datos Generales</b></legend>
					<div class="form-group">
				    	<label for="nombre_materia">Nombre</label>
				    	<input type="text" class="form-control" id="nombre_materia" name="nombre_materia" placeholder="Nombre" required>
				  	</div>
				  	<div class="form-group">
				    	<label for="horas_materia">Cantidad de horas</label>
				    	<input type="text" style="width: 50px;" class="form-control" id="horas_materia" name="horas_materia" placeholder="N°" required>
				  	</div>
				  	
				  	<div class="form-group">
				    	<label for="tipo_materia">Tipo</label>
				    	<select class="form-control" name="tipo_materia">
				    		<option>Básica</option>
				    		<option>Propedéutica</option>
				    		<option>Profesional</option>
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