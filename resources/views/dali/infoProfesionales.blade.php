<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Página informativa de DALI para profesionales">
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
        <img src="../img/doctora.png" class="rounded-circle img-thumbnail shadow-lg"alt="padres" width="200px" height="200px"> 
        <h1 style="text-shadow: 2px 2px #000000;">Profesionales</h1>
    </div>
    <div class="container-fluid infoBackground-2">
        <h2 class="text-center mb-5">Desarrollo de la comunicación y el lenguaje</h2>
        <p class="text-center" style="font-size:24px;">
            En el desarrollo normal del lenguaje del niño, es fundamental
            como padres estar alertas a ciertos signos que pueden llegar
            a indicar algún tipo de alteración a futuro.
        </p>
    </div>
    <div class="container infoBackground-3">
        <h2 class="text-center mb-5"><em><u>Pautas de Alarma</u></em></h2>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <h3 class="text-monospace">De 0 a 3 meses</h3>
                <ul>
                    <li><em>No reacciona ante sonidos ni a la voz.</em></li>
                    <li><em>No sonrie.</em></li>
                    <li><em>No mantiene el contacto ocular.</em></li>
                    <li><em>No emite vocalizaciones.</em></li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <h3 class="text-monospace">De 6 a 12 meses</h3>
                <ul>
                    <li><em>Falta o poca cantidad de balbuceos.</em></li>
                    <li><em>No responde a los cambios de entonación del adulto.</em></li>
                    <li><em>No gira al oír su nombre.</em></li>
                    <li><em>No comprende palabras familiares de su entorno.</em></li>
                    <li><em>No señala.</em></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <h3 class="text-monospace">De 12 a 18 meses</h3>
                <ul>
                    <li><em>Irritabilidad y rabietas frecuentes.</em></li>
                    <li><em>No aparecen las primeras palabras.</em></li>
                    <li><em>Incomprensión de órdenes acompañadas de gestos.</em></li>
                    <li><em>No se comunica a través de gestos "adíos", "no", etc.</em></li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 text-center">
                <img src="../img/bebe.png" alt="bebe" width="130px" height="130px">
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <h3 class="text-monospace">De 2 a 3 años</h3>
                <ul>
                    <li><em>Uso de frases de una sola palabra.</em></li>
                    <li><em>Preferencia en el uso de gestos en lugar de palabras o vocalizaciones.</em></li>
                    <li><em>No utiliza el "yo".</em></li>
                    <li><em>No comprende órdenes simples.</em></li>
                    <li><em>Cuesta entender lo que dice.</em></li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <h3 class="text-monospace">De 3 a 4 años</h3>
                <ul>
                    <li><em>Presenta un habla difícil de entender fuera de su contexto familiar.</em></li>
                    <li><em>No utiliza frases de más de 2 palabras.</em></li>
                    <li><em>No realiza preguntas del tipo ¿Qué?, ¿Dónde?, etc.</em></li>
                    <li><em>Dificultad de relación con otros niños.</em></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 text-center">
                <img src="../img/kids.png" alt="niños" width="130px" height="130px">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <h3 class="text-monospace">De 4 a 5 años</h3>
                <ul>
                    <li><em>Dificultad para jugar con el lenguaje (adivinanzas, veo-veo, etc.).</em></li>
                    <li><em>Le cuesta relatar hechos sencillos.</em></li>
                </ul>
            </div>  
        </div>
        <h5 class="text-center pt-5 pb-5 text-primary">
            Si tu bebé ya tiene más de 18 meses y aún no balbucea, 
            te recomendamos algunas actividades que favorecerán su habla:
        </h5>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card text-center border-dark mb-2" style="height: 10rem;">
                    <div class="card-header bg-primary text-white border-dark"><h6>Juego de los sonidos</h6></div>
                    <div class="card-body">
                        <p class="card-text">
                            Imitación de animales o cosas. 
                            Se recomienda también la utilización de imágenes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card text-center border-dark mb-2" style="height: 10rem;">
                    <div class="card-header bg-primary text-white border-dark"><h6>Imitación de gestos</h6></div>
                    <div class="card-body">
                        <p class="card-text">
                            Ponerse frente al espejo y hacer gestos 
                            faciales y linguales.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card text-center border-dark mb-2" style="height: 10rem;">
                    <div class="card-header bg-primary text-white border-dark"><h6>Parafrasear</h6></div>
                    <div class="card-body">
                        <p class="card-text">
                            Poner palabras a todas las acciones que vaya 
                            realizando para que los vaya asociando.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card text-center border-dark mb-2" style="height: 10rem;">
                    <div class="card-header bg-primary text-white border-dark"><h6>Canto</h6></div>
                    <div class="card-body">
                        <p class="card-text">
                            Elegir canciones con temas divertidos 
                            y con las que puedan bailar.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card text-center border-dark mb-2" style="height: 10rem;">
                    <div class="card-header bg-primary text-white border-dark"><h6>Cuentos</h6></div>
                    <div class="card-body">
                        <p class="card-text">
                            Buscar libros con animales o personajes
                            que conozca para que practiquen los sonidos.
                        </p>
                    </div>
                </div>
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