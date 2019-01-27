<?php

function tsumugi_setup_child() {
    add_theme_support( 'post-thumbnails' );
    add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'after_setup_theme', 'tsumugi_setup_child', 20 );

//RSSフィードとショートリンクを非表示
remove_filter( 'wp_head', 'feed_links', 2 );
remove_filter( 'wp_head', 'feed_links_extra', 3 );
remove_filter( 'wp_head', 'wp_shortlink_wp_head' );
remove_filter( 'wp_head', 'rest_output_link_wp_head' );
remove_filter( 'wp_head', 'wp_oembed_add_host_js' );

//絵文字関連コードの削除
function disable_emoji() {
     remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
     remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
     remove_action( 'wp_print_styles', 'print_emoji_styles' );
     remove_action( 'admin_print_styles', 'print_emoji_styles' );
     remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
     remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
     remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emoji' );

// Get the featured image URL
function get_featured_image_url() {
    $image_id = get_post_thumbnail_id();
    $image_url = wp_get_attachment_image_src($image_id,'thumbnail', true);
    echo $image_url[0];
}

// embed responsive
function littlebird_youtube_embed($atts) {
    extract(shortcode_atts(array(
        'id' => 0,
        'ratio' => '16by9',
    ), $atts));

    return '<div class="lb-embed"><div class="embed-responsive embed-responsive-' . $ratio . '"><iframe width="640" height="360" src="https://www.youtube.com/embed/' . $id . '?rel=0" frameborder="0" allowfullscreen></iframe></div></div>';
}
add_shortcode('youtube', 'littlebird_youtube_embed');

function littlebird_slideshare_embed($atts) {
    extract(shortcode_atts(array(
        'id' => 0,
        'ratio' => '16by9',
    ), $atts));

    return '<div class="lb-embed"><div class="embed-responsive embed-responsive-' . $ratio . '"><iframe src="https://www.slideshare.net/slideshow/embed_code/' . $id . '" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe></div></div>';
}
add_shortcode('slideshare', 'littlebird_slideshare_embed');

add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );