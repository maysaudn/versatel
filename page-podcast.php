<?php
/*
Template Name: Podcast Page
*/

get_header();

while (have_posts()) :
    the_post();
    $podcast = nmca_get_podcast_feed(6);
    $page_content = get_the_content();
    $feed_url = nmca_setting('podcast_rss_url');
    $platform_links = [
        [
            'label' => __('Apple Podcasts', 'versatel'),
            'url'   => nmca_setting('podcast_apple_url'),
            'icon'  => 'fa-brands fa-apple',
        ],
        [
            'label' => __('Spotify', 'versatel'),
            'url'   => nmca_setting('podcast_spotify_url'),
            'icon'  => 'fa-brands fa-spotify',
        ],
        [
            'label' => __('YouTube', 'versatel'),
            'url'   => nmca_setting('podcast_youtube_url'),
            'icon'  => 'fa-brands fa-youtube',
        ],
        [
            'label' => __('RSS Feed', 'versatel'),
            'url'   => $feed_url,
            'icon'  => 'fa-solid fa-rss',
        ],
    ];

    get_template_part('template-parts/get-hero-or-banner');
    ?>

    <main class="podcast-page">
        <?php if (!empty(trim(wp_strip_all_tags($page_content)))) : ?>
            <section class="podcast-page-intro container generic-content">
                <?php echo apply_filters('the_content', $page_content); ?>
            </section>
        <?php endif; ?>

        <?php if (is_wp_error($podcast)) : ?>
            <section class="podcast-feed-notice container" role="status">
                <h2><?php esc_html_e('The podcast is temporarily unavailable.', 'versatel'); ?></h2>
                <p>
                    <?php esc_html_e('Please try again later or use one of the podcast links provided on this page.', 'versatel'); ?>
                </p>
            </section>
        <?php else : ?>
            <section class="podcast-overview container" aria-labelledby="podcast-show-title">
                <?php if (!empty($podcast['image'])) : ?>
                    <div class="podcast-show-artwork">
                        <img
                            src="<?php echo esc_url($podcast['image']); ?>"
                            alt=""
                            loading="eager"
                            decoding="async"
                        >
                    </div>
                <?php endif; ?>

                <div class="podcast-show-details">
                    <p class="podcast-eyebrow"><?php esc_html_e('Podcast', 'versatel'); ?></p>
                    <h2 id="podcast-show-title"><?php echo esc_html($podcast['title']); ?></h2>

                    <?php if (!empty($podcast['description'])) : ?>
                        <div class="podcast-description">
                            <?php echo wpautop(esc_html($podcast['description'])); ?>
                        </div>
                    <?php endif; ?>

                    <div class="podcast-platform-links" aria-label="<?php esc_attr_e('Listen to the podcast', 'versatel'); ?>">
                        <?php foreach ($platform_links as $platform) : ?>
                            <?php if (!empty($platform['url'])) : ?>
                                <a
                                    class="button podcast-platform-link"
                                    href="<?php echo esc_url($platform['url']); ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <i class="<?php echo esc_attr($platform['icon']); ?>" aria-hidden="true"></i>
                                    <?php echo esc_html($platform['label']); ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="podcast-episodes container" aria-labelledby="latest-episodes-title">
                <div class="podcast-section-heading">
                    <p class="podcast-eyebrow"><?php esc_html_e('Listen now', 'versatel'); ?></p>
                    <h2 id="latest-episodes-title"><?php esc_html_e('Latest Episodes', 'versatel'); ?></h2>
                </div>

                <?php if (empty($podcast['episodes'])) : ?>
                    <p class="podcast-feed-notice" role="status">
                        <?php esc_html_e('No playable episodes are currently available.', 'versatel'); ?>
                    </p>
                <?php else : ?>
                    <div class="podcast-episode-list">
                        <?php foreach ($podcast['episodes'] as $episode) : ?>
                            <?php
                            $duration = (int) $episode['duration'];
                            $hours = (int) floor($duration / HOUR_IN_SECONDS);
                            $minutes = (int) floor(($duration % HOUR_IN_SECONDS) / MINUTE_IN_SECONDS);
                            $seconds = $duration % MINUTE_IN_SECONDS;
                            $formatted_duration = $hours > 0
                                ? sprintf('%d:%02d:%02d', $hours, $minutes, $seconds)
                                : sprintf('%d:%02d', $minutes, $seconds);
                            ?>
                            <article class="podcast-episode-card">
                                <?php if (!empty($episode['image'])) : ?>
                                    <div class="podcast-episode-artwork">
                                        <img
                                            src="<?php echo esc_url($episode['image']); ?>"
                                            alt=""
                                            loading="lazy"
                                            decoding="async"
                                        >
                                    </div>
                                <?php endif; ?>

                                <div class="podcast-episode-content">
                                    <div class="podcast-episode-meta">
                                        <?php if (!empty($episode['published_date'])) : ?>
                                            <time datetime="<?php echo esc_attr(wp_date('c', $episode['published_date'])); ?>">
                                                <?php echo esc_html(wp_date(get_option('date_format'), $episode['published_date'])); ?>
                                            </time>
                                        <?php endif; ?>

                                        <?php if ($duration > 0) : ?>
                                            <span aria-label="<?php echo esc_attr(sprintf(__('Duration: %s', 'versatel'), $formatted_duration)); ?>">
                                                <?php echo esc_html($formatted_duration); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <h3><?php echo esc_html($episode['title']); ?></h3>

                                    <?php if (!empty($episode['summary'])) : ?>
                                        <p><?php echo esc_html($episode['summary']); ?></p>
                                    <?php endif; ?>

                                    <audio
                                        controls
                                        preload="none"
                                        aria-label="<?php echo esc_attr(sprintf(__('Listen to %s', 'versatel'), $episode['title'])); ?>"
                                    >
                                        <source src="<?php echo esc_url($episode['audio_url']); ?>" type="audio/mpeg">
                                        <a href="<?php echo esc_url($episode['audio_url']); ?>">
                                            <?php esc_html_e('Download this episode', 'versatel'); ?>
                                        </a>
                                    </audio>

                                    <?php if (!empty($episode['transcript_url'])) : ?>
                                        <a
                                            class="podcast-transcript-link"
                                            href="<?php echo esc_url($episode['transcript_url']); ?>"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                        >
                                            <?php esc_html_e('Read the transcript', 'versatel'); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    </main>

    <?php
    if (get_field('cta_enabled')) {
        get_template_part('template-parts/cta');
    }
    ?>

    <?php
endwhile;

get_footer();
