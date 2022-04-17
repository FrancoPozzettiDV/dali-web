<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Página de centros de salud de DALI">
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

<section id="center">
  <div id="map" style="width: 100%; height: 400px;" data-coordenadas='<?php echo $coordenadas; ?>'></div>
	<hr>	
  <div class="container justificado">
	  <div class="row">
		  <div class="col-12 mb-2"><h1>Centros</h1></div>
	  </div>
	<div class="row justify-content-center mt-3">
		<p><b>Los siguientes centros de salud realizan consultas gratuitas...</b></p>
	</div>
		  
	  <div class="row">
	  <?php
		foreach($centros as $centro):   
		?>        
		  <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center mb-3">
		    <div class="card-deck">
			    <div class="card border-primary" style="width: 18rem;">
			      <div class="card-header bg-transparent border-primary"><h3><?php echo $centro->id; ?><h3>
			    </div>
			    <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><h5 class="card-title"><?php echo $centro->nombre; ?></h5></li>
              <li class="list-group-item"><p class="card-text"><i class="fas fa-map-marker-alt"></i><?php echo " ".$centro->direccion; ?></p></li>
              <li class="list-group-item"><p class="card-text"><i class="fas fa-phone"></i><?php echo " ".$centro->telefono; ?></p></li>
            </ul>
			    </div>
			    <div class="card-footer text-muted">
				    <a href="<?php echo $centro->web; ?>" target="_blank"><b>Sitio Web </b></a>
			    </div>
			  </div>
		  </div>
		
		</div>
	  <?php
		endforeach;
	  ?>
  </div>  

  </div>
</section>

@include('dali/footer')

<script src="bootstrap/jquery/jquery-3.5.1.min.js"></script>
<script src="bootstrap/popper/popper.min.js"></script>
<script src="bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIxADrLxS9okXXoIDlstQVi4-d9jbXu58&callback=initMap&v=weekly" async defer></script>
<!--<script src="js/dali.js"></script>-->
<script>
function initMap(){
  
  const buenosAires = { lat: -34.60652333513447, lng: -58.449489310334386 };
  let map = new google.maps.Map(document.getElementById("map"), {
    center: buenosAires,
    zoom: 12,
  });
	
  
  var gMap = document.getElementById("map");
  var coordenadas = gMap.dataset.coordenadas;
  var json_coordenadas = JSON.parse(coordenadas)
  
  
  for (var i = 0; i < json_coordenadas.length; i++) {
		var data = json_coordenadas[i];
		var myLatlng = new google.maps.LatLng(data.latitud, data.longitud);
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			label: `${i + 1}`,
			optimized: false,
		});
  }
	
}

</script>

</body>
</html>