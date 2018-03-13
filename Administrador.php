<?php
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
    header ("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="../../favicon.ico" rel="icon">
	<title>Chat</title><!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/estilo.css" rel="stylesheet"><!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<style type="text/css">
	   body{
	     background-image: url("img/bg1.jpg");
	     background-size: cover;
	   }
	   .panel{
	     color:black;
	     background-color:#e3ecf2;
	   }
	   .panel-title{
	     color: black;
	     font-size:2em;
	   }
	   a{
	     color: green;
	   }
	   a:hover{
	     color: lightgreen;
	   }
	</style>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center animated swing">Sala General</h1>
			<input type="hidden" id="id" value="<?php echo $_SESSION['Id'];?>" />
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title text-center">Usuarios en linea</h2>
						</div>
						<div class="panel-body">
							<table class="table">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Estado</th>
										<th>Enviar correo</th>
									</tr>
								</thead>
								<tbody class="listaonline">
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<a class="btn btn-danger btn-block" href="Salir.php" role="button">Cerrar sesion.</a>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
		      $.ajax({
		          url: 'ws/cargarUsuarios.php?estatus=1', 
		          success: function(data) {
		            $('.listaonline').empty();
		            $(data).each(function(index, element) {
		               $('.listaonline').append('<tr><td>' + (element.nombre) + '</td><td>Fuera de linea</td><td><a href=Correo.php?nom='+ (element.nombre) + '>Enviar alerta mail</a></td></tr>' );
		            });
		          }
		        });
		    window.setInterval(function(){
		      $.ajax({
		          url: 'ws/cargarUsuarios.php?estatus=1', 
		          success: function(data) {
		            $('.listaonline').empty();
		            $(data).each(function(index, element) {
		               $('.listaonline').append('<tr><td>' + (element.nombre) + '</td><td>Fuera de linea</td><td><a href=Correo.php?nom='+ (element.nombre) + '>Enviar alerta mail</a></td></tr>' );
		            });
		          }
		        });
		    }, 5000);
		</script> 
	</div>
</body>
</html>