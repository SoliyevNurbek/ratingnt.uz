
<section data-bs-version="5.1" class="menu menu2 cid-udhFksrdZU" once="menu" id="menu-5-udhFksrdZU">
	

	<nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
		<div class="container">
			<div class="navbar-brand">
				<span class="navbar-logo">
					<a href="#">
						<img src="assets/images/navyashilkichik.png" style="height: 4.3rem; width: 5.3rem;">
					</a>
				</span>
				<span class="navbar-caption-wrap"><a class="navbar-caption text-black display-4" href="#">Rating-N-T</a></span>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<div class="hamburger">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>x
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
						<a class="nav-link link text-black display-4" href="#">Bosh sahifa</a>
					</li>
					<li class="nav-item">
						<a class="nav-link link text-black display-4" href="teachers-echo.php" aria-expanded="false">O'qituvchilar</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link link text-black display-4" href="students.php">Studentlar</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link link text-black display-4" href="#contacts-3-udhFkswsPs">Bog'lanish</a>
					</li>
				</ul>
				<?php
					session_start();
					if(isset($_SESSION['login'])){
				?>
				<div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary display-4" href="tanlash.php"><?=$_SESSION['login']?></a></div>
				<div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary display-4" href="loginout.php">Chiqish</a></div>
				<?}
				else{
				?>
					<div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary display-4" href="login/login/index.php">Login in</a></div>
					<div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary display-4" href="login/register/index.php">Register</a></div>
				<?}?>
			</div>
		</div>
	</nav>
</section>
