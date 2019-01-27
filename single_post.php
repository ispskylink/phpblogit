<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); 
include('functions.php');

?>

<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
		$post_id = $post['id'];
		$comments=getAllCommentsByPostId($post_id);
	}
	
	$topics = getAllTopics();
?>
<?php include('includes/head_section.php'); ?>
<title> <?php echo $post['title'] ?> | Блог АйТишника</title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
		<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
	<!-- // Navbar -->
	
	<div class="content" >
		<!-- Page wrapper -->
		<div class="post-wrapper">
			<!-- full post div -->
			<div class="full-post-div">
		
			<?php if ($post['published'] == 0): ?>
				<h2 class="post-title">Sorry... Этот пост еще не опубликован.</h2>
				<a href="javascript:history.go(-1)">назад...</a>
			<?php else: ?>
			<a href="javascript:history.go(-1)">назад...</a>
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
				<div class="post-body-div">
					<?php echo html_entity_decode($post['body']); ?>
				</div>
			<?php endif ?>
			</div>
			<!-- // full post div -->
			
			<!-- comments section -->
			<!-- <div class="col-md-6 col-md-offset-3 comments-section"> -->
			<!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->
			<?php if (isset($_SESSION['user']['username'])): ?>
			
				<form class="clearfix" action="functions.php" method="post" id="comment_form">
					
					<input type="hidden" name="post_id" class="form-control" value=<?php echo $post['id']; ?>>
					<input type="hidden" name="user_id" class="form-control" value=<?php echo $_SESSION['user']['id']; ?>>
					<textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
					<button class="btn btn-primary btn-sm pull-right" id="submit_comment">Комментировать</button>
				</form>
			<?php else: ?>
				<div class="well" style="margin-top: 20px;">
					<h4 class="text-center"><a href="register.php">Sign in</a>, чтобы оставить комментарий.</h4>
				</div>
			<?php endif ?>
			<!-- Display total number of comments on this post  -->
			<h2><span id="comments_count"><?php echo count($comments) ?></span> комментария.</h2>
			<hr>
			<!-- comments wrapper -->
			<div id="comments-wrapper">
			<?php if (isset($comments)): ?>
				<!-- Display comments -->
				<?php foreach ($comments as $comment): ?>
				<!-- comment -->
				<div class="comment clearfix">
					<img src="static/images/profile.png" alt="" class="profile_pic">
					<div class="comment-details">
						<span class="comment-name"><?php echo getUsernameById($comment['user_id']) ?></span>
						<span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["created_at"])); ?></span>
						<p><?php echo $comment['body']; ?></p>
						<?php if (isset($_SESSION['user']['username'])): ?>
						<a class="reply-btn" href="#" data-id="<?php echo $comment['id']; ?>">ответить</a>
					</div>
					<!-- reply form -->
					<form action="functions.php" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment['id'] ?>" data-id="<?php echo $comment['id']; ?>">
					<input type="hidden" name="user_id" class="form-control" value=<?php echo $_SESSION['user']['id']; ?>>
						<textarea class="form-control" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
						<button class="btn btn-primary btn-xs pull-right submit-reply">Подтвердить</button>
					</form>
					<?php else: ?>
					
					</div>
					<?php endif ?>
					<!-- GET ALL REPLIES -->
					<?php $replies = getRepliesByCommentId($comment['id']) ?>
					<div class="replies_wrapper_<?php echo $comment['id']; ?>">
						<?php if (isset($replies)): ?>
							<?php foreach ($replies as $reply): ?>
								<!-- reply -->
								<div class="comment reply clearfix">
									<img src="static/images/profile.png" alt="" class="profile_pic">
									<div class="comment-details">
										<span class="comment-name"><?php echo getUsernameById($reply['user_id']) ?></span>
										<span class="comment-date"><?php echo date("F j, Y ", strtotime($reply["created_at"])); ?></span>
										<p><?php echo $reply['body']; ?></p>
										<!-- <a class="reply-btn" href="#">reply</a> -->
									</div>
								</div>
							<?php endforeach ?>
						<?php endif ?>
					</div>
				</div>
					<!-- // comment -->
				<?php endforeach ?>
			<?php else: ?>
				<h2>Будь первым, кто прокомментирует этот пост.</h2>
			<?php endif ?>
			</div><!-- comments wrapper -->
		</div><!-- // all comments -->
		
		<!-- // Page wrapper -->

		<!-- post sidebar -->
		<div class="post-sidebar">
			<div class="card">
				<div class="card-header">
					<h2>Топики:</h2>
				</div>
				<div class="card-content">
				<?php if ($topics): ?>
					<?php foreach ($topics as $topic): ?>
						<a 
							href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $topic['id'] ?>">
							<?php echo $topic['name']; ?>
						</a> 
					<?php endforeach ?>
					<?php endif ?>
				</div>
			</div>
		</div>
		<!-- // post sidebar -->
	</div>
</div>
<!-- // content -->

<?php include( ROOT_PATH . '/includes/footer.php'); ?>
