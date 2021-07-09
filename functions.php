<?php
/**
 * Theme-related functions.
 *
 * @package ⽔
 */

/**
 * Post Thumbnails.
 *
 * @see https://developer.wordpress.org/reference/functions/add_theme_support/
 */
add_theme_support( 'post-thumbnails' );

/**
 * Enqueue Styles or Scripts.
 *
 * @see https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @see https://developer.wordpress.org/reference/functions/get_stylesheet_directory_uri/
 * @see https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_style(
			'⽔',
			get_stylesheet_directory_uri() . '/style.css',
			[],
			1
		);
	}
);
/**
 * Display in the HTML <head>.
 *
 * @see index.php
 * @see https://developer.wordpress.org/reference/functions/wp_head/
 */
add_action(
	'wp_head',
	function() {
		?>
		<title><?php the_title(); ?></title>
		<meta property="og:title" content="<?php echo esc_attr( get_the_title() ); ?>">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta charset="utf-8">
		<meta property="og:image" content="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>">
		<link rel="apple-touch-icon" href="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0"><meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<?php
	}
);
/**
 * Output a menu.
 *
 * @see index.php
 * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
add_action(
	'wp_footer',
	function() {
		wp_nav_menu(
			[
				'container'      => 'nav',
				'theme_location' => 'primary',
			]
		);
	},
	-200
);
/**
 * Register a menu.
 *
 * @see index.php
 * @see https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
add_action(
	'init',
	function() {
		register_nav_menus(
			[
				'primary' => __( 'Primary', '⽔' ),
			]
		);
	}
);
/**
 * Output the default loop.
 *
 * @see index.php
 * @see https://developer.wordpress.org/reference/classes/wp_query/
 * @see https://developer.wordpress.org/reference/functions/have_posts/
 * @see https://developer.wordpress.org/reference/functions/the_post/
 * @see https://developer.wordpress.org/reference/functions/post_class/
 * @see https://developer.wordpress.org/reference/functions/the_title/
 * @see https://developer.wordpress.org/reference/functions/the_content/
 */
add_action(
	'wp_footer',
	function() {
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post(); ?>
				<article class="<?php echo esc_attr( post_class() ); ?>">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php the_post_thumbnail( 'thumbnail' ); ?>
					<?php the_content(); ?>
				</article>
			<?php
			endwhile;
		else:
			do_action( '⽔/404' );
		endif;
	},
	-100
);
/**
 * Display if no content is found.
 *
 * @see index.php.
 * @see https://developer.wordpress.org/reference/functions/get_search_form/
 */
add_action(
	'⽔/404',
	function() {
		?>
		Nothing found.
		<?php
		get_search_form();
	}
);
/**
 * Display a widget sidebar.
 *
 * @see index.php
 * @see https://developer.wordpress.org/reference/functions/dynamic_sidebar/
 */
add_action(
	'wp_footer',
	function() {
		?>
		<footer class="sidebar">
			<?php dynamic_sidebar( 'Footer' ); ?>
		</footer>
		<?php
	},
	-50
);
/**
 * Register a widget sidebar.
 * 
 * @see https://developer.wordpress.org/reference/functions/register_sidebar/
 */
add_action(
	'widgets_init',
	function() {
		register_sidebar(
			[
				'id'            => 'footer',
				'name'          => __( 'Footer', '⽔' ),
				'description'   => __( 'Displays at priorty -50 on wp_footer action.', '⽔' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);
	}
);