<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Página de actividades de DALI">
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

<main role="main">
<h1 class="text-center mt-2 mb-3">Actividades</h1>
<div class="container">
  <div class="alert alert-info border border-info">
	<div class="row">
    <!--plano-1-->
    <div class="col-lg-6">
    <div class="our-team-main">
    <a href="<?= route("web.activities" , "Fonológico"); ?>">
    <div class="team-front" style="background:#16a085;">
    <img src="https://place-hold.it/110x110/9c27b0/fff&text=DALI&fontsize=20" class="img-fluid" />
    <h3 class="blanco">Fonológico</h3>
    </div>
    
    <div class="team-back">
    <span>
    Acá encontrarán actividades para trabajar los sonidos que forman las palabras
    </span>
    </div>
    </a>
    </div>
    </div>
    <!--plano-1-->
    
    <!--plano-2-->
    <div class="col-lg-6">
    <div class="our-team-main">
    <a href="<?= route("web.activities" , "Semántico"); ?>">
    <div class="team-front" style="background:#e67e22;">
    <img src="https://place-hold.it/110x110/336699/fff&text=DALI&fontsize=20" class="img-fluid" />
    <h3 class="blanco">Semántico</h3>
    </div>
    
    <div class="team-back">
    <span>
    Acá encontrarán actividades para trabajar las palabras y sus significados, y cómo estas 
	palabras en un orden determinado forman una oración
    </span>
    </div>
    </a>
    </div>
    </div>
    <!--plano-2-->
    
    <!--plano-3-->
    <div class="col-lg-6">
    <div class="our-team-main">
    <a href="<?= route("web.activities" , "Morfosintáctico"); ?>">
    <div class="team-front" style="background:#2980b9;">
    <img src="https://place-hold.it/110x110/e67e22/fff&text=DALI&fontsize=20" class="img-fluid" />
    <h3 class="blanco">Morfosintáctico</h3>
    </div>
    
    <div class="team-back">
    <span>
    Acá encontrarán actividades para trabajar las diferentes estructuras de las oraciones
    </span>
    </div>
    </a>
    </div>
    </div>
    <!--plano-3-->
    
    <!--plano-4-->
    <div class="col-lg-6">
    <div class="our-team-main">
    <a href="<?= route("web.activities" , "Pragmático"); ?>">
    <div class="team-front" style="background:#8e44ad;">
    <img src="https://place-hold.it/110x110/4caf50/fff&text=DALI&fontsize=20" class="img-fluid" />
    <h3 class="blanco">Pragmático</h3>
    </div>
    
    <div class="team-back">
    <span>
    Acá encontrarán actividades para trabajar el uso social y funcional del lenguaje
    </span>
    </div>
    </a>
    </div>
    </div>
    <!--plano-4-->
    
    
    <!--plano-5-->
    @if(auth()->check())
    @if(auth()->user()->id_perfil != 2)
    <div class="col-lg-12">
    <div class="our-team-main">
    <a href="<?= route("web.activities" , "Prem"); ?>">
    <div class="team-front" style="background:#d62246;">
    <img src="https://place-hold.it/110x110/607d8b/fff&text=DALI&fontsize=20" class="img-fluid" />
    <h3 class="blanco">Actividades Premium</h3>
    <p class="blanco">Para usuarios en tratamiento</p>
    </div>
    
    <div class="team-back">
    <span>
    Acá encontrarán actividades para trabajar en los distintos planos lingüísticos 
	de una manera significativa y contextual
    </span>
    </div>
    </a>
    </div>
    </div>
    @endif
    @endif
    <!--plano-5-->

  </div>
	</div>
</div>
<h2 class="text-center mb-3">Material terapeutico</h2>
<div class="container">
	<div class="alert alert-primary border-primary">
		<p class="font-weight-bold"><i class="fas fa-exclamation-circle"></i> En caso de que quiera reforzar el desarrollo y avance del lenguaje con materiales tangibles, los siguientes sitios proveen lo necesario:</p>
		<hr>
		<ul class="">
		  <li class="font-italic font-weight-bold"><a href="http://lectografia.com.ar/">Lectografía</a></li>
		  <li class="font-italic font-weight-bold"><a href="http://blog.jel-aprendizaje.com/">JEL-Aprendizaje</a></li>
		  <li class="font-italic font-weight-bold"><a href="https://www.fono.ar/">Fonología</a></li>
		  <li class="font-italic font-weight-bold"><a href="https://www.tienda.ludme.com.ar">LUDME</a></li>
		  <li class="font-italic font-weight-bold"><a href="https://www.jugas.com.ar">Jugás</a></li>
		  <li class="font-italic font-weight-bold"><a href="https://www.oralpuppet.com.ar">Oral Puppet</a></li>
		</ul>
	</div>
</div>
  
</main>

@include('dali/footer')

<script src="bootstrap/jquery/jquery-3.5.1.min.js"></script>
<script src="bootstrap/popper/popper.min.js"></script>
<script src="bootstrap/bootstrap/js/bootstrap.min.js"></script>
<!--<script src="js/dali.js"></script>-->

</body>
</html>