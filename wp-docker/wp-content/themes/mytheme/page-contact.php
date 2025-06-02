<?php get_header()?>


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
			<div class="feedback-btn-submit-container" >
				<button class="feedback-btn-submit" type="submit">Отправить</button>
			</div>
		</form>
	</div>

</main>

<?php get_footer();?>