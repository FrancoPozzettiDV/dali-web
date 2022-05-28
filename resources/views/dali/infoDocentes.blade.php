<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Página informativa de DALI para docentes">
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


<main style="background-color:000000;">
    <div class="container-fluid infoBackground-1 text-center">
        <img src="../img/docente.png" class="rounded-circle img-thumbnail shadow-lg"alt="padres" width="200px" height="200px"> 
        <h1 style="text-shadow: 2px 2px #000000;">Docentes</h1>
    </div>
    <div class="container-fluid infoBackground-2">
        <h2 class="text-center mb-5">Adaptaciones escolares para niños con dificultades en la comunicación y el lenguaje</h2>
        <p class="text-center" style="font-size:24px;">
        Los trastornos de la comunicación y el lenguaje ocasionan repercusiones
        que afectan diferentes esferas de la vida de las personas. Entre ellas
        se encuentran:
        </p>
        <p class="text-center" style="font-size:18px;">
            <b>~ Problemas de aprendizaje del código lectoescrito ~</b>
        </p>
        <p class="text-center" style="font-size:18px;">
            <b>~ Descenso de habilidades cognitivas no verbales ~</b>
        </p>
        <p class="text-center" style="font-size:18px;">
            <b>~ Problemas de conducta en niños pequeños ~</b>
        </p>
        <p class="text-center" style="font-size:16px;">
            <b>~ Escaso desarrollo de las habilidades sociales que ocasionan
            la presencia de determinadas conductas (aislamiento y/o agresividad,
            inflexibilidad e hiperactividad) ~</b>
        </p>
        <h2 class="text-center mt-5">
        <em>Una forma de ayudar a estos niños es a través de una enseñanza más estructurada</em>
        </h2>
    </div>
    <div class="container infoBackground-3">
	  <h2 class="text-center mb-5"><em>
	  Esta estructura se diseña en diferentes niveles
	  </em></h2>
      <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12">
              <h3 class="text-monospace">a) Estructura física del entorno</h3>
              <p>Organización del ambiente del aula y espacios de aprendizaje</p>
          </div>
	  </div>
	  <div class="row">
          <div class="col-lg-7 col-md-12 col-sm-12">
              <h3 class="text-monospace">b) Agendas diarias</h3>
              <p class="text-justify">
			  Secuencias de dibujos simples que sirven para anticipar las actividades
			  que vendrán o se usan como recurso para explicar cómo desarrollar
			  una determinada tarea. Su objetivo es brindarles a los niños un marco de
			  predictibilidad del entorno, orden y organización para la vida diaria.
			  </p>
          </div>
		  <div class="col-lg-5 col-md-12 col-sm-12 text-center">
              <img src="img/children.png" alt="niños" width="190px" height="190px">
          </div>
      </div>
      <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12">
              <h3 class="text-monospace">c) Estructura e información visual</h3>
              <p class="text-justify">
			  Existen tres características esenciales para que las actividades sean realizadas
			  en forma satisfactoria. Deben ser:
			  </p>
			  <ol>
				<li>Claras</li>
				<li>Organizadas</li>
				<li>Con instrucciones visuales</li>
			  </ol>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <h3 class="text-monospace">d) Estrategias de intervención por áreas</h3>
          </div>
	  </div>
	  <div class="row">
		  <div class="col-lg-5 col-md-12 col-sm-12">
			<ul>
				<li>
					<h5 class="text-monospace">En relación a la conducta</h5>
				</li>
				<ul>
				  <li><em>Uso de agendas visuales.</em></li>
				  <li><em>Uso de ambientes desprovistos de ruidos.</em></li>
				</ul>
			</ul>
          </div>
		  <div class="col-lg-7 col-md-12 col-sm-12">
              <ul>
			  <li>
					<h5 class="text-monospace">En relación a la comunicación</h5>
				</li>
				
              <ul>
                  <li><em>Hablar lentamente mirando el niño a la cara.</em></li>
                  <li><em>Utilizar frases cortas.</em></li>
				  <li><em>Acompañar el habla con gestos.</em></li>
				  <li><em>Repetir una y otra vez lo mismo.</em></li>
				  <li><em>Subdividir una consigna en pequeñas partes para favorecer la comprensión.</em></li>
				  <li><em>Facilitar la producción brindando gestos y sílabas iniciales para generar la palabra.</em></li>
              </ul>
			  </ul>
          </div> 
	  </div>
	  
	  <div class="row">
		  <div class="col-lg-5 col-md-12 col-sm-12">
			<ul>
				<li>
					<h5 class="text-monospace">En relación a aspectos cognitivos</h5>
				</li>
				<p>El trabajo debe centrarse en 3 factores fundamentales:</p>
				<ul>
				  <li><em>La experiencia directa.</em></li>
				  <li><em>El uso de material concreto.</em></li>
				  <li><em>El uso de facilitadores gráficos.</em></li>
				</ul>
			</ul>
          </div>
		  <div class="col-lg-7 col-md-12 col-sm-12">
              <ul>
				<li>
					<h5 class="text-monospace">En relación a aspectos sociales</h5>
				</li>
				
              <ul>
                  <li><em>La espera de turnos en la comunicación.</em></li>
                  <li><em>Aprender a escuchar a los demás.</em></li>
				  <li><em>Identificar estados de ánimo asociados a distintas situaciones y habilidades de tipos mentalistas y de teoria de la mente, entre otras cosas.</em></li>
              </ul>
			  </ul>
          </div> 
	  </div>
      <div class="row pt-5">
		<div class="col-lg-6 col-md-6 col-sm-6 text-center">
			<img src="img/read_girl.png" alt="niña con libro" width="100px" height="100px">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 text-center">
			<img src="img/read_boy.png" alt="niño con libro" width="100px" height="100px">
		</div>
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