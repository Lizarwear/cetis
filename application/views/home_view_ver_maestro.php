<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<center>
					<h2>Detalle de maestro</h2>
			</center>
			<center>
			<div class="form-group">
			<fieldset>
			<center>
			<fieldset>
<label>Nombre:</label>
<?php echo $detalle["nombre"]." ".$detalle["apellido_paterno"]." ".$detalle["apellido_materno"] ?>
<br>

<label>RFC:</label>
<?php echo $detalle["rfc"] ?>
<br>

<label>Disponibilidad:</label>
<?php echo $detalle["disponibilidad"] ?>
<br>

<label>Horas semanales:</label>
<?php echo $detalle["hora"] ?>
<br>

<label>Clave presupuestal 1:</label>
<?php echo $detalle["clave_presupuestal_1"] ?>
<br>
<label>Clave presupuestal 2:</label>
<?php echo $detalle["clave_presupuestal_2"] ?>
<br>
<label>Clave presupuestal 3:</label>
<?php echo $detalle["clave_presupuestal_3"] ?>
<br>
<label>Curp:</label>
<?php echo $detalle["curp"] ?>
<br>

<label>Funcion:</label>
<?php echo $detalle["funcion"] ?>
<br>
<label>Tipo:</label>
<?php echo $detalle["tipo"] ?>
<br>
<label>Especialidad:</label>
<?php echo $perfil["especialidad"] ?>
<br>



</fieldset>
</center>
	<?php if ($materias==null) {
	echo "<h3 id='rf' value='1' >Sin materias asignadas </h3>";
} ?>
<table border = "1">
		<tr><td style="background-color:#0EBEBA" color="black";><b>Materias</b></td>  
		
<?php foreach ($materias as $key => $value):

 ?>
	
		<td ><?php echo $value["materia_nombre"]; ?></td>

    <?php endforeach;?>


	</tr>

</table>

   <a style="color: white;" href="../asigna_horario/<?php echo $detalle["id_maestro"]; ?>" ><button class="btn btn-info" style="font-size: 20px;">Asignar horario</button></a>


</fieldset>
				 </center>
			</div>
</div>
<?php /* include 'home/home_view_pie.php'; */?>