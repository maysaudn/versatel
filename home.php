<?php get_header(); ?>

<?php

$banner_args = array(
    'title' => 'Resources'
)

?>
<?php get_template_part('template-parts/get-hero-or-banner', null, $banner_args); ?>

<section class="resources container">
  <?php if (have_posts()) : ?>
    <div class="post-grid flex-container">
      <?php while (have_posts()) : the_post(); ?>
        <article class="post-card flex-card">
            <div class="flex-item">
            <h2><a class="permalink-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p><?php the_excerpt(); ?></p>
            </div>

        </article>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</section>

<?php get_template_part('template-parts/cta'); ?>

<?php get_footer(); ?>