<?php
get_header();

$insights_page_id = (int) get_option('page_for_posts');
$insights_title = $insights_page_id ? get_the_title($insights_page_id) : 'Insights';

get_template_part(
    'template-parts/get-hero-or-banner',
    null,
    array(
        'post_id' => $insights_page_id,
        'title'   => $insights_title,
    )
);

$insights_intro = $insights_page_id
    ? get_post_field('post_content', $insights_page_id)
    : '';
?>

<main class="resources container">
    <?php if (!empty(trim(wp_strip_all_tags($insights_intro)))) : ?>
        <div class="generic-content">
            <?php echo apply_filters('the_content', $insights_intro); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </div>
    <?php endif; ?>

    <?php if (have_posts()) : ?>
        <div>
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <article>
                    <div>
                        <h2>
                            <a class="permalink-title" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <?php
        the_posts_pagination(
            array(
                'mid_size'  => 1,
                'prev_text' => __('Previous', 'versatel'),
                'next_text' => __('Next', 'versatel'),
            )
        );
        ?>
    <?php else : ?>
        <p><?php esc_html_e('No insights have been published yet.', 'versatel'); ?></p>
    <?php endif; ?>
</main>

<?php
if ($insights_page_id && get_field('cta_enabled', $insights_page_id)) {
    get_template_part(
        'template-parts/cta',
        null,
        array('post_id' => $insights_page_id)
    );
}

get_footer();
