<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="Tarea 1 Krillin" name="description">
	<meta content="Brandon Rojas Sanabria - Felipe Alvarado Solano" name="author">
	<link href="../../favicon.ico" rel="icon">
	<title>Chat</title><!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/estilo.css" rel="stylesheet"><!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center animated swing">Bienvenido al chat</h1>
			<p class="lead text-center">Puedes ingresar con tus datos de usuario o registrarte como un usuario nuevo.</p><!--<div class="well msg"><h2 class="text-center"><?php echo $_GET['msg']; ?></h2></div>-->
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<h2 class="text-center">Ingresar</h2>
							<form action="Ingresar.php" class="form" method="post">
								<div class="form-group">
									<label for="user">Correo Electronico:</label> <input class="form-control" name="email" type="text">
								</div>
								<div class="form-group">
									<label for="pwd">Contraseña:</label> <input class="form-control" name="clave" type="password">
								</div><input class="btn btn-default btn-lg btn-block" type="submit" value="Iniciar sesion">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<h2 class="text-center">Registro</h2>
							<form action="Registrar.php" class="form" method="post">
								<div class="form-group">
									<label for="email">Correo Electronico:</label> <input class="form-control" name="email" type="email">
								</div>
								<div class="form-group">
									<label for="user">Nombre de usuario deseado para la cuenta:</label> <input class="form-control" name="name" type="text">
								</div>
								<div class="form-group">
									<label for="pwd">Contraseña:</label> <input class="form-control" name="pwd" type="password">
								</div>
								<div class="form-group">
									<label for="cpwd">Confirmar Contraseña:</label> <input class="form-control" name="cpwd" type="password">
								</div><input class="btn btn-default btn-lg btn-block" type="submit" value="Registrarse">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script> 
	<script src="js/bootstrap.min.js">
	</script>
</body>
</html>