<?php

/**
 * Convert an iTunes duration value to seconds.
 *
 * @param string|int $duration Duration expressed as seconds or HH:MM:SS.
 * @return int
 */
function nmca_parse_podcast_duration($duration) {
    if (is_numeric($duration)) {
        return (int) $duration;
    }

    $parts = array_map('intval', explode(':', (string) $duration));
    $seconds = 0;

    foreach ($parts as $part) {
        $seconds = ($seconds * 60) + $part;
    }

    return $seconds;
}

/**
 * Read the first matching namespaced item value from SimplePie.
 *
 * @param SimplePie_Item $item      Feed item.
 * @param string         $namespace XML namespace URI.
 * @param string         $tag       XML tag name.
 * @return string
 */
function nmca_get_podcast_item_tag_value($item, $namespace, $tag) {
    $tags = $item->get_item_tags($namespace, $tag);

    if (empty($tags[0]['data'])) {
        return '';
    }

    return trim((string) $tags[0]['data']);
}

/**
 * Read the first matching attribute from a namespaced SimplePie item.
 *
 * @param SimplePie_Item $item      Feed item.
 * @param string         $namespace XML namespace URI.
 * @param string         $tag       XML tag name.
 * @param string         $attribute XML attribute name.
 * @return string
 */
function nmca_get_podcast_item_tag_attribute($item, $namespace, $tag, $attribute) {
    $tags = $item->get_item_tags($namespace, $tag);

    if (empty($tags[0]['attribs'][''][$attribute])) {
        return '';
    }

    return trim((string) $tags[0]['attribs'][''][$attribute]);
}

/**
 * Locate the preferred HTML transcript for an episode.
 *
 * @param SimplePie_Item $item Feed item.
 * @return string
 */
function nmca_get_podcast_transcript_url($item) {
    $namespace = 'https://podcastindex.org/namespace/1.0';
    $transcripts = $item->get_item_tags($namespace, 'transcript');

    foreach ((array) $transcripts as $transcript) {
        $attributes = $transcript['attribs'][''] ?? [];

        if (
            !empty($attributes['url']) &&
            !empty($attributes['type']) &&
            'text/html' === $attributes['type']
        ) {
            return esc_url_raw($attributes['url']);
        }
    }

    return '';
}

/**
 * Retrieve and normalize podcast data from the configured RSS feed.
 *
 * WordPress's fetch_feed() uses SimplePie and its built-in feed cache.
 *
 * @param int $limit Maximum number of playable episodes to return.
 * @return array|WP_Error
 */
function nmca_get_podcast_feed($limit = 6) {
    $feed_url = nmca_setting('podcast_rss_url');

    if (empty($feed_url) || !wp_http_validate_url($feed_url)) {
        return new WP_Error(
            'nmca_missing_podcast_feed',
            __('A valid podcast RSS feed has not been configured.', 'versatel')
        );
    }

    require_once ABSPATH . WPINC . '/feed.php';

    $feed = fetch_feed($feed_url);

    if (is_wp_error($feed)) {
        return $feed;
    }

    $limit = max(1, absint($limit));
    $itunes_namespace = 'http://www.itunes.com/dtds/podcast-1.0.dtd';
    $show_image = esc_url_raw((string) $feed->get_image_url());
    $episodes = [];

    foreach ($feed->get_items() as $item) {
        if (count($episodes) >= $limit) {
            break;
        }

        $enclosure = $item->get_enclosure();
        $audio_url = $enclosure ? esc_url_raw((string) $enclosure->get_link()) : '';

        if (empty($audio_url)) {
            continue;
        }

        $episode_image = nmca_get_podcast_item_tag_attribute(
            $item,
            $itunes_namespace,
            'image',
            'href'
        );
        $duration = nmca_get_podcast_item_tag_value(
            $item,
            $itunes_namespace,
            'duration'
        );
        $description = $item->get_content() ?: $item->get_description();
        $summary = wp_trim_words(
            html_entity_decode(wp_strip_all_tags((string) $description), ENT_QUOTES, get_bloginfo('charset')),
            40,
            '&hellip;'
        );

        $episodes[] = [
            'id'             => sanitize_text_field((string) $item->get_id()),
            'title'          => sanitize_text_field((string) $item->get_title()),
            'published_date' => (int) $item->get_date('U'),
            'summary'        => $summary,
            'audio_url'      => $audio_url,
            'duration'       => nmca_parse_podcast_duration($duration),
            'image'          => esc_url_raw($episode_image ?: $show_image),
            'transcript_url' => nmca_get_podcast_transcript_url($item),
        ];
    }

    return [
        'title'       => sanitize_text_field((string) $feed->get_title()),
        'description' => sanitize_textarea_field(
            html_entity_decode(
                wp_strip_all_tags((string) $feed->get_description()),
                ENT_QUOTES,
                get_bloginfo('charset')
            )
        ),
        'image'       => $show_image,
        'episodes'    => $episodes,
    ];
}

