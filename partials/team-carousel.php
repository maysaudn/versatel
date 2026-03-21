<?php
$args = array(
    'post_type' => 'team_member',
    'posts_per_page' => -1,
    'post_status' => 'publish'
);

$team_query = new WP_Query($args);
?>

<?php if ($team_query->have_posts()) : ?>

<div class="swiper team-carousel">
    <div class="swiper-wrapper">

        <?php while ($team_query->have_posts()) : $team_query->the_post(); 

            $job_title = get_field('job_title');
            $email = get_field('contact_email');
            $image = get_field('full_image');
        ?>

        <div class="swiper-slide">
            <div class="card"
                data-name="<?php echo esc_attr(get_the_title()); ?>"
                data-title="<?php echo esc_attr($job_title); ?>"
                data-bio="<?php echo esc_attr(wp_strip_all_tags(get_the_content())); ?>"
                data-email="<?php echo esc_attr($email); ?>"
                data-image="<?php echo esc_url($image['url']); ?>"
            >

                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">

                <h3><?php the_title(); ?></h3>
                <p><?php echo esc_html($job_title); ?></p>

            </div>
        </div>

        <?php endwhile; ?>

    </div>
</div>

<?php wp_reset_postdata(); ?>
<?php endif; ?>