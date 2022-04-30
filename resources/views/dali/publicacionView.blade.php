<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Página de publicaciones del foro de DALI">
    <title>DALI · Franco Pozzetti</title>

    <link rel="stylesheet" href="../../bootstrap/bootstrap/css/bootstrap.min.css">
    <link href="../../css/dali.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" 
        crossorigin="anonymous">
  	<!--<script src="../../js/dali.js"></script>-->
  </head>
  
  <body>
  <header>
	
  <nav class="navbar navbar-expand-md navbar-dark static-top bg-info">
    <a class="navbar-brand" href="<?= route("web.index"); ?>">
	    <img src="../../dali-logo.png" height="30" width="35" alt="Home">
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
		<li class="nav-item <?=Request::is('foro/*') ? 'active' : ''?>">
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

<section id="forumPub">
<?php 
	require_once("funciones.php");
?>
<div class='container mb-5'>
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
<a class="btn btn-outline-primary rounded-pill mt-2" href="<?= route("web.forumCat",$categoria->id); ?>"><i class="fas fa-arrow-circle-left"></i> Volver a <?=$categoria->nombre?></a>
	<div class="card <?=rolBorder($publicacion->id_perfil)?> mt-2">
		<div class="card-body">
			<h2 class="card-title"><?=$publicacion->nombre?></h2>
			<h5 class="card-subtitle mb-2 text-muted">Escrito por: <?=$publicacion->usuario ?></h5>
			@if(auth()->user()->id_perfil == 1)
				<button type="button" class="card-subtitle btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#blockPubModal" data-publicacion="<?=$publicacion->id?>">Bloquear</button>
			@endif
			<hr>
			<p class="card-text"><?=nl2br($publicacion->descripcion)?></p>
		</div>
		<div class="card-footer text-muted"><?= $publicacion->fecha ?></div>
	</div>
	<form action="<?=Request::url();?>" method="post">
		@csrf
		<table class="table table-bordered mt-2">
			<input type="hidden" name="id_pub" value="<?=$publicacion->id?>" class="form-control"></input>
			<input type="hidden" name="id_usuario" value="{{ auth()->user()->id }}" class="form-control"></input>
			<input type="hidden" name="id_cat" value="<?=$categoria->id?>" class="form-control"></input>
			<tr>
				<td><textarea required rows="4" name="comentario" class="form-control" placeholder="Ingresar comentario"></textarea></td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Comentar" class="btn btn-success float-right" />
				</td>
			</tr>
			</table>
	</form>
			
	<div class="container">
	
	@foreach($comentarios as $com)

	<div class="card <?=rolBorder($com->id_perfil) ?> mt-2 mb-4">
		<div class="card-body"> <!-- Para mostrar en orden inverso: $comentarios->firstItem() + $loop->index -->
			<h4 class="card-title">{{($comentarios->total() - $loop->index)-(($comentarios->currentPage()-1) * $comentarios->perPage() )}} <?=" - ".$com->usuario;?></h4>
			@if(auth()->user()->id_perfil == 1)
				@if($com->bloqueado)
				<button type="button" class="card-subtitle btn btn-sm btn-danger float-right" disabled>Bloquear</button>
				@else
				<button type="button" class="card-subtitle btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#blockModal" data-comentario="<?=$com->id?>">Bloquear</button>
				@endif
			@endif
			<hr>
			<p class="card-text"><?=nl2br($com->mensaje)?></p>
			@if(auth()->user()->id == $com->id_usuario)
				@if($com->bloqueado)
				<button type="button" class="btn btn-danger m-1 float-right" disabled>Eliminar</button>
				<button type="button" class="btn btn-primary m-1 float-right" disabled>Editar</button>
				@else
				<button type="button" class="btn btn-danger m-1 float-right" data-toggle="modal" data-target="#deleteModal" data-comentario="<?=$com->id?>">Eliminar</button>
				<button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#editModal" data-mensaje="<?=$com->mensaje?>" data-comentario="<?=$com->id?>">Editar</button>
				@endif
			@endif
		</div>
		<div class="card-footer text-muted">
			<?php
			if(empty($com->fecha_edicion)):
				echo($com->fecha_creacion);
			else:
				echo($com->fecha_edicion. " - Editado");
			endif;
			?>
		</div>
	</div>
	@endforeach
	
	<!--PAGINATION-->
	<div class="pagination justify-content-end">{{$comentarios->onEachSide(1)->links()}}</div>
	</div>

</div>
</section>


<!--MODAL EDIT-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar comentario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
			@method('PUT')
			@csrf
			<div class="form-group">
            <input type="hidden" name="com_id" id="com_id"></input>
			<label for="message-text" class="col-form-label">Mensaje:</label>
            <textarea rows="5"class="form-control" name="mensaje" id="mensaje"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Editar</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<!--MODAL -->
<!--MODAL DELETE-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"> Eliminar Centro</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="POST">
			@method('DELETE')
			@csrf
			<div class="modal-body">
				<input type="hidden" name="del_com_id" id="del_com_id"></input>
				<h5>¿Está seguro que quiere eliminar su comentario?</h5>
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
<!--MODAL -->
<!--MODAL BLOCK COM-->
<div class="modal fade" id="blockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"> Bloquear Comentario</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		
		<form action="<?= route("web.blockComm");?>" method="POST">
			@csrf
			<div class="modal-body">
				<input type="hidden" name="block_com_id" id="block_com_id"></input>
				<h5>¿Está seguro que quiere bloquear el comentario?</h5>
				<small>Esta acción no se puede revertir</small>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger">Bloquear</button>
			</div>
		</form>
		</div>
	</div>
</div>
<!--MODAL -->
<!--MODAL BLOCK PUB-->
<div class="modal fade" id="blockPubModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"> Bloquear Publicación</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		
		<form action="<?= route("web.blockPub");?>" method="POST">
			@csrf
			<div class="modal-body">
				<input type="hidden" name="block_pub_id" id="block_pub_id"></input>
				<h5>¿Está seguro que quiere bloquear la publicacion?</h5>
				<small>Esta acción no se puede revertir</small>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger">Bloquear</button>
			</div>
		</form>
		</div>
	</div>
</div>
<!--MODAL -->

@include('dali/footer')

<script src="../../bootstrap/jquery/jquery-3.5.1.min.js"></script>
<script src="../../bootstrap/popper/popper.min.js"></script>
<script src="../../bootstrap/bootstrap/js/bootstrap.min.js"></script>
<!--<script src="../../js/dali.js"></script>-->

<script>
//MODAL PARA EDITAR COMENTARIO EN EL FORO
$('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var mensaje = button.data('mensaje') // Extract info from data-* attributes
  var id = button.data('comentario')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body #mensaje').val(mensaje)
  modal.find('.modal-body #com_id').val(id)
})
</script>
<script>
//MODAL PARA ELIMINAR COMENTARIO EN EL FORO
$('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('comentario') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body input').val(id)
})
</script>
<script>
//MODAL PARA BLOQUEAR COMENTARIO EN EL FORO
$('#blockModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('comentario') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body input').val(id)
})
</script>
<script>
//MODAL PARA BLOQUEAR PUBLICACION EN EL FORO
$('#blockPubModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('publicacion') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body input').val(id)
})
</script>
</body>
</html>