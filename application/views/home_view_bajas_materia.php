<?php include 'home/home_view_cabecera.php'; ?>
		<div class="col-md-10" id="panel-general">
			<center>
					<h2>Dar de baja una Materia</h2>
			</center>
			<table class="table table-hover">
				<thead>
					<tr style="background-color: black; color: white; font-size: 17px;">
						<th><b>ID</b></th>
						<th><b>Nombre de la Materia</b></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0;$i<count($materias);$i++){
						?>
						<tr>
							<th scope='row'><?php echo $materias[$i]['id_materia'] ?> </th>
							<th> <?php echo $materias[$i]['nombre'] ?> </th>
							<?php $id = $materias[$i]['id_materia']; ?>
							<th><?php echo "<a href='http://localhost:8080/cetis/index.php/home/deleteMateria/".$id."' class='btn btn-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a>"?></th>
						</tr>
				<?php } ?>
				</tbody>
			</table>
			<!--foreach ($grupos as $grupo) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(10,5,$x++,'BL',0,'C',$bandera);
      // Se imprimen los datos de cada alumno
      $this->pdf->Cell(25,5,$grupo->nombre,'B',0,'C',$bandera);
      $this->pdf->Cell(18,5,$grupo->cantidad_alumno,'B',0,'C',$bandera);
      $this->pdf->Cell(25,5,$grupo->carrera,'BR',0,'L',$bandera);
      //Se agrega un salto de linea
      $this->pdf->Ln();
      //Alteramos el valor de la variable bandera
      $bandera = !$bandera;
    }-->
		</div>
</div>
<?php include 'home/home_view_pie.php'; ?>