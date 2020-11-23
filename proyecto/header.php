<div class="header">
	<div class="header-left">
		<div class="menu-icon dw dw-menu"></div>
		<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
		<div class="header-search">
			
		</div>
	</div>
	<div class="header-right">
		<div class="dashboard-setting user-notification">
			<div class="dropdown">
				<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
					<i class="dw dw-settings2"></i>
				</a>
			</div>
		</div>
		
		<div class="user-info-dropdown">
			<div class="dropdown">
				<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					<span class="user-icon">
						<img src="/E-commerce-de-restaurantes/proyecto/imagenes/<?php echo $imagen;?>">
					</span>
					<span class="user-name"><?=$usuario->getUsername();?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
					<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Perfil</a>
					<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Ajustes</a>
					<a class="dropdown-item" href="/E-commerce-de-restaurantes/proyecto/logout.php"><i class="dw dw-logout"></i> Salir</a>
				</div>
			</div>
		</div>
	</div>
</div>