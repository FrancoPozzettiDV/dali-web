<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sección administrativa de centros de salud">
  <title>DALI-Admin · Franco Pozzetti</title>

  <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
  <link href="../css/dali.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" 
        crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style>
    .m-b-1em{ margin-bottom:1em; }
  </style>

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
        <li class="nav-item <?=Request::is('*/centros') ? 'active' : ''?>">
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
    <a href='<?= route("admin.centroNew"); ?>' class='btn btn-success m-b-1em float-right my-4'><i class='fas fa-plus'></i> Crear centro</a>
    <h1 class="display-4 mt-2">Centros de salud</h1>
    <hr>
    <!-- MODAL -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel"> Eliminar Centro</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
      <form action="<?= route("admin.centroDelete"); ?>" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <h5>¿Está usted de acuerdo con la eliminación?</h5>
          <small>Esta acción no se puede revertir</small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
      </form>
      </div>
    </div>
    </div>
    <!-- MODAL -->
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
            <th scope='col'>Nombre</th>
            <th scope='col'>Dirección</th>
            <th scope='col'>Teléfono</th>
            <th scope='col'>Acción</th>
			    </tr>
			  </thead>
        <?php
          foreach($centros as $centroSalud):
        ?>
        <tr>
          <td scope='row'><?= $centroSalud->id ?></td>
					<td><?= $centroSalud->nombre ?></td>
					<td><?= $centroSalud->direccion ?></td>
				  <td><?= $centroSalud->telefono ?></td>
					<td>
						<!--EDIT-->
            <a href='<?= route("admin.centroEdit" , $centroSalud->id); ?>' class='btn btn-primary m-1'><i class='fas fa-edit'></i> Edit</a>
						<!--DELETE-->
            <button type='button' class='btn btn-danger deletebtn m-1' data-toggle='modal' data-target='#deleteModal' data-centro='<?= $centroSalud->id; ?>'><i class='fas fa-trash-alt'></i> Delete</button>
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


<!--Scripts para mostrar DataTable y Modal para la eliminación de registros -->
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
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('centro') // Extract info from data-* attributes
    var modal = $(this)
    modal.find('.modal-body input').val(id)
    })
</script>

</body>
</html>
