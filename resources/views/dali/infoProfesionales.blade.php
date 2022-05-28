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
        <h2 class="text-center">Clasificación de los trastornos de la comunicación según el DSM-5</h2>
        <h3 class="text-center mb-5">(Manual Diagnostico y Estadístico de Trastornos Mentales, 2014)</h3>
        <h4 class="text-center mb-3" style="font-size:24px;"><u>Trastorno del lenguaje</u></h4>
        <ul>
        <li>
        Dificultades persistentes en la adquisición y uso del lenguaje en todas sus modalidades
        (hablado, escrito, lenguaje de signos u otro).
        </li>
        <li>Deficiencias en la comprensión o la producción.</li>
        <li>
        Las capacidades del lenguaje están, desde el punto de vista cuatificable,
        por debajo de lo esperado para la edad.
        </li>
        <li>Limitaciones funcionales en la comunicación eficaz y la participación social.</li>
        <li>El inicio de los signos se produce en las primeras fases del desarrollo.</li>
        <li>Las dificultades no se pueden atribuir a un deterioro auditivo o sensorial, a una
        disfunción motora o a otra afección médica o neurológica y no se explica mejor por
        una Discapacidad Intelectual o retraso global del desarrollo.</li>
        </ul>
        <h4 class="text-center mb-3" style="font-size:24px;"><u>Trastorno fonológico</u></h4>
        <ul>
        <li>
        Dificultad persistente en la producción fonológica que interfiere con la inteligibilidad
        del habla o impide la comunicación verbal de mensajes.
        </li>
        <li>La alteración causa limitaciones en la comunicación eficaz.</li>
        <li>
        El inicio de los signos se produce en las primeras fases del periodo del desarrollo.
        </li>
        <li>Las dificultades no se pueden atribuir a afecciones congénitas o adquiridas.</li>
        </ul>
        <h4 class="text-center mb-3" style="font-size:24px;"><u>Trastorno de la fluidez (tartamudeo), de inicio en la infancia</u></h4>
        <ul>
        <li>
        Alteraciones de la fluidez y organización temporal del habla inadecuada para la edad.
        </li>
        <li>La alteración causa ansiedad al hablar o limitaciones en la comunicación eficaz.</li>
        <li>
        El inicio de los signos se produce en las primeras fases del desarrollo infantil.
        </li>
        <li>
        No se puede atribuir a un déficit motor o sensitivo del habla, a un daño neurológico
        (ictus, tumor, traumatismo) o a otra afección médica y no se explica mejor por otro trastorno mental.</li>
        </ul>
        <h4 class="text-center mb-3" style="font-size:24px;"><u>Trastorno de la comunicación social</u></h4>
        <ul>
        <li>Deficiencias en el uso de la comunicación para propósitos sociales.</li>
        <li>Dificultades persistentes en el uso social de la comunicación verbal y no verbal.</li>
        <li>
        Deterioro en la capacidad para cambiar la comunicación de manera que se adapte al contexto y 
        a las necesidades del que escucha.
        </li>
        <li>Dificultades para seguir las normas de conversación y narración.</li>
        <li>
        Dificultades para comprender lo que no se dice explícitamente (inferir) y
        los significados no literales o ambiguos del lenguaje (expresiones idiomáticas, humor, metáforas).
        </li>
        <li>Las deficiencias causan limitaciones funcionales en la comunicación eficaz.</li>
        <li>
        Los signos comienzan en las primeras fases del desarrollo y no se pueden atribuir a una
        afección médica o neurológica, baja capacidad en los dominios de la morfología y la pragmática.
        </li>
        </ul>
        <h4 class="text-center mb-3" style="font-size:24px;"><u>Trastorno de la comunicación no especificado</u></h4>
        <ul>
        <li>
        No cumplen con todos los criterios del trastorno de comunicación o de ninguno
        de los trastornos de la categoría diagnóstica de los trastornos del desarrollo neurológico.
        </li>
        </ul>
    </div>
    <div class="container infoBackground-3">
        <h2 class="text-center mb-5"><em><u>Características psicolingüísticas de los niños con trastornos del desarrollo del lenguaje</u></em></h2>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <ul>
                    <li>
                        <h5 class="text-monospace">Características fonéticas y fonológicas</h5>
                    </li>
                    <ul>
                    <li><em>Presentan menos verbalizaciones.</em></li>
                    <li><em>
                    Muestran un repertorio reducido de consonantes y vocales
                    con un habla menos inteligible.
                    </em></li>
                    <li><em>
                    Suelen tener problemas para producir los fonemas 
                    de más temprana adquisición, como las consonantes oclusivas, las nasales
                    y las semiconsonantes.
                    </em></li>
                    <li><em>
                    Persistencia de procesos fonológicos inmaduros, en especial,
                    uso irregular de sustituciones.
                    </em></li>
                    </ul>
                </ul>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <ul>
                <li>
                    <h5 class="text-monospace">Características léxicas y semánticas</h5>
                </li>
                    
                <ul>
                    <li><em>Lenta emergencia de palabras funcionales, como artículos y preposiciones.</em></li>
                    <li><em>Usan menos variedad de verbos respecto a lo esperado para la edad.</em></li>
                    <li><em>Los verbos son aprendidos con mayor dificultad.</em></li>
                    <li><em>Lentificación en la adquisición de nuevas palabras y dificultades en su evocación.</em></li>
                </ul>
                </ul>
            </div> 
        </div>
        
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <ul>
                    <li>
                        <h5 class="text-monospace">Características morfosintácticas</h5>
                    </li>
                    <ul>
                    <li><em>Permanencia extendida en la etapa holofrásica 
                    (uso de la frase de dos palabras, combinando sustantivo con verbo).</em></li>
                    <li><em>Aparición de la frase de dos elementos suele ser tardía.</em></li>
                    <li><em>Fallas en el armado de las frases.</em></li>
                    <li><em>Escaso uso de frases sintácticas complejas.</em></li>
                    </ul>
                </ul>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <ul>
                    <li>
                        <h5 class="text-monospace">Características pragmáticas</h5>
                    </li>
                    
                <ul>
                    <li><em>Hacen uso extra de gestos para hacerse entender.</em></li>
                    <li><em>Inician menos temas de conversación y les cuesta sostener diálogos.</em></li>
                    <li><em>Dificultad para adquirir estrategias de participación conversacional,
                    para adecuar sus enunciados a la naturaleza del interlocutor e identificar el cambio de tópico.</em></li>
                    <li><em>Dificultades para la formulación creativa del lenguaje.</em></li>
                </ul>
                </ul>
            </div> 
        </div>
        <div class="row pt-5">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <img src="img/boys_and_girls.png" alt="niños y niñas" width="120px" height="120px">
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