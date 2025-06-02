<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name');?></title>

	<?php wp_head();?>
</head>

<body <?php body_class(); ?> > 
	<header class="header"> 
		<div class="header-content-container">
			<h1 class="header-logo">Header Logo</h1>
			<div class="header-contact-container">  
				<a href="/contact">Обратная связь</a>
			</div>
		</div>
	</header>