<?php
get_header();

if (is_search()) {
    $fallback_title = sprintf(
        /* translators: %s: search query. */
        __('Search results for: %s', 'versatel'),
        get_search_query()
    );
} elseif (is_archive()) {
    $fallback_title = get_the_archive_title();
} else {
    $fallback_title = get_bloginfo('name');
}

get_template_part(
    'template-parts/page-banner',
    null,
    array('title' => $fallback_title)
);
?>

<main class="resources container">
  <?php if (have_posts()) : ?>
    <div>
      <?php while (have_posts()) : the_post(); ?>
        <article>
            <div>
            <h2><a class="permalink-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p><?php the_excerpt(); ?></p>
            </div>

        </article>
      <?php endwhile; ?>
    </div>
    <?php the_posts_pagination(); ?>
  <?php else : ?>
    <p><?php esc_html_e('No content was found.', 'versatel'); ?></p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
