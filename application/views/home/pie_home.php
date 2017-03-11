<script type="text/javascript">
	
	

		
				
		$(document).on('change', '.qq', function(e){
			var semestre=($(this.selectedOptions[0]).attr('data-semestre'))
			console.log($('#semestre').val())
			$('#semestre').val(semestre);
		})

$(document).ready(function(){
	$('#semestre').val('');
//$('#select_materia').val('');

});
	
</script>

 	<script type="text/javascript">
				  $('#maestro___').change(function(){
				var id= $('#maestro___').val();
				console.log(id);
				var info={id: id};
				$.ajax({
						url:'../../clases/rutas.php',
						type: 'post',
						data: {action: 'select', info: info},
						success: function (data) {
							 var datas= JSON.parse(data);
							console.log(datas[0][0]);
							console.log(datas[0][1]);
							console.log(datas[0][2]);

							

							
							//$('#cla__2').$(this).val(datas[0][1]);
							//$('#cla__3').$(this).val(datas[0][2]);
						//

							document.getElementById("cla__1").value = datas[0][0];
							document.getElementById("cla__1").text = datas[0][0];

							document.getElementById("cla__2").value = datas[0][1];
							document.getElementById("cla__2").text = datas[0][1];

							document.getElementById("cla__3").value = datas[0][2];
							document.getElementById("cla__3").text = datas[0][2];
						//$('#cla__1').value(datas[0][0]);
						//document.getElementById("cla__2").value = printStrin (datas[0][1]);
						//	document.getElementById("cla__3").value = datas[0][2];
						// DESPLEGAR LAS CLAVES PRESUPUESTALES EN EL SELECT,  E INSERTAR EN LA BASE DE DATOS 
						// COMO SI SE LE FUERAN A AGREGAR AL MAESTRO PERO ESTA VEZ A SU CLAVE PRESUPUESTAL
							
						}
					});//fin ajax
				 });
				
					
					

	</script>



	
	<script type="text/javascript">
				  $('#clave_horas_').change(function(){
				  //	alert();
				 $('#clave_horas_').val();
				var clave= $('#clave_horas_').val();
				console.log(clave);


				var info={clave: clave};
				$.ajax({
						url:'../../../clases/rutas.php',
						type: 'post',
						data: {action: 'clave', info: info},
						success: function (data) {
							 var datas= JSON.parse(data);
							 console.log(datas[0][2]);
							 document.getElementById("hora_total_").value = datas[0][2];
							document.getElementById("hora_total_").text = datas[0][2];
							

						}
					});//fin ajax
				 });
				
					
					

	</script>


</body>
</html>