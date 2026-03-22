<?php
$args = array(
    'post_type' => 'team_member',
    'posts_per_page' => -1,
    'post_status' => 'publish'
);

$team_query = new WP_Query($args);
?>

<?php while ($team_query->have_posts()) : $team_query->the_post(); ?>
    <div class="card">
        <h3><?php the_title(); ?></h3>
    </div>
<?php endwhile; ?>

<?php if ($team_query->have_posts()) : ?>

<div class="swiper team-carousel">
    <div class="swiper-wrapper">

        <?php while ($team_query->have_posts()) : $team_query->the_post(); 

            $job_title = get_field('job_title');
            $email = get_field('contact_email');
            $image = get_field('headshot');
            $bio = wp_strip_all_tags(get_field('full_bio'));
        ?>

        <div class="swiper-slide">
            <div class="card"
                data-name="<?php echo esc_attr(get_the_title()); ?>"
                data-title="<?php echo esc_attr($job_title); ?>"
                data-bio="<?php echo esc_attr($bio); ?>"
                data-email="<?php echo esc_attr($email); ?>"
                data-image="<?php echo esc_url($image['url']); ?>"
            >

                <img src="<?php echo esc_url($image['url']); ?>">
                <h3><?php the_title(); ?></h3>
                <p><?php echo esc_html($job_title); ?></p>
                <p><?php echo esc_html($email); ?></p>
                <p><?php echo esc_attr($bio); ?></p>

            </div>
        </div>
        <!-- Test the while loop --> 
        <?php endwhile; ?>

    </div>
</div>

<?php wp_reset_postdata(); ?>
<?php endif; ?>