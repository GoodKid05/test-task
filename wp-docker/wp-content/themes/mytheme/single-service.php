<?php get_header();?>

<main class="service-page">
  <article class="service-page-content"> 
    <div class="service-description-container" >
      <div class="service-description-title-container"> 
        <h1> <?php the_title(); ?> </h1>
      </div>
      <?php $desc = get_field('полное_описание') ?>
      <div class="service-description"> 
        <?php echo $desc; ?> 
        <!-- Можно еще добавить таблицу цен  -->
      </div>
    </div>
    <?php if (has_post_thumbnail()) : ?>
      <div class="service-image-container"> 
        <?php the_post_thumbnail('large') ?>
      </div>
    <?php endif; ?> 


  </article> 
</main>

<script> 
  document.addEventListener('DOMContentLoaded', () => {
    const imageContainer = document.querySelector('.service-image-container');
    const description = document.querySelector('.service-description');
    const article = document.querySelector('.service-page-content');

    function moveImage() {
      if (window.innerWidth <= 768) {
        if (imageContainer.parentElement !== description) {
          description.append(imageContainer);
        }
      } else {
          if(imageContainer.parentElement !== article) {
            article.append(imageContainer);
          }
      }
    }

    moveImage();
    window.addEventListener('resize', moveImage);
  });
</script>

<?php get_footer();?>