<nav class="navbar navbar-expand-lg navbar-light bg-success">
	<a class="navbar-brand" href="index.php">
		<i class="fal fa-map-marked-alt"></i>
		MAPATM
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="bando.php"><i class="fal fa-globe-asia"></i> Vị trí</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fal fa-cog"></i> Quản lý
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="diadiem.php"><i class="fal fa-map-marker-alt fa-fw"></i>Danh sách ATM</a>
				</div>
			</li>
			<div class="text-right">
					<?php 
					
						if(isset($_SESSION['login'])&&$_SESSION['login'])
						{
							Echo("Chào mừng ".$_SESSION['login']." ");
							echo('<a class="navbar-brand" href="logout.php">');
							
							echo('Đăng Xuất');
							echo('</a>');
						}
						else
						{
						echo('<a class="navbar-brand" href="login.php">');
						
						echo('Đăng nhập');
						echo('</a>');
							
						}
					
					?>
				</div>
		</ul>
	</div>
</nav>