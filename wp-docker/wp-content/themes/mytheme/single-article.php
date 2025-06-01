<?php get_header();?>

<main class="article-page">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<article class="article-content">
			<div class="article-container-title">
				<h1 class="article-title"><?php the_title(); ?></h1>
			</div>
			<?php if (has_post_thumbnail()) : ?>
				<div class="article-container-img">
					<?php the_post_thumbnail('large') ?>
				</div>
			<?php endif; ?>	
			<div class="article-text-container">
				<?php the_content() ?>
			</div>
		</article>
	<?php endwhile; endif;?>
</main>

<?php get_footer();?>