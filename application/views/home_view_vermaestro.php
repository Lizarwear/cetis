<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<center>
					<h2>Maestros</h2>
			</center>
			<center>
			<div class="form-group" style="margin-top: 15.9px; margin-left: 11.5px;">
			<?php 
			echo "<table border = '1' style='font-size: 16.5px;'> \n"; 
			 echo "<tr><td><b>Nombre</b></td><td><b>Apellido Paterno</b></td><td><b>Apellido Materno</b></td><td><b>RFC</b></td><td><b>Disponibilidad</b></td><td><b>Detalles</b></td></tr> \n"; 
				foreach ($maestro as $key => $value) {
			 
      echo "<tr><td>".$value["nombre"]."</td><td>".$value["apellido_paterno"]."</td><td>".$value["apellido_materno"]."</td><td>".$value["rfc"]."</td><td>".$value["disponibilidad"]."</td><td><a href="."ver_maestro/".$value["id_maestro"].">Ver detalle</a></td></tr> \n"; 
				    	
				    	}


				 ?>

				 </center>
			</div>
</div>
<?php /* include 'home/home_view_pie.php'; */?>