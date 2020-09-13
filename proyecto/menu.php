<?php

require_once "class/Usuario.php";

session_start();

if (!isset($_SESSION['usuario'])) {
	header('location: formulario_login.php');
}

$usuario = $_SESSION['usuario'];

$imagen = $usuario->getImagenPerfil();
if (is_null($imagen)){
	$imagen = "sin_foto.jpg";
}
?>

		
		<div class="left-side-bar">
		<div class="brand-logo">
			<a href="/E-commerce-de-restaurantes/proyecto/modulos/dashboard/dashboard.php">
				Dashboard
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw "></span><span class="mtext">Modulos</span>
						</a>
						<ul class="submenu">
			
							<?php foreach ($usuario->perfil->getModulos() as $modulo): ?>

							<li class="nav-item">
								<a href="/E-commerce-de-restaurantes/proyecto/modulos/<?=$modulo->getDirectorio() ?>/listado.php" class="nav-link">
									<?php echo $modulo; ?>
								</a>
							</li>

							<?php endforeach ?>
                        </ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
<div class="mobile-menu-overlay"></div>
		
		

