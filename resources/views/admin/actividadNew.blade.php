<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sección administrativa de creación de actividades">
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
        <li class="nav-item <?=Request::is('*/actividades/*') ? 'active' : ''?>">
          <a class="nav-link" href="<?= route("admin.actividades"); ?>">Actividades</a>
        </li>
        <li class="nav-item">
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
    <h1 class="display-4 mt-2">Crear Actividad</h1>
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
    @if(session()->has('failure'))
      <div class="alert alert-danger mt-2">
        {{ session()->get('failure') }}
      </div>
    @endif
    <form action="<?= route("admin.actividadNew"); ?>" method="post" enctype="multipart/form-data">
		@csrf
    <table class='table table-hover table-bordered'>
        <tr>
          <td>Nombre</td>
          <td><input required type='text' name='name' class='form-control'/></td>
        </tr>
        <tr>
          <td>Plano Lingüistico</td>
          <td>
          <select required name='plano' class='form-control'>
            <option value="" selected disabled>Plano</option>
            <option value="Fonológico">Fonológico</option>
            <option value="Semántico">Semántico</option>
            <option value="Morfosintáctico">Morfosintáctico</option>
            <option value="Pragmático">Pragmático</option>
          </select>
          </td>
        </tr>
        <tr>
            <td>Rango Edad</td>
            <td>
            <select required name='edad' class='form-control'>
              <option value="" selected disabled>Edad</option>
              <option value="2 años">2 años</option>
              <option value="De 3 a 4 años">De 3 a 4 años</option>
              <option value="De 5 a 6 años">De 5 a 6 años</option>
              <option value="Mayor de 7 años">Mayor de 7 años</option>
            </select>
            </td>
        </tr>
		    <tr>
            <td>¿Actividad exclusiva?</td>
            <td>
            <div class="form-check form-check-inline">
              <input required class="form-check-input" type="radio" name="exclusivo" id="inlineRadio1" value="3">
              <label class="form-check-label" for="inlineRadio1">Sí</label>
            </div>
            <div class="form-check form-check-inline">
              <input required class="form-check-input" type="radio" name="exclusivo" id="inlineRadio2" value="2">
              <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
            </td>
        </tr>
		    <tr>
            <td>Archivo</td>
            <td><input required type='file' name='archivo' class='form-control-file' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
              <a href='<?= route("admin.actividades"); ?>' class='btn btn-danger'>Cancelar</a>
				      <input type='submit' value='Crear' class='btn btn-success' />
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

</body>
</html>
