<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sección administrativa de edición de centros de salud">
  <title>DALI-Admin · Franco Pozzetti</title>

  <link rel="stylesheet" href="../../bootstrap/bootstrap/css/bootstrap.min.css">
  <link href="../../css/dali.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" 
        crossorigin="anonymous">
</head>
  
<body>
<!--NAVBAR -->
<header>
  <nav class="navbar navbar-expand-md navbar-dark static-top bg-dark">
    <a class="navbar-brand" href="<?= route("admin.index"); ?>">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= route("admin.actividades"); ?>">Actividades</a>
        </li>
        <li class="nav-item <?=Request::is('*/centros/*') ? 'active' : ''?>">
          <a class="nav-link" href="<?= route("admin.centros"); ?>">Centros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= route("admin.usuarios"); ?>">Usuarios</a>
        </li>
      </ul>
	  <ul class=" navbar-nav ml-auto mt-2 mt-md-0">
        <li class="nav-item blanco">
        <a class="nav-link" href="<?= route("web.index"); ?>">Volver a DALI</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!--NAVBAR -->

<main role="main">
	<div class="container">
    <h1 class="display-4 mt-2">Editar Centro de Salud</h1>
    <hr>
    @if ($errors->any())
      <div class="alert alert-danger mt-2">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
      </div>
    @endif 
    <form action="<?= route("admin.centroEdit" , $centro->id); ?>" method="post">
    @method('PUT')
		@csrf
    <table class='table table-hover table-bordered'>
        <tr>
            <td>Nombre</td>
            <td><input required type='text' name='name' class='form-control' value="<?php echo htmlspecialchars($centro->nombre, ENT_QUOTES); ?>" /></td>
        </tr>
        <tr>
            <td>Dirección</td>
            <td><textarea name='address' class='form-control' required><?php echo htmlspecialchars($centro->direccion, ENT_QUOTES);  ?></textarea></td>
        </tr>
        <tr>
            <td>Teléfono</td>
            <td><input required type='text' name='phone' class='form-control' value="<?php echo htmlspecialchars($centro->telefono, ENT_QUOTES);  ?>"/></td>
        </tr>
		    <tr>
            <td>Web</td>
            <td><input required type='text' name='web' class='form-control' value="<?php echo htmlspecialchars($centro->web, ENT_QUOTES);  ?>"/></td>
        </tr>
		    <tr>
            <td>Latitud</td>
            <td><input required type='text' name='latitude' id='latitude' class='form-control' value="<?php echo htmlspecialchars($centro->latitud, ENT_QUOTES);  ?>"/></td>
        </tr>
		    <tr>
            <td>Longitud</td>
            <td><input required type='text' name='longitude' id='longitude' class='form-control' value="<?php echo htmlspecialchars($centro->longitud, ENT_QUOTES);  ?>"/></td>
        </tr>
		    <tr>
            <td>Mapa</td>
            <td>
			        <div id="map" style="width:100%; height:300px"></div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
              <a href='<?= route("admin.centros"); ?>' class='btn btn-danger'>Cancelar</a>
				      <input type='submit' value='Editar' class='btn btn-primary' />
            </td>
        </tr>
		</table>
		</form>
  
  
  </div>
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2021-2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<script src="../../bootstrap/jquery/jquery-3.5.1.min.js"></script>
<script src="../../bootstrap/popper/popper.min.js"></script>
<script src="../../bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIxADrLxS9okXXoIDlstQVi4-d9jbXu58&callback=initialize&v=weekly" async defer></script>

<!--Script para mostrar el mapa de google y obtener latitud y longitud mediante click -->
<script>
	function initialize(){
    $(document).ready(function(){
    var latEdit = document.getElementById('latitude').value;
    var lngEdit = document.getElementById('longitude').value;
    var mapCenter;
    if(latEdit == null && lngEdit == null){
      mapCenter = { lat: -34.60652333513447, lng: -58.449489310334386 };
    }else{
      mapCenter = new google.maps.LatLng(latEdit,lngEdit);
    }
    
    var mapEdit = new google.maps.Map(document.getElementById("map"),{
      center: mapCenter,
      zoom: 15,
    });
    
    var marker;
    
    mapEdit.addListener('click',function(event){
    document.getElementById('latitude').value = event.latLng.lat(); 
    document.getElementById('longitude').value = event.latLng.lng(); 
    if(marker == null){
      marker = new google.maps.Marker({
      map: mapEdit,
      position: event.latLng,
    });
    }else{
      marker.setPosition(event.latLng);
    }
      
    });
    
    
    });
    
  }
</script>

</body>
</html>
