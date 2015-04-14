<?php
/*Remove Google Fonts*/
function remove_open_sans() {
	wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
}
add_action( 'admin_enqueue_scripts', 'remove_open_sans' );
add_action('wp_enqueue_scripts', 'remove_open_sans');

/*WP Title Function*/
function fe_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	}
	$title .= get_bloginfo( 'name', 'display' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( '第%s页' ), max( $paged, $page ) );
	}
	return $title;
}
add_filter( 'wp_title', 'fe_wp_title', 10, 2 );

/*Theme Header Scripts*/
function fe_scripts() {
	wp_enqueue_style( 'fe-style', get_stylesheet_uri() , array(), '0.1' );
}
add_action( 'wp_enqueue_scripts', 'fe_scripts' );

function mytheme_get_avatar($avatar) {
    $avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"gravatar.duoshuo.com",$avatar);
    return $avatar;
}
add_filter( 'get_avatar', 'mytheme_get_avatar', 10, 3 );

/*upload Files Rename*/
add_filter('wp_handle_upload_prefilter', 'custom_upload_filter' );
function custom_upload_filter( $file ){
	$info = pathinfo($file['name']);
	$ext = '.' . $info['extension'];
	$md5 = md5($file['name']);
    $file['name'] = $md5.$ext;
    return $file;
}

/* thumbnails */
add_theme_support( 'post-thumbnails' );

if ( ! function_exists( 'fegeek_post_thumbnail' ) ) :
function fegeek_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( !is_singular() ) :
	?>


	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
	</a>

	<?php endif; // End is_singular()
}
endif;


























