<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<!--img src="http://localhost:8081/cetis/Image/mantenimiento.jpg" id="panel-general-logo"-->
			<center>
				<h3>Horarios por Maestro</h3>
			</center>
			<div class="form-group">
				<table class="table table-hover">
				<thead>
					<tr style="background-color: black; color: white; font-size: 17px;">
						<th><b>Nombre de Maestro</b></th>
						<th><center><b>Ver horario</b></center></th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0;$i<count($maestros);$i++){
						
						?>
						<tr>
							<th> <?php echo $maestros[$i]['nombre_completo'] ?> </th>
							<?php $id = $maestros[$i]['id_maestro']; ?>
							<th><center><?php echo "<a href='http://localhost:8080/cetis/index.php/home/maestrohorario/".$id."' class='btn btn-success' target='_blank'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a>"?></center></th>
						</tr>
				<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
	<!--
<?php // include 'home/home_view_pie.php'; ?> -->