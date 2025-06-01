<?php get_header();?>

<main>
	<section class="section-articles">
			<div class="articles-container">
				<div class="articles-title-container">
					<h2 class="articles-title">Статьи</h2>
				</div>
				<div class="articles-cards-container">
					<?php 
					$articles = new WP_Query([
						'post_type' => 'article',
						'posts_per_page' => 3,
						'orderby' => 'date',
						'order' => 'DESC'
					]);
					if ($articles->have_posts()):
						while ($articles->have_posts()): $articles->the_post();?>	
							<article class="article-card">
								<div class="article-card-container-img">
									<?php if (has_post_thumbnail()): ?>
										<a href="<?php the_permalink(); ?>"> 
											<?php the_post_thumbnail( 'medium', ['class' => 'article-card-img'] ) ?>
										</a>
									<?php endif; ?>	
								</div>

								<div class="article-card-content">
									<div class="article-card-text-wrapper">
										<h3 class="article-card-title-link">
											<a href="<?php the_permalink()?>"><?php the_title()?></a>
										</h3>
										<p class="article-card-text">
											<?php echo get_the_excerpt()?>
										</p>
									</div>
									<div class="article-card-date-container">
										<time class="article-card-date" datetime="2023-11-26">
											<?php echo get_the_date('d.m.Y')?>
										</time>
									</div>
								</div>
							</article>
						<?php endwhile;
						wp_reset_postdata();
					else: ?>
						<p>Статей пока нет.</p>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<section class="section-services">
			<div class="services-container">
				<div class="services-title-container">
					<h2 class="services-title">Услуги</h2>
				</div>
				<div class="swiper">					
					<div class="swiper-wrapper">
						<?php
						$services = new WP_Query([
							'post_type' => 'service',
							'posts_per_page' => 4,
							'orderby' => 'date',
							'order' => 'DESC'
						]);
						if($services->have_posts()):
						while($services->have_posts()): $services->the_post();?>
						<div class="swiper-slide">
							<article class="service-card">
								<a href="<?php the_permalink() ?>" class="service-card-link">
									<div class="service-card-container-sticker">
										<?php 
										$labels = get_field('особая_отметка'); 
										if (!empty($labels) && is_array($labels)) {
											foreach ($labels as $label) {
												echo '<span class="service-card-sticker">' . esc_html($label['label']) . '</span>';
											}
										}
										?>
									</div>
									<div class="service-card-container-img">
										<?php if (has_post_thumbnail()) :  ?>
											<img class="service-card-img" src="<?php the_post_thumbnail_url('medium') ?>" alt="Изображение услуги">
										<?php endif; ?>
									</div>	
									<div class="service-card-content">
										<div class="service-card-title-container">
												<h3 class="service-card-title"> <?php the_title();?> </h3>
										</div>
										<?php if ($price = get_field('цена')):?>
											<span class="service-card-price">от <?php echo esc_html($price); ?>₽</span>
										<?php endif;?>
									</div>
								</a>	
							</article>
						</div>
						<?php endwhile; wp_reset_postdata();
						endif;
						?>
					</div>	
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</section>
</main>

<?php get_footer() ?>