<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Página de olvido de contraseñas de DALI">
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
        <li class="nav-item dropdown <?=Request::is('padres') || Request::is('docentes') || Request::is('profesionales') ? 'active' : ''?>">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Info
			</a>
			<div class="dropdown-menu border border-info" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="<?= route("web.parents"); ?>">Padres</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="<?= route("web.teachers"); ?>">Docentes</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="<?= route("web.professionals"); ?>">Profesionales de salud</a>
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

<section id="forgot-pass">
<div class="bak2">
	@if ($errors->any('email'))
	<div class="alert alert-danger mt-2">
		{{$errors->first('email')}}
	</div>
	@elseif(session()->has('status'))
	<div class="alert alert-success mt-2">
		{{ session()->get('status') }}
	</div>
	@endif
<div class="log">
<div class="header">
  	<h2 class="justificado">Recuperar contraseña</h2>
</div>
<form action="" method="POST" class="mt-5 mb-5">
	@csrf
	<h1 class="h3 mb-4 font-weight-normal justificado ">Ingrese su email</h1>
	
	<input type="email" name="email" class="form-control mb-3" placeholder="Email" autofocus="autofocus" required>
	
	<button class="btn btn-success btn-block" type="submit"><i class="fas fa-envelope"></i> Enviar</button>
</form> 

</div>
</div>
  
</section>

@include('dali/footer')

<script src="bootstrap/jquery/jquery-3.5.1.min.js"></script>
<script src="bootstrap/popper/popper.min.js"></script>
<script src="bootstrap/bootstrap/js/bootstrap.min.js"></script>
<!--<script src="js/dali.js"></script>-->

</body>
</html>