<?php 
add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
	wp_enqueue_style('theme-style', get_stylesheet_uri());
	wp_enqueue_style('theme-style', "https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap", [], null);
	wp_enqueue_script('swiper',"https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js", [], null, true); 
	wp_enqueue_script('swiper-init', get_template_directory_uri() . '/assets/js/swiper-init.js', ['swiper'], null, true);
});

function my_custom_post_types() {
	register_post_type('article', [
		'labels' => [
			'name' => 'Статьи',
			'singular_name' => 'Статья',
		],
		'public' => true,
		'has_archive' => true,
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
		'show_in_rest' => true
	]);

	register_post_type('service', [
		'labels' => [
			'name' => 'Услуги',
			'singular_name' => 'Услуга'
		],
		'public' => true,
		'has_archive' => true,
		'rewrite' => ['slug' => 'services'],
		'supports' => ['title', 'editor', 'thumbnail'],
		'show_in_rest' => true
	]);
}

add_action('init', 'my_custom_post_types');

function mytheme_setup() {
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'mytheme_setup');


function create_contact_form_table() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'contact_form_submissions';
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name TEXT NOT NULL,
		email TEXT NOT NULL,
		message TEXT NOT NULL,
		created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL
	) $charset_collate;";
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta($sql);
}

add_action('after_setup_theme', 'create_contact_form_table');

add_action('phpmailer_init', function($phpmailer) {
	$phpmailer->isSMTP();
	$phpmailer->Host = 'smtp.yandex.ru';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 465;
	$phpmailer->Username = 'rbru-metrika@yandex.ru';
	$phpmailer->Password = 'Введите пароль приложения';
	$phpmailer->SMTPSecure = 'ssl';
	$phpmailer->From = 'rbru-metrika@yandex.ru';
	$phpmailer->FromName = 'Rocket Business';
});

?>