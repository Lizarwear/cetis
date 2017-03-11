<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<center>
					<h2>Asignar materia a un maestro</h2>
			</center>
			<form class="form-inline" id="alta_materia" action="http://localhost:8080/cetis/index.php/home/addMaestro_materia" method="POST">
				<fieldset>
					<legend style="font-size: 18px;"><b>Maestros y materias</b></legend>
					
					<div class="form-group">
				    	<label for="nombre_materia">Maestro</label>

				  

				    	
				    	<select  name="maestros" id="maestro___">
				    		<option selected disabled>Seleccione un maestro</option>
				    	<?php 
				    	//while ($row = mysql_fetch_array($result)) {
				    		
				    	foreach ($maestro as $key => $value) {
				    		echo "	<option value=".$value["id_maestro"].">".$value["nombre"]." ".$value["apellido_paterno"]." ".$value["apellido_materno"]."</option>";

				    	}
				    	//echo "	<option value=".$row["id_area"].">".$row["nombre"]."</option>";
//}
				    
				    		 ?>
				    	</select>
				  	</div>
				 
				  	<div>
				  	<label>Clave presupuestal</label>
				  	<select  name="clave_presupuestal" id="cla__">
				  	
				  	<option selected disabled>Seleccione una Clave</option>
				  	<option id="cla__1" value=""></option>
				  	<option id="cla__2" value=""></option>
				  	<option id="cla__3" value=""></option>
				  	</select>

				  	</div>


				  	<div class="form-group">
				    	<label for="nombre_materia">Materia</label>
				    	
				    	<select  name="materia">
				    	<?php 
				    	//while ($row = mysql_fetch_array($result)) {
				    		
				    	foreach ($materias as $key => $value) {
				    		echo "	<option value=".$value["id_materia"].">".$value["materia_nombre"]."</option>";
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