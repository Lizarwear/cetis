<?php include 'cabecera.php'; ?>
<body>
	<div class="container well" id="sha">
		<center>
			<div class="row">
				<div class="col-xs-12">
					<img src="http://localhost:8080/cetis/image/login.png" class="img-responsive" id="avatar">
				</div>
			</div>
		<!--http://www.tutosytips.com/imagenes-e-iconos-en-bootstrap-3-->
		</center>
		<br>
		<!--div class="panel-body" align="center"-->
			<!--?php echo form_open('auth/index'); ?>
			<?php //$error = form_error("username", "<p class='text-danger'>", '</p>'); ?>-->
		<form class="login" action="http://localhost:8080/cetis/index.php/verifylogin" method="POST">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Usuario" id="username" name="username" required autofocus/>
			</div>
			<!--label id="hide" for="password">Password: </label-->
			<!--<?php //$error = form_error("password", "<p class='text-danger'>", '</p>'); ?>-->
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Contraseña" id="password" name="password" required/>
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