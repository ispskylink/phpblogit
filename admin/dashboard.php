<?php  include('../config.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>

	<title>Admin | Админка</title>
</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="<?php echo BASE_URL .'admin/dashboard.php' ?>">
				<h1>Блог АйТишника - Admin</h1>
			</a>
		</div>
		<?php if (isset($_SESSION['user'])): ?>
			<div class="user-info">
				<span><?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp; 
				<a href="<?php echo BASE_URL . 'logout.php'; ?>" class="logout-btn">logout</a>
			</div>
		<?php endif ?>
	</div>
				<!-- Display notification message -->
				<?php include(ROOT_PATH . '/includes/messages.php') ?>
	<div class="container dashboard">
		<h1>Добро пожаловать</h1>
		<div class="stats">
		<?php if ($_SESSION['user']['role'] == "Admin" ): ?>
			<a href="users.php" class="first">
				<span><?php echo getAdminUsers(0); ?></span> <br>
				<span>Всего пользователей</span>
			</a>
			<a href="posts.php">
				<span><?php echo count(getAllPosts()); ?></span> <br>
				<span>Всего опубликованных Постов</span>
			</a>
			<a>
				<span><?php echo count(getAllComments()); ?></span> <br>
				<span>Всего комментариев</span>
			</a>
		</div>
		<br><br><br>
		<div class="buttons">
			<a href="users.php">Добавить Юзера</a>
			<a href="posts.php">Добавить Пост</a>
			<?php else: ?>
			<a href="posts.php">
			<span><?php echo count(getAllPosts()); ?></span> <br>
				<span>Ваших опубликованных Постов</span>
			</a>
			<a>
				<span><?php echo count(getAllComments()); ?></span> <br>
				<span>Ваших комментариев</span>
			</a>
		</div>
		<br><br><br>
		<div class="buttons">
			<a href="posts.php">Добавить Пост</a>
			<?php endif ?>
		</div>
	</div>
</body>
</html>
