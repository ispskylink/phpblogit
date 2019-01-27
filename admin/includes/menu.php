<div class="menu">
	<div class="card">
		<div class="card-header">
			<h2>Меню</h2>
		</div>
		<div class="card-content">
		<?php if ($_SESSION['user']['role'] == "Admin" ): ?>
			<a href="<?php echo BASE_URL . 'admin/create_post.php' ?>">Создать Пост</a>
			<a href="<?php echo BASE_URL . 'admin/posts.php' ?>">Редактор Постов</a>
			<a href="<?php echo BASE_URL . 'admin/users.php' ?>">Менеджер Юзеров</a>
			<a href="<?php echo BASE_URL . 'admin/topics.php' ?>">Редактор Топиков</a>
			<?php else: ?>
			<a href="<?php echo BASE_URL . 'admin/create_post.php' ?>">Создать Пост</a>
			<a href="<?php echo BASE_URL . 'admin/posts.php' ?>">Редактор Постов</a>
			<?php endif ?>
		</div>
	</div>
</div>