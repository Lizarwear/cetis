<?php include 'cabecera_home.php';?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12" id="cabecera_home">
			<div class="row">
				<div class="col-md-2" id="cabecera_logo">
					<center>
						<img src="http://localhost:8080/cetis/Image/logo-cetis157.png" id="cabecera-logo">
					</center>
				</div>
				<div class="col-md-7" id="cabecera_titulo">
					<center>
						<h2 id="cabecera_titulo_h2"><b>Sistema para el Control de Horarios</b></h2>
					</center>
				</div>
				<div class="col-md-3" id="cabecera_sesion">
					<center>
						<h4 id="cabecera_sesion_h4">
							<b>Usuario</b>
							<a href="/cetis">
								Cerrrar Sesión
								<span class="glyphicon glyphicon-off" aria-hidden="true">
								</span>
							</a>
						</h4>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2" id="menunav" style="height: 630px;">
			<div class="menu_templ" style="width:100%;max-width: 612px;background-color:#F2F2F2;">
				<ul id="css3menu1" class="topmenu">
					<li class="topmenu">
						<a href="http://localhost:8080/cetis/index.php/home/inicio" title="Inicio" style="width:154px;">
							<span class="glyphicon glyphicon-home" aria-hidden="true" style="font-size: 22px;">
								Inicio
							</span>
						</a>
					</li>
					<li class="topmenu">
						<a href="http://localhost:8080/cetis/index.php/home/vermaestro" title="Bajas" style="width:154px;">
							<span>
								<span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size: 22px;">
								Maestro
								</span>
							</span>
						</a>
						<ul>
						</ul>
						</li>
					<li class="topmenu">
						<a href="http://localhost:8080/cetis/index.php/home/altas" title="Reportes de Altas" style="width:154px;">
							<span>
								<span class="glyphicon glyphicon-plus" aria-hidden="true" style="font-size: 22px;">
									Altas
								</span>
							</span>
						</a>
						<ul>



							<li>
								<a href="http://localhost:8080/cetis/index.php/home/maestro" title="Altas Maestro">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true" style="font-size: 17px;">
										Maestro
									</span>
								</a>
							</li>
							<li>
								<a href="http://localhost:8080/cetis/index.php/home/grupo" title="Alta Grupo">
									<span>
										<span class="glyphicon glyphicon-education" aria-hidden="true" style="font-size: 17px;">
											Grupo
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="http://localhost:8080/cetis/index.php/home/aula" title="Alta Aula">
									<span class="glyphicon glyphicon-blackboard" aria-hidden="true" style="font-size: 17px;">
										Aula
									</span>
								</a>
							</li>
							<li>
								<a href="http://localhost:8080/cetis/index.php/home/materias" title="Alta Materia">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true" style="font-size: 17px;">
										Materia
									</span>
								</a>
							</li>
						</ul>
					</li>
					<!--   -->
					<li class="topmenu">
						<a href="http://localhost:8080/cetis/index.php/home/editar" title="Editar" style="width:154px;">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true" style="font-size: 22px;">
								Editar
							</span>
						</a>
						<ul>
							<li>
								<a href="#" title="Features">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true" style="font-size: 17px;">
										Maestro
									</span>
								</a>
							</li>
							<li>
								<a href="#" title="Installation">
									<span>
										<span class="glyphicon glyphicon-education" aria-hidden="true" style="font-size: 17px;">
											Grupo
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#" title="Parameters info">
									<span class="glyphicon glyphicon-blackboard" aria-hidden="true" style="font-size: 17px;">
										Aula
									</span>
								</a>
							</li>
							<li>
								<a href="home/materia" title="Alta Materia">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true" style="font-size: 17px;">
										Materia
									</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="topmenu">
						<a href="http://localhost:8080/cetis/index.php/home/inicioHorarios" title="Información sobre el módulo" style="width:154px;">
							<span class="glyphicon glyphicon-calendar" aria-hidden="true" style="font-size: 22px;">
								Horarios
							</span>
						</a>
						<ul>
							<li>
								<a href="http://localhost:8080/cetis/index.php/home/verHorarios" title="Ver horarios">
									<span class="glyphicon glyphicon-eye-open" aria-hidden="true" style="font-size: 17px;">
										Ver
									</span>
								</a>
								<ul>
									<li>
										<a href="http://localhost:8080/cetis/index.php/home/horarioXmaestro" title="Horario por Maestro">
											<span class="glyphicon glyphicon-briefcase" aria-hidden="true" style="font-size: 17px;">
												Maestro
											</span>
										</a>
									</li>
									<li>
										<a href="http://localhost:8080/cetis/index.php/home/horarioXgrupo" title="Horarios por Grupo">
											<span class="glyphicon glyphicon-education" aria-hidden="true" style="font-size: 17px;">
												Grupo
											</span>
										</a>
									</li>
									<li>
										<a href="http://localhost:8080/cetis/index.php/home/horarioXaula" title="Features">
											<span class="glyphicon glyphicon-blackboard" aria-hidden="true" style="font-size: 17px;">
												Aula
											</span>
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" title="Installation">
									<span>
										<span class="glyphicon glyphicon-repeat" aria-hidden="true" style="font-size: 17px;">
											Nuevo
										</span>
									</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
