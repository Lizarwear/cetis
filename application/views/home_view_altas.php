<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<center>
					<h2>Altas</h2>
			</center>
			<div class="form-group">
				<!--p style="font-size: 20px;">Módulo para Altas de </p>
				<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/maestro"><button class="btn btn-primary" style="font-size: 20px;">Maestro</button></a>
				<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/grupo"><button class="btn btn-primary" style="font-size: 20px;">Grupo</button></a>
				<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/aula"><button class="btn btn-primary" style="font-size: 20px;">Aula</button></a>
				<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/materia"><button class="btn btn-primary" style="font-size: 20px;">Materia</button></a>
				<br>
				<br-->
				<!--p style="font-size: 20px;">Reportes</p-->
				<fieldset>
					<legend>Reportes sobre Maestros</legend>
					<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/maestro_generales_pdf" target="_blank"><button class="btn btn-info" style="font-size: 20px;">Aspectos Generales</button></a>
					<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/maestro_domicilio_pdf" target="_blank"><button class="btn btn-info" style="font-size: 20px;">Domicilio</button></a>
					<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/maestro_funcion_pdf" target="_blank"><button class="btn btn-info" style="font-size: 20px;">Función Institucional</button></a>
					<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/maestro_perfil_pdf" target="_blank"><button class="btn btn-info" style="font-size: 20px;">Perfil Profesiográfico</button></a>
				</fieldset>
				<fieldset>
					<legend>Reportes sobre Grupos</legend>
					<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/grupo_pdf" target="_blank"><button class="btn btn-info" style="font-size: 20px;">Grupo</button></a>
				</fieldset>
				<fieldset>
					<legend>Reportes sobre Aulas</legend>
					<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/aula_pdf" target="_blank"><button class="btn btn-info" style="font-size: 20px;">Aula</button></a>
				</fieldset>
				<fieldset>
					<legend>Reportes sobre Materias</legend>
					<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/materia_pdf" target="_blank"><button class="btn btn-info" style="font-size: 20px;">Materia</button></a>
				</fieldset>
				<fieldset>
					<legend>Agregar Areas y Materias</legend>
					<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/area" ><button class="btn btn-info" style="font-size: 20px;">Area</button></a>
					<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/materias" ><button class="btn btn-info" style="font-size: 20px;">Materias</button></a>

				</fieldset>

				<fieldset>
					<legend>Asignar Materias</legend>
					<a style="color: white;" href="http://localhost:8080/cetis/index.php/home/asignar_materia" ><button class="btn btn-info" style="font-size: 20px;">Asignar materias a maestros</button></a>

				</fieldset>

			</div>
		</div>
</div>
<?php include 'home/home_view_pie.php'; ?>