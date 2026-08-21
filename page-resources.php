<?php
/**
 * Template Name: Resources Page
 */

get_header();

while (have_posts()) {
    the_post();

    $resources_page_id = get_the_ID();
    $insights_page_id = (int) get_option('page_for_posts');
    $resources_intro = get_the_content();

    get_template_part('template-parts/get-hero-or-banner');
    ?>

    <main class="resources-hub">
        <?php if (!empty(trim(wp_strip_all_tags($resources_intro)))) : ?>
            <div class="container page-section generic-content resources-hub__intro">
                <?php echo apply_filters('the_content', $resources_intro); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
        <?php endif; ?>

        <?php
        $resource_pages = get_pages(
            array(
                'child_of'    => $resources_page_id,
                'parent'      => $resources_page_id,
                'post_status' => 'publish',
                'sort_column' => 'menu_order,post_title',
                'sort_order'  => 'ASC',
            )
        );
        ?>

        <?php if ($resource_pages) : ?>
            <div class="container resources-hub__sections">
                <?php foreach ($resource_pages as $resource_page) : ?>
                    <?php
                    $resource_excerpt = has_excerpt($resource_page)
                        ? get_the_excerpt($resource_page)
                        : wp_trim_words(
                            wp_strip_all_tags(strip_shortcodes($resource_page->post_content)),
                            35
                        );

                    $collection_post_type = '';

                    if ($resource_page->ID === $insights_page_id) {
                        $collection_post_type = 'post';
                    } else {
                        $selected_post_type = get_field(
                            'resource_collection_post_type',
                            $resource_page->ID
                        );
                        $post_type_object = $selected_post_type
                            ? get_post_type_object($selected_post_type)
                            : null;

                        if (
                            $post_type_object
                            && $post_type_object->public
                            && !in_array($selected_post_type, array('page', 'attachment'), true)
                        ) {
                            $collection_post_type = $selected_post_type;
                        }
                    }

                    $latest_items = null;

                    if ($collection_post_type) {
                        $latest_items = new WP_Query(
                            array(
                                'post_type'           => $collection_post_type,
                                'post_status'         => 'publish',
                                'posts_per_page'      => 3,
                                'ignore_sticky_posts' => true,
                                'no_found_rows'       => true,
                            )
                        );
                    }
                    ?>

                    <section class="resource-section" aria-labelledby="resource-<?php echo esc_attr($resource_page->ID); ?>-title">
                        <div class="resource-section__summary<?php echo has_post_thumbnail($resource_page) ? ' resource-section__summary--with-image' : ''; ?>">
                            <?php if (has_post_thumbnail($resource_page)) : ?>
                                <a href="<?php echo esc_url(get_permalink($resource_page)); ?>" class="resource-section__image">
                                    <?php echo get_the_post_thumbnail($resource_page, 'medium_large'); ?>
                                </a>
                            <?php endif; ?>

                            <div class="resource-section__content">
                                <h2 id="resource-<?php echo esc_attr($resource_page->ID); ?>-title">
                                    <a href="<?php echo esc_url(get_permalink($resource_page)); ?>">
                                        <?php echo esc_html(get_the_title($resource_page)); ?>
                                    </a>
                                </h2>

                                <?php if ($resource_excerpt) : ?>
                                    <p><?php echo esc_html($resource_excerpt); ?></p>
                                <?php endif; ?>

                                <a href="<?php echo esc_url(get_permalink($resource_page)); ?>" class="button">
                                    <?php
                                    printf(
                                        /* translators: %s: resource page title. */
                                        esc_html__('Explore %s', 'versatel'),
                                        esc_html(get_the_title($resource_page))
                                    );
                                    ?>
                                </a>
                            </div>
                        </div>

                        <?php if ($latest_items && $latest_items->have_posts()) : ?>
                            <div class="resource-section__latest">
                                <h3><?php esc_html_e('Latest', 'versatel'); ?></h3>
                                <div class="resource-section__items">
                                    <?php while ($latest_items->have_posts()) : ?>
                                        <?php $latest_items->the_post(); ?>
                                        <article class="resource-item">
                                            <h4>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                                        </article>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </section>

                    <?php wp_reset_postdata(); ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <?php
    if (get_field('cta_enabled', $resources_page_id)) {
        get_template_part(
            'template-parts/cta',
            null,
            array('post_id' => $resources_page_id)
        );
    }
}

get_footer();
