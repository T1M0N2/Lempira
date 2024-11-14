<?php
/*This file is part of shop kit child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

$shop_toolkit_lite_theme = wp_get_theme();
$shop_toolkit_lite_version = $shop_toolkit_lite_theme->get('Version');
if (!defined('SHOP_TOOLKIT_LITE_VERSION')) {
	// Replace the version number of the theme on each release.
	define('SHOP_TOOLKIT_LITE_VERSION', $shop_toolkit_lite_version);
}



function shop_toolkit_lite_fonts_url()
{
	$fonts_url = '';

	$font_families = array();

	$font_families[] = 'Platypi:400,500,700';
	$font_families[] = 'Fira Sans:400,500,500i,700,700i';

	$query_args = array(
		'family' => urlencode(implode('|', $font_families)),
		'subset' => urlencode('latin,latin-ext'),
	);

	$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');


	return esc_url_raw($fonts_url);
}


function shop_toolkit_lite_enqueue_child_styles()
{
	wp_enqueue_style('shop-toolkit-lite-google-font', shop_toolkit_lite_fonts_url(), array(), null);
	wp_enqueue_style('wp-block-library');
	wp_enqueue_style('shop-toolkit-lite-parent-style', get_template_directory_uri() . '/style.css', array('shop-toolkit-main', 'bootstrap', 'shop-toolkit-google-font', 'shop-toolkit-default', 'wp-block-library', 'shop-toolkit-woocommerce-style'), '', 'all');
	wp_enqueue_style('shop-toolkit-lite-main', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), SHOP_TOOLKIT_LITE_VERSION, 'all');

	wp_enqueue_script('masonry');
}
add_action('wp_enqueue_scripts', 'shop_toolkit_lite_enqueue_child_styles');



function shop_toolkit_lite_excerpt_more($more)
{
	if (is_admin()) {
		return $more;
	}
	return '';
}
add_filter('excerpt_more', 'shop_toolkit_lite_excerpt_more', 9999);


function shop_toolkit_lite_posts_author_meta()
{

	$author_avatar = get_avatar(get_the_author_meta('user_email'), 30);
	$author_name = get_the_author();
	$post_date = get_the_date();

	$allowed_tags = array(
		'img' => array(
			'src' => true,
			'alt' => true,
			'class' => true,
			'width' => true,
			'height' => true,
		),
	);

?>

	<div class="bslite-ameta">
		<div class="ameta-img">
			<?php echo wp_kses($author_avatar, $allowed_tags); ?>
		</div>
		<div class="ameta-name-date">
			<span><?php echo esc_html($author_name); ?></span>
			<span><?php echo esc_html($post_date); ?></span>
		</div>

	</div>
<?php
}
