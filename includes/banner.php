<?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="logged_in_info">
		<span>Добро пожаловать, <?php echo $_SESSION['user']['username'] ?></span>
		|
		<span><a href="logout.php">logout</a></span>
	</div>
<?php }else{ ?>
	<div class="banner">
		<div class="welcome_msg">
			<h1>Today's Inspiration</h1>
			<p> 
			    One day your life <br> 
			    will flash before your eyes. <br> 
			    Make sure it's worth watching. <br>
				<span>~ Gerard Way</span>
			</p>
			<span><a href="register.php" style="
			width:65%; background-color: transparent;outline: none;   box-shadow: none;
  			border: 2px solid #fff;  border-radius: 3px;transition: all 0.6s ease;border-style:solid;"
			class="btn">Join now!</a></span>
		</div>

		<div class="login_div">
			<form action="<?php echo BASE_URL . 'index.php'; ?>" method="post" >
				<h2>Login</h2>
				<div style="width: 60%; margin: 0px auto;">
					<?php include(ROOT_PATH . '/includes/errors.php') ?>
				</div>
				<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
				<input type="password" name="password"  placeholder="Password"> 
				<button class="btn" type="submit" name="login_btn">Sign in</button>
			</form>
		</div>
	</div>
<?php } ?>
