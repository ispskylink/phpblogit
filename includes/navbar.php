<div class="navbar">
	<div class="logo_div">
		<a href="index.php"><h1>Блог АйТишника</h1></a>
	</div>
	<ul>
	  <li><a class="active" href="index.php">Рут</a></li>
	  <li><a href="#news">Что нового</a></li>
	  <li><a href="#contact">Связь</a></li>
	  <li><a href="#about">Об этом</a></li>
		<?php if ($_SESSION['user']['role'] == "Admin"): ?>
		<li><a href="admin/dashboard.php">Админка</a></li>
		<?php endif ?>
	</ul>
</div>