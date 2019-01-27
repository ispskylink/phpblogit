<?php  include('config.php'); ?>
<?php  include('includes/registration_login.php'); ?>
<?php include('includes/head_section.php'); ?>
<!-- Source code for handling registration and login -->
<title>Блог АйТишника | Sign up </title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
		<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
	<!-- // Navbar -->

	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="register.php" >
			<h2>Форма регистрации</h2>
			<?php include(ROOT_PATH . '/includes/errors.php') ?>
			<input  type="text" name="username" value="<?php echo $username; ?>"  placeholder="Имя пользователя">
			<input type="email" name="email" value="<?php echo $email ?>" placeholder="Email">
			<input type="password" name="password_1" placeholder="Пароль">
			<input type="password" name="password_2" placeholder="Подтверждение пароля">
			<button type="submit" class="btn" name="reg_user">Зарегистрировать</button>
			<p>
				Уже в рядах? <a href="login.php">Sign in</a>
			</p>
		</form>
	</div>
</div>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
