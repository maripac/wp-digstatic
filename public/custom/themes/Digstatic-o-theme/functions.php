<?php
/**
 * functions.php
 *
 * The theme's functions and definitions.
 */

/**
 * 1.0 - Defining constants.
 *
 */
define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/assets/images' );
define( 'SCRIPTS', THEMEROOT . '/js' );
define( 'FRAMEWORK', get_template_directory() . '/framework' );

define( 'MUFRAMEWORK', WP_CONTENT_DIR . '/admin/views' );

/**
 * 2.0 - Load the framework.
 *
 */
require_once( FRAMEWORK . '/init.php' );


/**
 * 3.0 - Set up the content width value based on the theme's design. 
 *
 *
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1125;
}

/**
 * 4.0 - Set up the theme's defaults.
 *
 *
 */
if ( ! function_exists( 'alpha_setup' ) ) {
	function alpha_setup() {
		/**
		 * Make the theme available for translation.
		 */
		$lang_dir = THEMEROOT . '/languages';
		load_theme_textdomain( 'alpha', $lang_dir );

		/**
		 * Add support for post formats.
		 *
		 */
		add_theme_support( 'post-formats',
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio'
			)
		);
		/**
		 * Add support for automatic feed links.
		 *
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add support for post thumbnails.
		 *
		 */
		add_theme_support( 'post-thumbnails' );

	}

	add_action( 'after_theme_setup', 'alpha_setup' );
}

?>
<?php
		/**
		 * Register nav menus.
		 * This adds a link to Appearance > Menus in the Dashboard. It must contain two 
		 * parameters at least as in: 
		 *
		 * register_nav_menu( $location, $description ); 
		 *
		 * Additionally you can register different menus to be displayed in diffrent views 
		 * as in:
		 *
		 * register_nav_menus(
    	 * 		array(
      	 *			'$location' => __( '$description' ),
      	 *			'$location' => __( '$description' )
    	 *		)
  		 * );
  		 *
  		 * The location will be the menu's identification name for use within the code, 
  		 * and the description will be a nice name used to display the menu's description 
  		 * in the Dashboard.
		 *
		 * register_nav_menus(
    	 *	array(
      	 *		'header-menu' => __( 'Header Menu' ),
      	 *		'extra-menu' => __( 'Extra Menu' )
    	 *	)
  		 *);
  		 */

 ?>
<?php if ( function_exists( 'register_nav_menus' ) ) : ?>

	<?php register_nav_menus(
		  array(
			'top_header_menu' => 'Menu at the very top of the page',
			'bottom_header_menu' => 'Menu Below header Banner'
			)); 
	?>

<?php endif; ?>
<?php
/**
 * 5.0 - Display meta information for a specific post.
 *
 *
 */
if ( ! function_exists( 'alpha_post_meta' ) ) {
	function alpha_post_meta() {
		echo '<ul class="list-inline entry-meta">';

		if ( get_post_type() === 'post' || 'snippets' || 'events' ) {


			// If the post is sticky, mark it.
			if ( is_sticky() ) {
				echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'alpha' ) . ' </li>';
			}

			// Get the post author.
			printf(
				'<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);


			// Get the date.
			echo '<li class="meta-date"> ' . get_the_date() . ' </li>';

			// The categories.
			$category_list = get_the_category_list( ', ' );
			if ( $category_list ) {
				echo '<li class="meta-categories"> ' . $category_list . ' </li>';
			}

			// The tags.
			$tag_list = get_the_tag_list( '', ', ' );
			if ( $tag_list ) {
				echo '<li class="meta-tags"> ' . $tag_list . ' </li>';
			}
			// Custom Taxonomies.
			$id = get_the_ID();
			$terms_list = get_the_term_list( $id, 'languages' ,  ' ' );
			if ( $terms_list ) {
				echo '<li class="meta-tax">' . $terms_list . ' </li>';
				
			}

			// Custom Taxonomies.
			/**
			 * 
			 * $id = get_the_ID();
			 * $terms_list = get_the_term_list( $id, 'languages' ,  ' ' );
			 * if ( $terms_list ) {
			 * 		echo '<li class="meta-tax">' . $terms_list . ' </li>';
			 * }
			 */

			// Custom Taxonomies.
			// Unlike custom taxonomies, custom metadata does not exist within this repo.
			// To make use of the code below activate the plugin Sample Metabox for Events
			/**
			 * $id = get_the_ID();
			 * $meta = get_post_meta($id, "_location", true);
			 * if ( $meta ) {
			 *  	echo '<li class="post-meta">' . $meta . '</li>';
			 * }
			 * $meta2 = get_post_meta($id, "_dresscode", true);
			 * if ( $meta2 ) {
			 *  	echo '<li class="post-meta">' . $meta2 . '</li>';
			 * }
			 */
			
			
			

			// Comments link.
			if ( comments_open() ) :
				echo '<li>';
				echo '<span class="meta-reply">';
				comments_popup_link( __( 'Leave a comment', 'alpha' ), __( 'One comment so far', 'alpha' ), __( 'View all % comments', 'alpha' ) );
				echo '</span>';
				echo '</li>';
			endif;

			// Edit link.
			if ( is_user_logged_in() ) {
				echo '<li>';
				edit_post_link( __( 'Edit', 'alpha' ), '<span class="meta-edit">', '</span>' );
				echo '</li>';
			}
		}

	}
}


/**
 * ----------------------------------------------------------------------------------------
 * 6.0 - Display navigation to the next/previous set of posts.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_paging_nav' ) ) {
	function alpha_paging_nav() { ?>
		<ul>
			<?php 
				if ( get_previous_posts_link() ) : ?>
				<li class="next">
					<?php previous_posts_link( __( 'Newer Posts &rarr;', 'alpha' ) ); ?>
				</li>
				<?php endif;
			 ?>
			<?php 
				if ( get_next_posts_link() ) : ?>
				<li class="previous">
					<?php next_posts_link( __( '&larr; Older Posts', 'alpha' ) ); ?>
				</li>
				<?php endif;
			 ?>
		</ul> <?php
	}
}

/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - Register the widget areas.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_widget_init' ) ) {
	function alpha_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {
			register_sidebar(
				array(
					'name' => __( 'Main Widget Area', 'alpha' ),
					'id' => 'sidebar-1',
					'description' => __( 'Appears on posts and pages.', 'alpha' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);

			register_sidebar(
				array(
					'name' => __( 'Footer Widget Area', 'alpha' ),
					'id' => 'sidebar-2',
					'description' => __( 'Appears on the footer.', 'alpha' ),
					'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);
		}
	}

	add_action( 'widgets_init', 'alpha_widget_init' );
}



// /**
//  * Create HTML list of nav menu items.
//  * Replacement for the native Walker, using the description.
//  *
//  * @see    http://wordpress.stackexchange.com/q/14037/
//  * @author toscho, http://toscho.de
//  */
// class Description_Walker extends Walker_Nav_Menu
// {
//     /**
//      * Start the element output.
//      *
//      * @param  string $output Passed by reference. Used to append additional content.
//      * @param  object $item   Menu item data object.
//      * @param  int $depth     Depth of menu item. May be used for padding.
//      * @param  array $args    Additional strings.
//      * @return void
//      */
//     function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
//     {
//         $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

//         $class_names = join(
//             ' '
//         ,   apply_filters(
//                 'nav_menu_css_class'
//             ,   array_filter( $classes ), $item
//             )
//         );

//         ! empty ( $class_names )
//             and $class_names = ' class="'. esc_attr( $class_names ) . '"';

//         $output .= "<li id='menu-item-$item->ID' $class_names>";

//         $attributes  = '';

//         ! empty( $item->attr_title )
//             and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
//         ! empty( $item->target )
//             and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
//         ! empty( $item->xfn )
//             and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
//         ! empty( $item->url )
//             and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

//         // insert description for top level elements only
//         // you may change this
//         $description = ( ! empty ( $item->description ) and 0 == $depth )
//             ? '<small class="nav_desc">' . esc_attr( $item->description ) . '</small>' : '';

//         $title = apply_filters( 'the_title', $item->title, $item->ID );

//         //$item_output = $args->before
//         //    . "<a $attributes>"
//         //    . $args->link_before
//         //    . $title
//         //    . '</a> '
//         //    . $args->link_after
//         //    . $description
//         //    . $args->after;

//         // Since $output is called by reference we don't need to return anything.
//         //$output .= apply_filters(
//         //    'walker_nav_menu_start_el'
//         //,   $item_output
//         //,   $item
//         //,   $depth
//         //,   $args
//         //);
//     }
// }



/**
 * ----------------------------------------------------------------------------------------
 * 8.0 - Function that validates a field's length.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_validate_length' ) ) {
	function alpha_validate_length( $fieldValue, $minLength ) {
		// First, remove trailing and leading whitespace
		return ( strlen( trim( $fieldValue ) ) > $minLength );
	}
}



/**
 * ----------------------------------------------------------------------------------------
 * 9.0 - Include the generated CSS in the page header.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_load_wp_head' ) ) {
	function alpha_load_wp_head() {
		// Get the logos
		$logo = IMAGES . '/icon_128x128@2x.png';
		$logo_retina = IMAGES . '/icon_128x128@2x.png';

		$logo_size = getimagesize( $logo );
		?>
		
		<!-- Logo CSS -->
		<style type="text/css">
			.site-logo a {
				background: transparent url( <?php echo $logo; ?> ) 0 0 no-repeat;
				width: <?php echo $logo_size[0] ?>px;
				height: <?php echo $logo_size[1] ?>px;
				display: inline-block;
			}

			@media only screen and (-webkit-min-device-pixel-ratio: 1.5),
			only screen and (-moz-min-device-pixel-ratio: 1.5),
			only screen and (-o-min-device-pixel-ratio: 3/2),
			only screen and (min-device-pixel-ratio: 1.5) {
				.site-logo a {
					background: transparent url( <?php echo $logo_retina; ?> ) 0 0 no-repeat;
					background-size: <?php echo $logo_size[0]; ?>px <?php echo $logo_size[1]; ?>px;
				}
			}
		</style>

		<?php
	}

	add_action( 'wp_head', 'alpha_load_wp_head' );
}


// add_action( 'add_meta_boxes', 'acme_custom_meta_box' );
// /**
//  * Defines a custom post meta box that displays directly below the
//  * post editor in the WordPress dashboard.
//  *
//  * @link    http://tommcfarlin.com/wordpress-meta-boxes-aiming-for-simplicity/
//  */
// function acme_custom_meta_box() {

// 	add_meta_box(
// 		'acme-custom-meta-box',
// 		'Acme Meta Box',
// 		'acme_render_meta_box',
// 		'post',
// 		'normal',
// 		'core'
// 	);

// }
// /**
//  * Renders the content to be displayed in the "Acme Meta Box" by requiring
//  * the file that is responsible for rendering the content.
//  *
//  * @link    http://tommcfarlin.com/wordpress-meta-boxes-aiming-for-simplicity/
//  */
// function acme_render_meta_box() {
// 	require_once get_template_directory() . '/acme-meta-box-display.php';
// }

/**
 * ----------------------------------------------------------------------------------------
 * 10.0 - Load the custom scripts for the theme.
 * ----------------------------------------------------------------------------------------
 */
// if ( ! function_exists( 'alpha_scripts' ) ) {
// 	function alpha_scripts() {
// 		// Adds support for pages with threaded comments
// 		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 			wp_enqueue_script( 'comment-reply' );
// 		}

// 		// Register scripts
// 		wp_register_script( 'bootstrap-js', 'http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js', array( 'jquery' ), false, true );
// 		wp_register_script( 'alpha-custom', SCRIPTS . '/scripts.js', array( 'jquery' ), false, true );

// 		// Load the custom scripts
// 		wp_enqueue_script( 'bootstrap-js' );
// 		wp_enqueue_script( 'alpha-custom' );

// 		// Load the stylesheets
// 		wp_enqueue_style( 'font-awesome', THEMEROOT . '/css/font-awesome.min.css' );
// 		wp_enqueue_style( 'alpha-master', THEMEROOT . '/css/master.css' );
// 	}

// 	add_action( 'wp_enqueue_scripts', 'alpha_scripts' );
// }