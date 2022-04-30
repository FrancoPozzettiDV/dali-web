<footer id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Información</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="<?= route("web.parents"); ?>"><i class="fa fa-angle-double-right"></i>Padres</a></li>
						<li><a href="<?= route("web.teachers"); ?>"><i class="fa fa-angle-double-right"></i>Docentes</a></li>
						<li><a href="<?= route("web.professionals"); ?>"><i class="fa fa-angle-double-right"></i>Prof. Salud</a></li>
						<li><a href="<?= route("web.center"); ?>"><i class="fa fa-angle-double-right"></i>Centros</a></li>
						<li><a href="<?= route("web.contact"); ?>"><i class="fa fa-angle-double-right"></i>Contacto</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Actividades</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="<?= route("web.activity"); ?>"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="<?= route("web.activities" , "Fonológico"); ?>"><i class="fa fa-angle-double-right"></i>Fonológico</a></li>
						<li><a href="<?= route("web.activities" , "Semántico"); ?>"><i class="fa fa-angle-double-right"></i>Semántico</a></li>
						<li><a href="<?= route("web.activities" , "Morfosintáctico"); ?>"><i class="fa fa-angle-double-right"></i>Morfosintáctico</a></li>
						<li><a href="<?= route("web.activities" , "Pragmático"); ?>"><i class="fa fa-angle-double-right"></i>Pragmático</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Sobre DALI</h5>
					<span class="blanco">
					Somos un sitio que tiene como objetivo ayudar a los más pequeños a alcanzar un buen desarrollo del lenguaje, 
					brindando información actualizada y recursos para quienes participan en esta etapa crítica del desarrollo.
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p class="h6">&copy; <?=date('Y');?> All rights Reserved &middot; Franco Pozzetti &middot; <a href="https://www.davinci.edu.ar">Escuela Da Vinci</a></p>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p class="float-right"><a href="#">Back to top</a></p>
				</div>
				<hr>
			</div>	
		</div>
	</footer>