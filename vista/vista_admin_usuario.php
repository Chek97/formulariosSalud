<?php 

	include_once "../modelo/usuario.php";
	include_once "../modelo/session.php";
	include_once "../controlador/usuarios_controlador.php";

	$sessionUsuario = new Session();
	$usuario = new Usuario();
	//$musuario = new Usuarios_modelo();


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Admin Usuarios</title>
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/main.css">

    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-personalizado"> 
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target="#menu">
					<span class="icon-bar app-bar"></span>
					<span class="icon-bar app-bar"></span>
					<span class="icon-bar app-bar"></span>
				</button>
				<a href="#" class="navbar-brand link-personalizado"><span class="glyphicon glyphicon-search"></span> Formularios Salutogenesis</a>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav navbar-right nav-personalizado">
					<li><a href="#">Formularios</a></li>
					<li><a href="vista_admin_usuario.php">Usuarios</a></li>
					<li><a href="#">Exportar</a></li>
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
							<div class="contenedo-usuario">
								<img src=""><span class="glyphicon glyphicon-search"></span>
							</div>
							<ul class="dropdown-menu">
								<li><a href="">Acerca de</a></li>
								<li><a href="">Mi perfil</a></li>
								<li><a href="">Salir</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!--TABLA DE USUARIOS-->	
	<div class="container">
		<div style="text-align: center; font-size: 40px;">
			<h1>Usuarios</h1>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
						<tr>
							<th>ID</th>
							<th>Usuario</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Correo</th>
							<th>Celular</th>
							<th>Contraseña</th>
							<th>Fecha Nacimiento</th>
							<th>Sexo</th>
							<th colspan="2" style="text-align: center;">Opciones</th>
						</tr>
						</thead>
						<?php 
							$sesion = $sessionUsuario->getSession();

							//$listaUsuarios = $musuario->get_usuarios();

							foreach ($listaUsuarios as $registro ) {
								
							
						 ?>
					<tr>
					<td><?php echo $registro['idUsuario']; ?></td>
					<td id="nombreUsu"><?php echo $registro['usuario']; ?></td>
					<td><?php echo $registro['nombre']; ?></td>
					<td><?php echo $registro['apellido']; ?></td>
					<td><?php echo $registro['correo']; ?></td>
					<td><?php echo $registro['celular']; ?></td>
					<td><?php echo $registro['contraseña']; ?></td>
					<td><?php echo $registro['fecha']; ?></td>
					<td><?php echo $registro['sexo']; ?></td>
					<td><a href="vista_actualizar_usuarios.php?valor=<?php echo $registro['usuario']; ?>"><button class="btn btn-success">Actualizar</button></a></td>
					<td><button class="btn btn-danger" data-toggle="modal" data-target="#borrar">Borrar</button></td>
							
					</tr>

						 <?php 
						 	}

						  ?>
					</table>
				</div>
				<div style="text-align: center; background-color: green;">
						<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#crear" style="margin: 20px;">Agregar</button>
				</div>

				<div class="modal fade" id="crear">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
								<h3>Crear Nuevo Usuario</h3>
							</div>
							<div class="modal-body">
								<form class="">
									<div class="form-group">
										<label>Usuario</label>
										<div class="input-group">
											<div class="input-group-addon">@</div>
											<input type="text" name="regUsu" class="form-control" placeholder="Cris12">
										</div>
									</div>
									<div class="form-group">
										<label>Nombre</label>
										<div class="input-group">
											<div class="input-group-addon">@</div>
											<input type="text" name="regNom" class="form-control" placeholder="Cristian">
										</div>
									</div>
									<div class="form-group">
										<label>Apellido</label>
										<div class="input-group">
											<div class="input-group-addon">@</div>
											<input type="text" name="regApe" class="form-control" placeholder="Checa">
										</div>
									</div>
									<div class="form-group">
										<label>Correo</label>
										<div class="input-group">
											<div class="input-group-addon">@</div>
											<input type="email" name="regCorr" class="form-control" placeholder="555@hotmail.com">
										</div>
									</div>
									<div class="form-group">
										<label>Celular</label>
										<div class="input-group">
											<div class="input-group-addon">@</div>
											<input type="text" name="regCel" class="form-control" placeholder="82216">
										</div>
									</div>
									<div class="form-group">
										<label>Contraseña</label>
										<div class="input-group">
											<div class="input-group-addon">@</div>
											<input type="password" name="regContra" class="form-control" placeholder="user15">
										</div>
									</div>
									<div class="form-group">
										<label>Fecha</label>
										<div class="input-group">
											<div class="input-group-addon">@</div>
											<input type="date" name="regFecha" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label>Sexo</label>
										<br>
										<label>
											<input type="radio" name=""> Masculino
											<input type="radio" name=""> Femenino
										</label>
										</div>
									
								</form>
							</div>
							<div class="modal-footer">
									<button class="btn btn-success">Aceptar</button>
									<button class="btn btn-default" data-dismiss="modal">Cancelar</button>

							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
	<script src="../js/main.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="../js/vendor/bootstrap.min.js"></script>

</body>
</html>