<header class="main-header">
	<a href="<?php echo BASE_URL; ?>" class="logo">
		<span class="logo-mini"><b>W</b>P</span>
		<span class="logo-lg"><b>Wisely</b>Payroll</span>
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
							<img src="<?php echo BASE_URL; ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
							<span class="hidden-xs"><?php echo $userData['admin_name']; ?></span>
						<?php } else { ?>
							<img src="<?php echo REG_URL; ?>photos/<?php echo $userData['photo']; ?>" class="user-image" alt="User Image">
							<span class="hidden-xs"><?php echo $userData['first_name']; ?> <?php echo $userData['last_name']; ?></span>
						<?php } ?>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
								<img src="<?php echo BASE_URL; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
							<?php } else { ?>
								<img src="<?php echo REG_URL; ?>photos/<?php echo $userData['photo']; ?>" class="img-circle" alt="User Image">
							<?php } ?>
							<p>
								<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
									Administrator
								<?php } else { ?>
									Employee
								<?php } ?>
								<small><?php echo COMPANY_NAME; ?></small>
							</p>
						</li>
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo BASE_URL; ?>profile/" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="<?php echo BASE_URL; ?>logout/" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>