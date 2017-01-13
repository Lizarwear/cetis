<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<!--img src="http://localhost:8081/cetis/Image/mantenimiento.jpg" id="panel-general-logo"-->
			<center>
				<h3>Ver horarios por:</h3>
			</center>
			<div class="form-group">
				<fieldset>
					<center>
					
						<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/horarioXmaestro"><button class="btn btn-info" style="font-size: 20px; margin-top: 15px; width: 220px;">Horarios por Maestro</button></a>
					</center>
				</fieldset>
				<fieldset>

					<center>
						<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/horarioXgrupo"><button class="btn btn-info" style="font-size: 20px; margin-top: 25px; width: 220px;">Horarios por Grupo</button></a>
					</center>
				</fieldset>
				<fieldset>
					<center>
						<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/horarioXaula"><button class="btn btn-info" style="font-size: 20px; margin-top: 25px; width: 220px;">Horarios por Aula</button></a>
					</center>
				</fieldset>
			</div>
		</div>
	</div>
<?php include 'home/home_view_pie.php'; ?>
