<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<center>
				<h2>Dar de alta un maestro</h2>
			</center>
			<form class="form-inline" id="alta_maestro" name="alta_maestro" action="http://localhost:8080/cetis/index.php/home/addMaestro" method="POST">
				<fieldset>
				<legend style="font-size: 18px;"><b>Datos Generales</b></legend>
				  <div class="form-group">
				    <label for="nombre_maestro">Nombre</label>
				    <input type="text" class="form-control" id="nombre_maestro" name="nombre_maestro" placeholder="Nombre" required>
				  </div>
				  <div class="form-group">
				    <label for="apellido_paterno_y_materno">Apellido Paterno</label>
				    <input type="text" class="form-control" id="apellido_paterno_y_materno" name="apellido_paterno" placeholder="Apellido Paterno">
				  </div>
				  <div class="form-group">
				    <label for="apellido_paterno_y_materno">Apellido Materno</label>
				    <input type="text" class="form-control" id="apellido_paterno_y_materno" name="apellido_materno" placeholder="Apellido Materno">
				  </div>
				  <div class="form-group">
				    <label for="rfc_maestro">RFC</label>
				    <input type="text" class="form-control" id="rfc_maestro" name="rfc_maestro" placeholder="RFC" required pattern="[A-Z]{4}[0-9]{6}[A-Z0-9]{3}" maxlength="13" onkeyup="javascript:this.value=this.value.toUpperCase();">
				  </div>
				  <div class="form-group">
				  <br>
				    <label for="disponibilidad_trabajo">Disponibilidad de trabajo</label>
				    <select class="form-control" name="disponibilidad_trabajo" name="disponibilidad_trabajo" onchange="
				    	if(this.options[1].selected){
				    		document.getElementById('hora').style.display='block';
				    		document.getElementById('asignatura').style.display='none';
				    	}else{
				    		if(this.options[2].selected){
				    			document.getElementById('hora').style.display='none';
				    			document.getElementById('asignatura').style.display='block';
				    		}else{
								document.getElementById('hora').style.display='none';
				    			document.getElementById('asignatura').style.display='none';
				    		}
				    	}
				    	">
				    	<option selected="">Ninguna</option>
				    	<option>Por hora</option>
				    	<option>Por asignatura</option>
				    </select>
				    <div style="float: right;">
					    <div id="hora" style="display:none;">
							<input type="text" class="form-control" id="hora" name="hora" style="width: 70px;" placeholder="Horas">
						</div>
						<div id="asignatura" style="display:none;">
							<select class="form-control" name="asignatura">
								<option>Completas</option>
								<option>Compactas</option>
							</select>
						</div>
					</div>
				  </div>
				  <div class="form-group">
				  	<br>
				    <label for="clave_presupuestal">Clave Presupuestal</label>
				    <!--input type="text" class="form-control" id="clave_presupuestal" placeholder="Clave Presupuestal"-->
				    <select class="form-control" name="clave_presupuestal" onchange="
				    	if(this.options[1].selected){
				    		document.getElementById('clave1').style.display='block';
				    		document.getElementById('clave2').style.display='none';
				    		document.getElementById('clave3').style.display='none';
				    	}else{
				    		if(this.options[2].selected){
				    			document.getElementById('clave1').style.display='none';
				    			document.getElementById('clave2').style.display='block';
				    			document.getElementById('clave3').style.display='none';
				    		}else{
				    			if(this.options[3].selected){
				    				document.getElementById('clave1').style.display='none';
				    				document.getElementById('clave2').style.display='none';
				    				document.getElementById('clave3').style.display='block';
				    			}else{
				    				document.getElementById('clave1').style.display='none';
				    				document.getElementById('clave2').style.display='none';
				    				document.getElementById('clave3').style.display='none';
				    			}
				    		}
				    	}
				    	">
				    	<option selected="">0</option>
				    	<option>1</option>
				    	<option>2</option>
				    	<option>3</option>
				    </select>
				    <div style="float: right;">
					    <div id="clave1" style="display:none;">
							<input type="text" class="form-control" id="clave_presupuestal_1" name="clave1_1" style="width: 165px;" placeholder="Clave Presupuestal 1">
						</div>
						<div id="clave2" style="display:none;">
							<input type="text" class="form-control" id="clave_presupuestal_1" name="clave1_2" style="width: 165px;" placeholder="Clave Presupuestal 1">
							<input type="text" class="form-control" id="clave_presupuestal_2" name="clave2_2" style="width: 165px;" placeholder="Clave Presupuestal 2">
						</div>
						<div id="clave3" style="display:none;">
							<input type="text" class="form-control" id="clave_presupuestal_1" name="clave1_3" style="width: 165px;" placeholder="Clave Presupuestal 1">
							<input type="text" class="form-control" id="clave_presupuestal_2" name="clave2_3" style="width: 165px;" placeholder="Clave Presupuestal 2">
							<input type="text" class="form-control" id="clave_presupuestal_3" name="clave3_3" style="width: 165px;" placeholder="Clave Presupuestal 3">
						</div>
					</div>
				  </div>
				  <br>
				  <div class="form-group">
				  <br>
				    <label for="sexo_maestro">Sexo</label>
				    <select class="form-control" name="sexo_maestro">
				    	<option>Masculino</option>
				    	<option>Femenino</option>
				    </select>
				  </div>
				  <div class="form-group">
				  <br>
				    <label for="curp_maestro">CURP</label>
				     <input type="text" class="form-control" id="curp_maestro" name="curp_maestro" placeholder="CURP" required pattern="[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}" maxlength="18" onkeyup="javascript:this.value=this.value.toUpperCase();" style="width: 190px;">
				  </div>
				  <div class="form-group">
				  <br>
				    <label for="email_maestro">Email</label>
				     <input type="email" class="form-control" name="email_maestro" id="email_maestro" placeholder="Correo Electrónico" style="width: 280px;">
				  </div>
				  <div class="form-group">
				  <br>
				    <label for="telefono_maestro">Teléfono</label>
				     <input type="text" class="form-control" name="telefono_maestro" id="telefono_maestro" placeholder="Teléfono" pattern="[0-9]{10}" style="width: 115px;">
				  </div>
				</fieldset>
				<br>
				<fieldset>
					<legend style="font-size: 18px;"><b>Datos Domicilio</b></legend>
					<div class="form-group">
			    		<label for="calle_maestro">Calle</label>
			     		<input type="text" class="form-control" name="calle_maestro" id="calle_maestro" placeholder="Calle" required style="width: 220px;">
			  		</div>
			  		<div class="form-group">
			    		<label for="numero_calle_maestro">Número</label>
			     		<input type="text" class="form-control" id="numero_calle_maestro" name="numero_calle_maestro" placeholder="Número" required style="width: 80px;">
			  		</div>
			  		<div class="form-group">
			    		<label for="colonia_maestro">Colonia</label>
			     		<input type="text" class="form-control" id="colonia_maestro" name="colonia_maestro" placeholder="Colonia" required style="width: 180px;">
			  		</div>
			  		<div class="form-group">
			    		<label for="localidad_maestro">Localidad</label>
			     		<input type="text" class="form-control" id="localidad_maestro" name="localidad_maestro" placeholder="Localidad" required style="width: 180px;">
			  		</div>
			  		<div class="form-group">
			    		<label for="estado_maestro">Estado</label>
			     		<input type="text" class="form-control" id="estado_maestro" name="estado_maestro" placeholder="Estado" required style="width: 160px;">
			  		</div>
				</fieldset>
				<br>
				<fieldset>
					<legend style="font-size: 18px;"><b>Desempeño en la Institución</b></legend>
					<div class="form-group">
			    		<label for="funcion_maestro">Funcion</label>
			     		<select class="form-control" name="funcion_maestro" onchange="
			     			if(this.options[3].selected){
				    			document.getElementById('administrativo').style.display='block';
				    		}else{
				    			document.getElementById('administrativo').style.display='none';
				    		}
			     		">
			     			<option selected="">Ninguna</option>
			     			<option>Docente</option>
			     			<option>Técnico Docente</option>
			     			<option>Administrativo</option>
			     			<option>Con descarga</option>
			     		</select>
			     		<div style="float: right;">
						    <div id="administrativo" style="display:none;">
								<select class="form-control" name="tipo_administrativo">
									<option>Contador</option>
									<option>Secretari@</option>
									<option>Algún otro</option>
								</select>
							</div>
						</div>
			  		</div>
			  		<div class="form-group">
			    		<label for="tipo_maestro">Tipo</label>
			     		<select class="form-control" name="tipo_maestro">
			     			<option>Base</option>
			     			<option>Temporal</option>
			     		</select>
			  		</div>
			  		<div class="form-group" id="timetotime">
			    		<label for="horario_maestro_desde">Disponibilidad de Horario desde</label>
			    		<select class="form-control" name="hora_inicio" id="hora_inicio" onchange="
			    			frm = document.alta_maestro;
			    			ord = frm.hora_inicio.selectedIndex;
			    			switch(ord){
			    				case 0:
			    					frm.hora_final.options[0].disabled = true;
			    					frm.hora_final.options[1].disabled = false;
			    					frm.hora_final.options[2].disabled = false;
			    					frm.hora_final.options[3].disabled = false;
			    					frm.hora_final.options[4].disabled = false;
			    					frm.hora_final.options[5].disabled = false;
			    					frm.hora_final.options[6].disabled = false;
			    					frm.hora_final.options[7].disabled = false;
			    					frm.hora_final.options[8].disabled = false;
			    					frm.hora_final.options[9].disabled = false;
			    					frm.hora_final.options[10].disabled = false;
			    					break;
			    				case 1:
			    					frm.hora_final.options[0].disabled = true;
			    					frm.hora_final.options[1].disabled = true;
			    					frm.hora_final.options[2].disabled = false;
			    					frm.hora_final.options[3].disabled = false;
			    					frm.hora_final.options[4].disabled = false;
			    					frm.hora_final.options[5].disabled = false;
			    					frm.hora_final.options[6].disabled = false;
			    					frm.hora_final.options[7].disabled = false;
			    					frm.hora_final.options[8].disabled = false;
			    					frm.hora_final.options[9].disabled = false;
			    					frm.hora_final.options[10].disabled = false;
			    					break;
			    				case 2:
			    					frm.hora_final.options[0].disabled = true;
			    					frm.hora_final.options[1].disabled = true;
			    					frm.hora_final.options[2].disabled = true;
			    					frm.hora_final.options[3].disabled = false;
			    					frm.hora_final.options[4].disabled = false;
			    					frm.hora_final.options[5].disabled = false;
			    					frm.hora_final.options[6].disabled = false;
			    					frm.hora_final.options[7].disabled = false;
			    					frm.hora_final.options[8].disabled = false;
			    					frm.hora_final.options[9].disabled = false;
			    					frm.hora_final.options[10].disabled = false;
			    					break;
			    				case 3:
			    					frm.hora_final.options[0].disabled = true;
			    					frm.hora_final.options[1].disabled = true;
			    					frm.hora_final.options[2].disabled = true;
			    					frm.hora_final.options[3].disabled = true;
			    					frm.hora_final.options[4].disabled = false;
			    					frm.hora_final.options[5].disabled = false;
			    					frm.hora_final.options[6].disabled = false;
			    					frm.hora_final.options[7].disabled = false;
			    					frm.hora_final.options[8].disabled = false;
			    					frm.hora_final.options[9].disabled = false;
			    					frm.hora_final.options[10].disabled = false;
			    					break;
			    				case 4:
			    					frm.hora_final.options[0].disabled = true;
			    					frm.hora_final.options[1].disabled = true;
			    					frm.hora_final.options[2].disabled = true;
			    					frm.hora_final.options[3].disabled = true;
			    					frm.hora_final.options[4].disabled = true;
			    					frm.hora_final.options[5].disabled = false;
			    					frm.hora_final.options[6].disabled = false;
			    					frm.hora_final.options[7].disabled = false;
			    					frm.hora_final.options[8].disabled = false;
			    					frm.hora_final.options[9].disabled = false;
			    					frm.hora_final.options[10].disabled = false;
			    					break;
			    				case 5:
			    					frm.hora_final.options[0].disabled = true;
			    					frm.hora_final.options[1].disabled = true;
			    					frm.hora_final.options[2].disabled = true;
			    					frm.hora_final.options[3].disabled = true;
			    					frm.hora_final.options[4].disabled = true;
			    					frm.hora_final.options[5].disabled = true;
			    					frm.hora_final.options[6].disabled = false;
			    					frm.hora_final.options[7].disabled = false;
			    					frm.hora_final.options[8].disabled = false;
			    					frm.hora_final.options[9].disabled = false;
			    					frm.hora_final.options[10].disabled = false;
			    					break;
			    				case 6:
			    					frm.hora_final.options[0].disabled = true;
			    					frm.hora_final.options[1].disabled = true;
			    					frm.hora_final.options[2].disabled = true;
			    					frm.hora_final.options[3].disabled = true;
			    					frm.hora_final.options[4].disabled = true;
			    					frm.hora_final.options[5].disabled = true;
			    					frm.hora_final.options[6].disabled = true;
			    					frm.hora_final.options[7].disabled = false;
			    					frm.hora_final.options[8].disabled = false;
			    					frm.hora_final.options[9].disabled = false;
			    					frm.hora_final.options[10].disabled = false;
			    					break;
			    				case 7:
			    					frm.hora_final.options[0].disabled = true;
			    					frm.hora_final.options[1].disabled = true;
			    					frm.hora_final.options[2].disabled = true;
			    					frm.hora_final.options[3].disabled = true;
			    					frm.hora_final.options[4].disabled = true;
			    					frm.hora_final.options[5].disabled = true;
			    					frm.hora_final.options[6].disabled = true;
			    					frm.hora_final.options[7].disabled = true;
			    					frm.hora_final.options[8].disabled = false;
			    					frm.hora_final.options[9].disabled = false;
			    					frm.hora_final.options[10].disabled = false;
			    					break;
			    				case 8:
			    					frm.hora_final.options[0].disabled = true;
			    					frm.hora_final.options[1].disabled = true;
			    					frm.hora_final.options[2].disabled = true;
			    					frm.hora_final.options[3].disabled = true;
			    					frm.hora_final.options[4].disabled = true;
			    					frm.hora_final.options[5].disabled = true;
			    					frm.hora_final.options[6].disabled = true;
			    					frm.hora_final.options[7].disabled = true;
			    					frm.hora_final.options[8].disabled = true;
			    					frm.hora_final.options[9].disabled = false;
			    					frm.hora_final.options[10].disabled = false;
			    					break;
			    				case 9:
			    					frm.hora_final.options[0].disabled = true;
			    					frm.hora_final.options[1].disabled = true;
			    					frm.hora_final.options[2].disabled = true;
			    					frm.hora_final.options[3].disabled = true;
			    					frm.hora_final.options[4].disabled = true;
			    					frm.hora_final.options[5].disabled = true;
			    					frm.hora_final.options[6].disabled = true;
			    					frm.hora_final.options[7].disabled = true;
			    					frm.hora_final.options[8].disabled = true;
			    					frm.hora_final.options[9].disabled = true;
			    					frm.hora_final.options[10].disabled = false;
			    					break;
			    				case 10:
			    					frm.hora_final.options[0].disabled = true;
			    					frm.hora_final.options[1].disabled = true;
			    					frm.hora_final.options[2].disabled = true;
			    					frm.hora_final.options[3].disabled = true;
			    					frm.hora_final.options[4].disabled = true;
			    					frm.hora_final.options[5].disabled = true;
			    					frm.hora_final.options[6].disabled = true;
			    					frm.hora_final.options[7].disabled = true;
			    					frm.hora_final.options[8].disabled = true;
			    					frm.hora_final.options[9].disabled = true;
			    					frm.hora_final.options[10].disabled = true;
			    					break;
			    			}
			    		">
			    			<option selected>6:00 AM</option>
			    			<option>7:00 AM</option>
			    			<option>8:00 AM</option>
			    			<option>9:00 AM</option>
			    			<option>10:00 AM</option>
			    			<option>11:00 AM</option>
			    			<option>12:00 PM</option>
			    			<option>1:00 PM</option>
			    			<option>2:00 PM</option>
			    			<option>3:00 PM</option>
			    			<option>4:00 PM</option>
			    		</select>
			    		<label for="horario_maestro_hasta">hasta</label>
			    		<select class="form-control" name="hora_final" id="hora_final">
			    			<option>6:00 AM</option>
			    			<option>7:00 AM</option>
			    			<option>8:00 AM</option>
			    			<option>9:00 AM</option>
			    			<option>10:00 AM</option>
			    			<option>11:00 AM</option>
			    			<option>12:00 PM</option>
			    			<option>1:00 PM</option>
			    			<option>2:00 PM</option>
			    			<option>3:00 PM</option>
			    			<option selected>4:00 PM</option>
			    		</select>
			  		</div>
				</fieldset>
				<br>
				<fieldset>
					<legend style="font-size: 18px;"><b>Perfil Profesiográfico</b></legend>
					<div class="form-group">
			    		<label for="nivel_academico">Nivel Académico</label>
			    		<select class="form-control" name="nivel_academico">
			     			<option>Bachiller</option>
			     			<option>Técnico Superior Universitario</option>
			     			<option>Licenciado(a)</option>
			     			<option>Maestría</option>
			     			<option>Doctor(a)</option>
			     		</select>
			     		<select class="form-control" name="carrera_academico">
			     			<option>Actuaría</option>
			     			<option>Actuaría Financiera</option>
			     			<option>Aeronáutica</option>
			     			<option>Aeronáutico</option>
			     			<option>Agrícola</option>
			     			<option>Agrícola Ambiental</option>
			     			<option>Agronomía</option>
			     			<option>Agrónomo</option>
			     			<option>Alimentos</option>
			     			<option>Ambiental</option>
			     			<option>Arquitecto</option>
			     			<option>Automotriz</option>
			     			<option>Automatización</option>
			     			<option>Biomédica</option>
			     			<option>Bioquímica</option>
			     			<option>Cibernética</option>
			     			<option>Ciencias Computacionales</option>
			     			<option>Ciencias de la Informática</option>
			     			<option>Ciencias Matemáticas</option>
			     			<option>Civil</option>
			     			<option>Comunicaciones y Electrónica</option>
			     			<option>Computación</option>
			     			<option>Contaduría</option>
			     			<option>Contaduría Pública</option>
			     			<option>Diseño Gráfico</option>
			     			<option>Diseñador Industrial</option>
			     			<option>Economía Agrícola</option>
			     			<option>Educación Media Superior con especialidad en Física</option>
			     			<option>Educación Media Superior con especialidad en Matemáticas</option>
			     			<option>Eléctrica</option>
			     			<option>Electricista</option>
			     			<option>Electromecánica</option>
			     			<option>Electromecánico</option>
			     			<option>Electrónica</option>
			     			<option>Energía</option>
			     			<option>Farmacéutica</option>
			     			<option>Financiera</option>
			     			<option>Física</option>
			     			<option>Física y Matemáticas</option>
			     			<option>Física Aplicada</option>
			     			<option>Finanzas</option>
			     			<option>Geofísica</option>
			     			<option>Geofísico</option>
			     			<option>Geológica</option>
			     			<option>Geólogo</option>
			     			<option>Hidráulico</option>
			     			<option>Hidrológica</option>
			     			<option>Industrial</option>
			     			<option>Industrial Eléctrico</option>
			     			<option>Industrial Mecánico</option>
			     			<option>Industrial Químico</option>
			     			<option>Industrial y de Sistemas</option>
			     			<option>Informática</option>
			     			<option>Maestro Normalista con especialidad en Matemáticas</option>
			     			<option>Maestro Normalista con especialidad en Física</option>
			     			<option>Matemáticas</option>
			     			<option>Matemáticas Aplicadas</option>
			     			<option>Metalurgia y Minerales</option>
			     			<option>Metalúrgico</option>
			     			<option>Matemáticas Computacionales</option>
			     			<option>Mecánica</option>
			     			<option>Mecánico</option>
			     			<option>Mecánico Electricista</option>
			     			<option>Mecánico en Térmica</option>
			     			<option>Mecánico Naval</option>
			     			<option>Mecatrónica</option>
			     			<option>Minas Metalurgista</option>
			     			<option>Nuclear</option>
			     			<option>Petrolera</option>
			     			<option>Petrolero</option>
			     			<option>Química</option>
			     			<option>Químico</option>
			     			<option>Químico Metalúrgico</option>
			     			<option>Redes</option>
			     			<option>Sistemas</option>
			     			<option>Sistemas Ambientales</option>
			     			<option>Sistemas Computacionales</option>
			     			<option>Sistemas de Energía</option>
			     			<option>Telecomunicaciones</option>
			     			<option>Telemática</option>
			     			<option>Textil</option>
			     			<option>Topográfico</option>
			     			<option>Topógrafo e Hidrógrafo</option>
			     			<option>Topógrafo y Geodesta</option>
			     		</select>
			  		</div>
			  		<div class="form-group">
			    		<label for="especialidad">Área</label>
			     		<input type="text" class="form-control" name="especialidad" id="especialidad" placeholder="Área" required style="width: 350px;">
			  		</div>
			  		<br>
			  		<br>
				</fieldset>
				<br>
			  <button type="submit" class="btn btn-primary" id="boton" >Agregar</button>
			</form>			
		</div>
	</div>
<?php include 'home/home_view_pie.php'; ?>