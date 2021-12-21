<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sección administrativa de lectura de usuario">
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
        <li class="nav-item">
          <a class="nav-link" href="<?= route("admin.centros"); ?>">Centros</a>
        </li>
        <li class="nav-item <?=Request::is('*/usuarios/*') ? 'active' : ''?>">
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
    <h1 class="display-4 mt-2">Datos de Usuario</h1>
    <hr>
    <!-- MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel"> Cambiar Permiso</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
      <form action="<?= route("admin.usuarioRead", $user->id); ?>" method="POST">
        @csrf
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Seleccionar Permiso:</label>
            <select class="form-control" name ="id_perfil" id="id_perfil">
              <?php
              if($user->categoria == "usuario"):
                echo '<option value="3">Paciente</option>';
                echo '<option value="4">Profesional</option>';
              elseif($user->categoria == "paciente"):
                echo '<option value="2">Usuario</option>';
                echo '<option value="4">Profesional</option>';
              elseif($user->categoria == "profesional"):
                echo '<option value="2">Usuario</option>';
                echo '<option value="3">Paciente</option>';
              endif;
              ?>
            </select>
				</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Cambiar</button>
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
    <table class='table table-hover table-bordered'>
    <tr>
      <td>Usuario</td>
      <td><?php echo htmlspecialchars($user->usuario, ENT_QUOTES); ?></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><?php echo htmlspecialchars($user->nombre, ENT_QUOTES); ?></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><?php echo htmlspecialchars($user->apellido, ENT_QUOTES); ?></td>
    </tr>
    <tr>
      <td>Teléfono</td>
      <td><?php echo htmlspecialchars($user->telefono, ENT_QUOTES); ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo htmlspecialchars($user->email, ENT_QUOTES); ?></td>
    </tr>
    <tr>
      <td>Categoria</td>
      <td><?php echo htmlspecialchars(ucfirst($user->categoria), ENT_QUOTES); ?></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <a href='<?= route("admin.usuarios"); ?>' class='btn btn-danger'>Volver</a>
        <button type='button' data-toggle='modal' data-target='#editModal' class='btn btn-primary m-1 editbtn' data-usuario='<?= $user->id; ?>'><i class='fas fa-edit'></i> Cambiar Permiso</a>
      </td>
    </tr>
  </table>
    <!-- TABLE -->
  
  </div>
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2021-2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
  <!-- FOOTER -->
</main>
<script src="../../bootstrap/jquery/jquery-3.5.1.min.js"></script>
<script src="../../bootstrap/popper/popper.min.js"></script>
<script src="../../bootstrap/bootstrap/js/bootstrap.min.js"></script>

<!--Script para mostrar Modal para el cambio de permisos -->
<script>
   $(document).ready(function (){
    $('#editModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('usuario') // Extract info from data-* attributes
      var modal = $(this)
      modal.find('.modal-body input').val(id)
    });
		});

    
</script>

</body>
</html>
