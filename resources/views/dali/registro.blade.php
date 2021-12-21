<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Página de registro de DALI">
    <title>DALI · Franco Pozzetti</title>

    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
    <link href="css/dali.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" 
        crossorigin="anonymous">
  	<!--<script src="js/dali.js"></script>-->
  </head>
  
  <body>
  <header>
	
  <nav class="navbar navbar-expand-md navbar-dark static-top bg-info">
    <a class="navbar-brand" href="<?= route("web.index"); ?>">
	    <img src="dali-logo.png" height="30" width="35" alt="Home">
	  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Info
			</a>
			<div class="dropdown-menu border border-info" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="#">Padres</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="#">Docentes</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="#">Profesionales de salud</a>
			</div>
        </li>
        <li class="nav-item <?=Request::is('actividades') ? 'active' : ''?>">
          <a class="nav-link" href="<?= route("web.activity"); ?>">Actividades</a>
        </li>
		<li class="nav-item <?=Request::is('centros') ? 'active' : ''?>">
          <a class="nav-link" href="<?= route("web.center"); ?>">Centros de Salud</a>
        </li>
		<li class="nav-item <?=Request::is('foro') ? 'active' : ''?>">
          <a class="nav-link" href="<?= route("web.forum"); ?>">Foro</a>
        </li>
        <li class="nav-item <?=Request::is('contacto') ? 'active' : ''?>">
          <a class="nav-link" href="<?= route("web.contact"); ?>">Contacto</a>
        </li>
      </ul>
      <ul class=" navbar-nav ml-auto mt-2 mt-md-0">
		@if(auth()->check())
		@if(auth()->user()->id_perfil == 1)
			<li class="nav-item"><a class="nav-link mr-sm-2" href="<?= route("admin.index"); ?>">Admin</a></li>
		@endif
		<li class="dropdown"><a href="#" class="nav-link" data-toggle="dropdown">{{ auth()->user()->usuario }} <i class="fa fa-caret-down fa-sm"></i></a>
			<ul class="dropdown-menu dropdown-menu-right bg-info">
			<li class="nav-item">
			<a class="nav-link font" href="<?= route("web.logout"); ?>"><i class="fas fa-sign-out-alt fa-md"></i> Cerrar Sesión</a>
			</li>
			</ul>
		</li>
		@else
		<li class="nav-item <?=Request::is('registro') ? 'active' : ''?>"><a class="nav-link mr-sm-2" href="<?= route("web.register"); ?>">Registrarse</a></li>
		<li class="nav-item <?=Request::is('login') ? 'active' : ''?>"><a class="nav-link my-2 my-sm-0" href="<?= route("web.login"); ?>">Iniciar Sesión</a></li>
		@endif
      </ul>
    </div>
  </nav>
</header>

<section id="register">
<div class="bak2">
	@if ($errors->any())
	<div class="alert alert-danger mt-2">
	<ul>
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
	</ul>
	</div>
	@endif
<div class="log">
  <div class="header">
  	<h2 class="justificado">Registro de usuario</h2>
  </div>
	<form action="/registro" method="POST" class="registro" >
		@csrf
		<h1 class="h3 mb-4 font-weight-normal justificado">Únete a nuestra comunidad</h1>
		<div class="form-row">       
		<div class="col">
		<input type="text" name="nombre" class="mb-3 form-control" placeholder="Nombre" autofocus="autofocus" required>
		</div>
		<div class="col">
		<input type="text" name="apellido" class="mb-3 form-control" placeholder="Apellido" required>
		</div>
		</div>
		<div class="form-row">       
		<div class="col">
		<input type="email" name="email" class="mb-3 form-control" placeholder="Email" required>
		</div>
		<div class="col">
		<input type="tel" name="telefono" class="mb-3 form-control" placeholder="Teléfono" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
		</div>
		</div>
		<div class="form-row">       
		<div class="col">
		<input type="text" name="usuario" class="mb-3 form-control" placeholder="Usuario" required>
		</div>
		</div>
		<div class="form-row">  
		<div class="col-10">
		<input type="password" name="password" class="mb-3 form-control" placeholder="Contraseña" required>
		</div>
		<div class="col-2">
		<button type="button" class="btn btn-outline-primary rounded-circle" data-toggle="tooltip" data-placement="right" title="8 caracteres mínimo Combinar letras y números">i</button>
		</div>
		</div>
		<div class="form-row">  
		<div class="col">
		<input type="password" name="password_confirmation" class="mb-3 form-control" placeholder="Confirmar contraseña" required>
		</div>
		</div>
		<button class="btn btn-primary btn-block mb-3" type="submit"><i class="fas fa-user-plus"></i> Registrarse</button>
		<p class= "justificado mb-3" >¿Ya tienes una cuenta? <a href="<?= route("web.login"); ?>">Inicia sesión</a></p>
	</form>
	
  </div>
  </div>

 
</section>


<footer id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Información</h5>
					<ul class="list-unstyled quick-links">
						<li><a href=""><i class="fa fa-angle-double-right"></i>Padres</a></li>
						<li><a href=""><i class="fa fa-angle-double-right"></i>Docentes</a></li>
						<li><a href=""><i class="fa fa-angle-double-right"></i>Prof. Salud</a></li>
						<li><a href=""><i class="fa fa-angle-double-right"></i>Centros</a></li>
						<li><a href=""><i class="fa fa-angle-double-right"></i>Contacto</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Actividades</h5>
					<ul class="list-unstyled quick-links">
						<li><a href=""><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href=""><i class="fa fa-angle-double-right"></i>Fonológico</a></li>
						<li><a href=""><i class="fa fa-angle-double-right"></i>Semántico</a></li>
						<li><a href=""><i class="fa fa-angle-double-right"></i>Morfosintáctico</a></li>
						<li><a href=""><i class="fa fa-angle-double-right"></i>Pragmático</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Sobre DALI</h5>
					<span class="blanco">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis 
					natoque penatibus et magnis dis parturient montes,
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p class="h6">&copy; <?=date('Y');?> All rights Reserved &middot; Franco Pozzetti &middot; <a href="https://www.davinci.edu.ar">Escuela Da Vinci</a></p>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p class="float-right"><a href="#">Back to top</a></p>
				</div>
				<hr>
			</div>	
		</div>
	</footer>

<script src="bootstrap/jquery/jquery-3.5.1.min.js"></script>
<script src="bootstrap/popper/popper.min.js"></script>
<script src="bootstrap/bootstrap/js/bootstrap.min.js"></script>
<!--
<script src="js/dali.js"></script>
Script para mostrar el mensaje de información sobre la contraseña en tooltip
-->
<script>
$(function () {
  	$('[data-toggle="tooltip"]').tooltip()
})
</script>

</body>
</html>