<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Página principal de DALI">
    <title>DALI · Franco Pozzetti</title>
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
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

<main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/difundir.png" class="d-block img-fluid" alt="slide-1">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>D - Difundir.</h1>
            <p>1º Proposito: Difundir información acerca del desarrollo lingüístico normal.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../img/ayudar.png" class="d-block img-fluid" alt="slide-2">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>A - Ayudar.</h1>
            <p>2º Proposito: Ayudar en la detección de alteraciones.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../img/lograr.png" class="d-block img-fluid" alt="slide-3">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>L - Lograr.</h1>
            <p>3º Proposito: Lograr intervenciones eficientes con resultados significativos.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../img/incluir.png" class="d-block img-fluid" alt="slide-4">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>I - Incluir.</h1>
            <p>4º Proposito: Incluir para fortalecer la interacción comunicativa con sus pares.</p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="container marketing">

    
    <div class="row">
      <div class="col-lg-4">
        <img src="../img/father.png" class="rounded-circle" width="140" height="140" alt="padre">
        <h2>Padres</h2>
        <p><a class="btn btn-primary" href="<?= route("web.parents"); ?>" role="button">Detalles &raquo;</a></p>
      </div>
      <div class="col-lg-4">
        <img src="../img/professor.png" class="rounded-circle" width="140" height="140" alt="docente">
        <h2>Docentes</h2>
        <p><a class="btn btn-primary" href="<?= route("web.teachers"); ?>" role="button">Detalles &raquo;</a></p>
      </div>
      <div class="col-lg-4">
        <img src="../img/medic.png" class="rounded-circle" width="140" height="140" alt="doctora">
        <h2>Profesionales</h2>
        <p><a class="btn btn-primary" href="<?= route("web.professionals"); ?>" role="button">Detalles &raquo;</a></p>
      </div>
    </div>


    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-lg-7 col-md-6 col-sm-12">
        <h2 class="">Comunicación y Lenguaje</h2>
        <p class="lead text-justify">
          Ambos representan dos conceptos diferenciados y a la vez superpuestos.
          <br>
          El lenguaje es instrumento de la comunicación.
          <br>
          <ul>
          <li>El termino <b>lenguaje</b> se utiliza para designar la capacidad del ser humano de comunicarse y de representar la realidad mediante signos convencionales.</li>
          <br>
          <li>
          El termino <b>comunicación</b> puede definirse como el intercambio de información, o puesta en común de significaciones intencionadas en una relación humana determinada.</li>
          </ul>
          <br>
          En la construcción del lenguaje se diferencian los planos que lo conforman. Los mismos tienen un desarrollo simultaneo y todos son solidarios con todos para su organización y su uso.
        </p>
      </div>
      <div class="col-lg-5 col-md-6 col-sm-12">
      <img src="../img/talking.png" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" alt="charla">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Retraso</h2>
        <p class="lead text-justify">
          El retraso simple del lenguaje consiste en un desfasaje cronológico leve, devolución transitoria con afectación de la fonología. 
          <br>
          Presenta una mejoría rápida a la terapia y con poca repercusión en el aprendizaje de la lectoescritura.
        </p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="../img/reading.png" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="400" height="400" alt="leyendo">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">TDL</h2>
        <p class="lead text-justify">
          El <b>Trastorno del Desarrollo del Lenguaje</b> es de caracter primario, duradero y con características diversas.
          <br>
          Es una alteración de los mecanismos de adquisición del lenguaje desde sus inicios, que se prolonga durante la infancia y adolescencia,
          pudiendo llegar incluso a dejar secuelas en la edad adulta.
          <br>
          Esta alteración no se explica por déficit intelectual, neurológico, sensorial o emocional ni por un trastorno generalizado del desarrollo.
        </p>
      </div>
      <div class="col-md-5 order-md-1">
      <img src="../img/cubitos.png" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="400" height="400" alt="cubitos de letras">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Descarga nuestra App <span class="text-muted">Disponible en Android</span></h2>
        <p class="lead">Maneja tus turnos y obtené contacto directo con profesionales fonoaudiólogos</p>
      </div>
      <div class="col-md-5">
        <img src="../img/dalimobile500.png" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" alt="app">
      </div>
    </div>

    <hr class="featurette-divider">

  </div>
</main>


@include('dali/footer')

<script src="bootstrap/jquery/jquery-3.5.1.min.js"></script>
<script src="bootstrap/popper/popper.min.js"></script>
<script src="bootstrap/bootstrap/js/bootstrap.min.js"></script>
<!--<script src="js/dali.js"></script>-->

</body>
</html>