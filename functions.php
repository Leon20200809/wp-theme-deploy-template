<?php
// 定数定義
$stylesheet_dir = get_stylesheet_directory_uri();
$file_dir = get_template_directory_uri();

// CSS・JSファイルの読み込み
function my_enqueue_styles(){
    global $stylesheet_dir;
    wp_enqueue_style('reset', $stylesheet_dir . '/css/reset.css', array());
    wp_enqueue_style('style', $stylesheet_dir . '/style.css', array('reset'));

    wp_enqueue_style('reset', $stylesheet_dir . '/css/style-c1.css', array('style'));

    wp_enqueue_script('jquery');
    wp_enqueue_script('inview', $stylesheet_dir . '/js/jquery.inview.min.js', array('jquery'));
    wp_enqueue_script('main', $stylesheet_dir . '/js/main.js', array('jquery', 'inview'));
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
} 

// 投稿ページのサムネイル画像 有効化
add_theme_support('post-thumbnails');//両方

// ナビメニューの登録
function mytheme_setup() {
    register_nav_menus([
        'header-menu' => 'ヘッダーメニュー',
    ]); 
}
add_action('after_setup_theme', 'mytheme_setup');
