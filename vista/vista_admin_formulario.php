<?php 

	require_once("../modelo/formularios_modelo.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Admin Formularios</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Squada+One&display=swap" rel="stylesheet"> 
 
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
				<a href="vista_administrador.php" class="navbar-brand link-personalizado"><span class="glyphicon glyphicon-search"></span> Formularios Salutogenesis</a>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav navbar-right nav-personalizado">
					<li><a href="vista_admin_formulario.php">Formularios</a></li>
					<li><a href="vista_admin_usuario.php">Usuarios</a></li>
					<li><a href="vista_admin_buscar.php">Busqueda</a></li>
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
							<div class="contenedo-usuario">
								<img src=""><span class="glyphicon glyphicon-user"></span>
							</div>
							<ul class="dropdown-menu">
								<li><a href="vista_acerca.php">Acerca de</a></li>
								<li><a href="vista_perfil.php">Mi perfil</a></li>
								<li><a href="../controlador/salir_controlador.php">Salir</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div style="text-align: center; font-size: 40px; font-family: 'Squada One', cursive; color: white;">
			<h1>Formularios</h1>
		</div>
		<div class="table-responsive" style="border-radius: 4px;">
			<table class="table tabla-formulario table-hover">
				<thead class="tabla-cabeza">
					<tr class="cabeza-titulo">
						<th>Id</th>
						<th>Titulo</th>
						<th>Descripcion</th>
						<th>Numero Preguntas</th>
						<th>Votos</th>
						<th colspan="2">Opciones</th>
					</tr>
				</thead>

				<?php 

					$insFormulario = new Formulario_modelo();



					if(isset($_GET["pagina1"])){
								if($_GET["pagina1"] == 1){
									header("location: ../vista/vista_admin_formulario.php");
								}else{
									$pagina1 = $_GET["pagina1"];
								}
						}else{
							$pagina1 = 1;
						}

						$tamañoPagina = 5;

		$empezar = ($pagina1 - 1) * $tamañoPagina;

		$numFilas = $insFormulario->obtenerForms();

		$totalPaginas = ceil($numFilas / $tamañoPagina);

					$listaForm = $insFormulario->get_formularios($empezar, $tamañoPagina);

					foreach ($listaForm as $fila ) {

				 ?>
				 <tr class="tabla-elementos">
				 	<td style="font-size: 20px; font-family: 'Squada One', cursive;"><?php echo $fila['idFormularios']; ?></td>
				 	<td><?php echo $fila['nombre']; ?></td>
				 	<td><?php echo $fila['descripcion']; ?></td>
				 	<td><?php echo $fila['numeroPregunta']; ?></td>
				 	<td><?php echo $fila['voto']; ?></td>
				 	<td><a href="vista_admin_actualizar_formulario.php?id=<?php echo $fila['idFormularios'] ?>&titulo=<?php echo $fila['nombre'] ?>&descripcion=<?php echo $fila['descripcion'] ?>"><button class="btn btn-success">Actualizar</button></a></td>
				 	<td><a href="../controlador/administrador_borrar_formulario.php?id=<?php echo $fila['idFormularios'] ?>&preguntas=<?php echo $fila['numeroPregunta'] ?>"><button class="btn btn-danger">Borrar</button></a></td>
				 </tr>
				<?php } ?>
			</table>
		</div>

		<div class="contnedor-paginacion">
	<?php 
		//PAGINACION

	
		echo "<ul class='pagination'>";
		for($i = 1; $i<=$totalPaginas; $i++){

			if($i == $pagina1){
				echo "<li class='disabled'><a>". $i . "</a></li>";
			}else{
				echo "<li><a href='?pagina1=" . $i . "'>". $i . "</a></li>";
			}


			//if($i == 1){
			//	echo "<li class='disabled'><a>". $i . "</a></li>";
			//}else{
		//		echo "<li><a href='?pagina1=" . $i . "'>". $i . "</a></li>";
		//	}

			

		}

		echo "</ul>";





	 ?>
	 </div>	
	</div>


	<div class="footer-principal">
         <div class="footer-iconos">
           <p>Siguenos en: </p>
           <div class="menu-footer">
             <ul style="border-bottom: none;" class="nav nav-tabs menu-redes">
               <li><a href="#"><span class="icon-instagram"> Instagram</a></li>
        		<li><a href="#"><span class="icon-facebook"> Facebook</a></li>
        		<li><a href="#"><span class="icon-whatsapp"> WhatsApp</a></li>
        		<li><a href="#"><span class="icon-twitter"> Twitter</a></li>
              </ul>
            </div>
         </div>
         <div class="panel-footer">
           <h3>Proyectamos S.A.S 2019</h3>
         </div>
       </div>
 
 	<script src="../js/main.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="../js/vendor/bootstrap.min.js"></script>
 </body>
 </html>