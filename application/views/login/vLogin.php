<!-- SECCION PARA DETALLE DE CURSOS -->
<section>
    <div class="container">
	
		<div class="row">
			<form class="col s12 m10 l6 offset-m1 offset-l3 pad_2 bord_g marg_top z-depth-3" action="<?php echo base_url(); ?>cLogin/loguear" method="POST" >
				<div class="row">
					<h4 class="title_line green-text text-darken-4">
						<i class="material-icons">account_circle</i> Sesion
					</h4>
					<div class="divider"></div>
				</div>
				
				<!-- Validaciones -->
				<?php include_once('application/views/vistasParciales/validaciones.php');?>

				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">email</i>
						<input  name="correo" id="icon_prefix" type="email" class="validate" required>
						<label for="icon_prefix">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">vpn_key</i>
						<input name="pass" id="icon_telephone" type="password" class="validate" required>
						<label for="icon_telephone">Password</label>
					</div>
				</div>
				<div class="row">
					<button class="green darken-2 btn-large waves-effect waves-light col s12" type="submit" name="action">Iniciar
						<i class="material-icons right">send</i>
					</button>
				</div>
				<div class="row">
					<h6 class="marg_1 center">
						<a href="<?= base_url() ?>" class="blue-text">Cancelar</a>
					</h6>
				</div>
			</form>
		</div>

	</div>
</section>