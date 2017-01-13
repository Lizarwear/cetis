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

</body>
</html>