<!doctype html>
<html lang="en-IN">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title('|'); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
		<link href="https://fonts.cdnfonts.com/css/roboto" rel="stylesheet">

        <meta name="viewport" content="width=device-width,initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<header class="container">
		<div id="navbar" class="navbar">
			<a class="navbar-header" href="<?= get_home_url() ?>">
				<img class="navbar-header_logo" src="<?= get_template_directory_uri() ?>/images/logo.png" alt="logo" />
			</a>
			<div class="navbar-menu">
				<?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'depth' => '1',
                        'menu_class' => 'main-navbar'
                    ]);
                 ?>
				 <div class="navbar-buttons">
					<a href="#" class="site_button">Register</a>
					<a href="#" class="site_button navbar-button">Log in</a>
				</div>
			</div>
			
			<img class="menu-bar" src="<?= get_template_directory_uri() ?>/images/menu-bar.svg" alt="menu-bar" />
		</div>
	</header>
<body>
