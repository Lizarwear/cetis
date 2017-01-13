<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<center>
					<h2>Dar de alta una areas</h2>
			</center>
			<form class="form-inline" id="alta_materia" action="http://localhost:8080/cetis/index.php/home/addArea" method="POST">
				<fieldset>
					<legend style="font-size: 18px;"><b>Datos Generales</b></legend>
					<form action="http://localhost:8080/cetis/index.php/home/area" method="POST">
					<div class="form-group">
				    	<label for="nombre_materia">Nombre del area</label>
				    	<input type="text" class="form-control" id="area" name="area" placeholder="Nombre" required>
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