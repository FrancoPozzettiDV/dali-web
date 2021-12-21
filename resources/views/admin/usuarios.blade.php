<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sección administrativa de usuarios">
  <title>DALI-Admin · Franco Pozzetti</title>

  <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
  <link href="../css/dali.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" 
        crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

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
        <li class="nav-item">
          <a class="nav-link" href="<?= route("admin.centros"); ?>">Centros</a>
        </li>
        <li class="nav-item <?=Request::is('*/usuarios') ? 'active' : ''?>">
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
    <h1 class="display-4 mt-2">Lista de Usuarios</h1>
    <hr>
    @if(session()->has('success'))
      <div class="alert alert-success mt-2">
        {{ session()->get('success') }}
      </div>
    @elseif(session()->has('failure'))
      <div class="alert alert-danger mt-2">
        {{ session()->get('failure') }}
      </div>
    @endif
    <!-- TABLE -->
    <div class='table-responsive'>
			<table class='table table-hover table-bordered' id='dTable'>
			  <thead class='thead-light'>
			    <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Usuario</th>
            <th scope='col'>Email</th>
            <th scope='col'>Categoria</th>
            <th scope='col'>Acción</th>
			    </tr>
			  </thead>
        <?php
          foreach($users as $usuario):
        ?>
        <tr>
          <td scope='row'><?= $usuario->id ?></td>
					<td><?= $usuario->usuario ?></td>
					<td><?= $usuario->email ?></td>
				  <td><?= ucfirst($usuario->categoria) ?></td>
					<td>
						<!--READ-->
            <a href='<?= route("admin.usuarioRead" , $usuario->id); ?>' class='btn btn-info m-1'><i class='far fa-eye'></i> Read</a>
					</td>
        </tr>
        <?php 
          endforeach;
        ?>
      </table>
    </div>
    <!-- TABLE -->
  
  </div>
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2021-2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
  <!-- FOOTER -->
</main>
<script src="../bootstrap/jquery/jquery-3.5.1.min.js"></script>
<script src="../bootstrap/popper/popper.min.js"></script>
<script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>


<!--Script para mostrar DataTable  -->
<script>
	$(document).ready(function() {
		$('#dTable').DataTable({
			'pagingType': 'full_numbers',
			"order": [[ 0, "desc" ]],
			'lengthMenu': [
				[10,25,50,-1],
				[10,25,50,"All"]
			],
			responsive: true,
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Buscar registro",
			}
		});
	} );
</script>

</body>
</html>
