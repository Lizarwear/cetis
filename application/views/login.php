<?php include 'cabecera.php'; ?>
<body>
	<div class="container well" id="sha">
		<center>
			<div class="row">
				<div class="col-xs-12">
					<img src="image/login.png" class="img-responsive" id="avatar">
				</div>
			</div>
		<!--http://www.tutosytips.com/imagenes-e-iconos-en-bootstrap-3-->
		</center>
		<br>
		<form class="login" action="#" method="POST">
			<div class="form-group">
				<input type="email" class="form-control" placeholder="Usuario" name="email" required autofocus/>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Contraseña" name="pass" required/>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">
				Iniciar Sesión
			</button>
			<div class="checkbox">
				<p class="help-block">
					<a href="#">¿No puedes acceder a tu cuenta?</a>
				</p>
			</div>
		</form>
	</div>
</body>
<?php include 'pie.php'; ?>