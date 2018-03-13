<?php
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
    header ("Location: index.php");
}
require dirname(__FILE__) . '/config/config.php';
$con=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB);
if (mysqli_connect_errno())
{
echo "Fallo en conectar: " . mysqli_connect_error();
}

$idContacto=$_GET['id'];
$query="SELECT nombre FROM usuario WHERE id=".$idContacto.";";
$sql = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($sql))
{
$msg[] = $row;
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
	     color:white;
	     background-color:#000819;
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
			<h1 class="text-center animated swing">Chat privado</h1>
			<input type="hidden" id="idContacto" value="<?php echo $_GET['id'];?>" />
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title text-center">Estas chateando con <span id="contacto"><?php echo $msg[0]['nombre'];?></span></h2>
						</div>
						<div class="panel-body">
						    <div class="mensajes"></div>
						</div>
					</div>
					<form>
					  <div class="form-group">
					    <label for="msg">Escribe tu mensaje</label>
					    <input type="msg" class="form-control" id="msg">
					  </div>
					  <a class="btn btn-success" id="btnEnviar" role="button">Enviar</a>
					  <a class="btn btn-default" href="Salacomunal2.php" role="button">Volver a la sala comunal</a>
					  <a class="btn btn-default" id="btnBloqueo" role="button">Bloquear usuario</a>
					  <a class="btn btn-default" id="btnDBloqueo" role="button">Desbloquear</a>
					</form>
					<label id="lblData"></label>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
		function custom_sort(a, b) {
		    return new Date(a.date).getTime() - new Date(b.date).getTime();
		}
		      $.ajax({
		          url: 'ws/cargarMensajes.php?id='+$('#idContacto').val(),
		          success: function(data) {
		          	data.sort(custom_sort);
		            $('.mensajes').empty();
		            $(data).each(function(index, element) {
		            	if($('#idContacto').val()==element.idRemitente){
		            		$('.mensajes').append('<div class="well" style="color:black;width:55%;float:right;">' + (element.msg) + '</div>' );
		            	} else {
		            		$('.mensajes').append('<div class="well" style="color:black;width:55%;float:left;">' + (element.msg) + '</div>' );
		            	}
		            });
		          }
		        });
		    window.setInterval(function(){
		      $.ajax({
		          url: 'ws/cargarMensajes.php?id='+$('#idContacto').val(),
		          success: function(data) {
		          	data.sort(custom_sort);
		            $('.mensajes').empty();
		            $(data).each(function(index, element) {
		            	if($('#idContacto').val()==element.idRemitente){
		            		$('.mensajes').append('<div class="well" style="color:black;width:55%;float:right;">' + (element.msg) + '</div>' );
		            	} else {
		            		$('.mensajes').append('<div class="well" style="color:black;width:55%;float:left;">' + (element.msg) + '</div>' );
		            	}
		            });
		          }
		        });
		    }, 5000);
		    $('#btnEnviar').click(function() {
			  $.ajax({
		            type: 'GET',
		            url: 'ws/InsertarMensaje.php?id='+$('#idContacto').val()+"&msg="+$('#msg').val(),
		            success: function(response) {
		                $('#lblData').html("Mensaje enviado");
		                $('#msg').val("");
		            },
		            error: function(error) {
		                console.log(error);
		            }
	        	});
			});
			 window.setInterval(function(){
		    	$('#lblData').html(" ");
		    }, 5000);
		    $('#btnBloqueo').click(function() {
			  $.ajax({
		            type: 'GET',
		            url: 'ws/bloquearusuario.php?id='+$('#idContacto').val(),
		            success: function(response) {
		                $('#lblData').html("Usuario bloqueado");
		            },
		            error: function(error) {
		                console.log(error);
		            }
	        	});
			});
			 window.setInterval(function(){
		    	$('#lblData').html(" ");
		    }, 5000);
		</script> 
	</div>
</body>
</html>