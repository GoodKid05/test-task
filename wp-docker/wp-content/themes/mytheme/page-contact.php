<?php get_header()?>

<?php
$feedback_message = '';
$feedback_type = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = sanitize_text_field($_POST['cf_name']);
	$email = sanitize_email($_POST['cf_email']);
	$message = sanitize_textarea_field($_POST['cf_message']);

	if (!is_email( $email)) {
		$feedback_message = 'Неверный email.';
		$feedback_type = 'error';
	} else {
		$to = 'alexeiburoffburov@yandex.ru';
		$subject = 'Новое сообщение с сайта';
		$body = "Имя: $name\nEmail: $email\nСообщение:\n$message";
		$headers = ['Content-Type: text/plain; charset=UTF-8', "From: $name <$email>"];
		$sent = wp_mail($to, $subject, $body, $headers);

		if ($sent) {
			$feedback_message = 'Спасибо! Ваше сообщение отправлено.';
			$feedback_type = 'success';
			global $wpdb;
			$table = $wpdb->prefix . 'contact_form_submissions';
			$wpdb->insert($table, [
				'name' => $name,
				'email' => $email,
				'message' => $message,
				'created_at' => current_time('mysql')
			]);
		} else {
			$feedback_message = 'Ошибка при отправке сообщения. Попробуйте позже.';
			$feedback_type = 'error';
		}
	}
}
?>

<main class="page-contact">
	<div class="feedback-container">
		<div class="feedback-title-container">
			<h2>Связаться с нами</h2>
		</div>
		<form class="feedback-form-container" method="post">
			<div class="form-group">
				<label for="cf_name">Имя:</label>
				<input type="text" id="cf_name" name="cf_name" required>
			</div>

			<div class="form-group">
				<label for="cf_email">Email:</label>
				<input type="email" id="cf_email" name="cf_email" required>
			</div>

			<div class="form-group">
				<label for="cf_message">Сообщение:</label>
				<textarea class="feedback-textarea" id="cf_message" name="cf_message" required> </textarea>
			</div>
			<?php if (!empty($feedback_message)) : ?>
				<div class="feedback-message-container <?php echo esc_attr($feedback_type); ?>">
					<?php echo esc_html($feedback_message); ?>
				</div>
			<?php endif; ?>
			<div class="feedback-btn-submit-container" >
				<button class="feedback-btn-submit" type="submit">Отправить</button>
			</div>
		</form>
	</div>

</main>

<?php get_footer();?>