<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Página de contacto de DALI">
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

<section id="contact">
     <div class="container">
          <div class="row">
               <div class="col-12">
               
               @if ($errors->any())
                <div class="alert alert-danger mt-2">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                </div>
                @endif
                @if(session()->has('success'))
                  <div class="alert alert-success mt-2">
                    {{ session()->get('success') }}
                  </div>
                @elseif(session()->has('failure'))
                  <div class="alert alert-danger mt-2">
                    {{ session()->get('failure') }}
                  </div>
                @endif
                    <!-- SECTION TITLE -->
                    <div class="mt-3 ml-4">
                         <h2>Contactanos!</h2>
                         <p>Sea una sugerencia o un problema por resolver, nos interesa escuchar su propuesta.</p>
                    </div>
               </div>
			</div>
			<div class="row">
               <div class="col-md-7 col-sm-12 mb-3"> 
                    <!-- CONTACT FORM HERE -->
                    <div>
                        <form id="contact-form" action="/contacto" method="POST">
                          @csrf
                              <div class="col-12">
                                   <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                              </div>
                              <div class="col-12">
                                   <input type="email" class="form-control" name="email" placeholder="Email" required>
                              </div>
                              <div class="col-12">
                                   <textarea class="form-control" rows="5" name="message" placeholder="Mensaje" required></textarea>
                              </div>
                              <div class="col-12">
                                   <button id="submit" type="submit" class="form-control">Enviar Mensaje</button>
                              </div>
                        </form>
                    </div>
               </div>

               <div class="col-md-5 col-sm-12">
                    <!-- CONTACT INFO -->
                    <div class="contact-info">
                         <div class="section-title">
                              <h2>Sobre mi</h2>
                              <p>Estudiante programador que no sabe como describirse. Me gusta mucho ayudar. No dudes en enviarme un email ;)</p>
                         </div>
                         
                         <p><i class="fa fa-map-marker"></i> CABA, Argentina</p>
                         <p><i class="fa fa-envelope"></i> <a href="mailto:franco.pozzetti@davinci.edu.ar">franco.pozzetti@davinci.edu.ar</a></p>
                         <p><i class="fa fa-phone"></i> 11-6173-7286</p>
						 <ul class="list-inline">
						 <li class="list-inline-item"><p><a href="#"><i class="fab fa-facebook fa-lg"></i></a></p></li>
						 <li class="list-inline-item"><p><a href="#"><i class="fab fa-twitter fa-lg"></i></a></p></li>
						 <li class="list-inline-item"><p><a href="#"><i class="fab fa-instagram fa-lg"></i></a></p></li>
						 </ul>
                    </div>
               </div>

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