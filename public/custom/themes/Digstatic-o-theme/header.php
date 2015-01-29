<?php 
/**
 * header.php
 *
 * The header for the theme.
 */
?>

<?php 
	// IMAGES is Themeroot slash assets slash images
	$favicon = IMAGES . '/icons/icon_32x32@2x.png';
	$touch_icon = IMAGES . '/icons/icon_128x128@2x.png';


	$styles = THEMEROOT . '/style.css';
	$js = THEMEROOT . '/assets/js';
	
	
	$vendor = THEMEROOT . '/assets/vendor';
	$vendor_styles = THEMEROOT . '/assets/vendor/css';
	$js_vendor = THEMEROOT . '/assets/vendor/js';
	$img_vendor = THEMEROOT . '/assets/vendor/img';
?>

<!doctype html>
<!--
          _           _     _       _   _                            _        _   ___  
         | |         | |   (_)     | | | |                          | |      | | |__ \ 
__      _| |__   __ _| |_   _ ___  | |_| |__   ___    __ _  ___  ___| |_ __ _| | __ ) |
\ \ /\ / / '_ \ / _` | __| | / __| | __| '_ \ / _ \  / _` |/ _ \/ __| __/ _` | |/ // / 
 \ V  V /| | | | (_| | |_  | \__ \ | |_| | | |  __/ | (_| | (_) \__ \ || (_| |   <|_|  
  \_/\_/ |_| |_|\__,_|\__| |_|___/  \__|_| |_|\___|  \__, |\___/|___/\__\__,_|_|\_(_)  
                                                      __/ |                            
                                                     |___/                             
-->

<!--[if lt IE 7]><html class="no-js ie ie6 lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 7]><html class="no-js ie ie7 lt-ie9 lt-ie8" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 8]><html class="no-js ie ie8 lt-ie9" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<link rel="apple-touch-icon" href="apple-touch-icon.png">-->
        <!-- Place favicon.ico in the root directory -->

        <!--<link rel="stylesheet" href="/assets/css/normalize.css">-->
        <!--<link rel="stylesheet" href="css/main.css">-->
        <link rel="stylesheet" href="<?php echo $styles; ?>">
        <!--<script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>-->
        <!-- Favicon and Apple Icons -->
		<link rel="shortcut icon" href="<?php echo $favicon; ?>">
		<link rel="apple-touch-icon-precomposed" sizes="128x128" href="<?php echo $touch_icon; ?>">



        <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<!-- HEADER -->
	<header class="site-header" role="banner">
		<div class="container header-contents">
		  <div class="row">
			<div class="banner-portada">
					<div class="site-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
					</div> <!-- end site-logo -->
			</div> <!-- end portada --> 
				
		   </div> <!-- end row -->
		</div> <!-- end container -->
	</header> <!-- end site-header -->


	<div class="container-frame">
		<div class="row">
			<div class="nav-portada">
				<nav class="site-navigation" role="navigation">


					<?php  if(function_exists('wp_nav_menu')) : // Checks if this version of WP supports menus ?>
	
						<?php wp_nav_menu(
							array(
								'theme_location'		=> 'top_header_menu',	// Link this menu to a registered location
								'container'       		=> FALSE,				// specify div as container wrapper
								'container_id'    		=> FALSE,				// ID for container wrapper div
								'depth'          		=> 2,					
								'menu_class'      		=> 'top-menu-list'		// class on UL
							));
						?>
	
					<?php else: // If custom menus not support then the following code will be executed instead ?>
						<div class="menu">
				        	<ul>
						   		<?php wp_list_pages('title_li='); ?>
				           </ul>
						</div>
					<?php endif; // ends the conditional argument ?>

					<?php
				    /**
					 * if ( has_nav_menu( 'page_a' ) ) {
					 *   wp_nav_menu( array( 'theme_location' => 'page_a' ) );
					 * } else {
					 *   wp_nav_menu( array( 'theme_location' => 'parent_page' ) );
					 * }
					 *
					 *	//if ( has_nav_menu( 'main-menu' ) ) {
					 *   	// User has assigned menu to this location;
					 *   	// output it
					 *		wp_nav_menu(
					 *		    array (
					 *		    	'theme_location'  => 'header-menu',
					 *		        'menu'            => 'header-menu',
					 *		        'container'       => FALSE,
					 *		        'container_id'    => FALSE,
					 *		        'menu_class'      => '',
					 *		        'menu_id'         => FALSE,
					 *		        'depth'           => 1,
					 *		        'walker'          => new Description_Walker
					 *		    )
					 *		);
					 *	//}
					 */
					 ?>	
					<?php
					 /** 
					  *	wp_nav_menu(
					  *	array(
					  *		'theme_location' => 'main-menu',
					  *		'menu_class' => 'site-menu'
					  *	)
					  *);
					  */

					 /** 
					  *	wp_nav_menu(
					  *	array(
					  *		'menu'            => 'main-menu',
					  *		'container'       => FALSE,
					  *		'container_id'    => FALSE,
					  *		'menu_class'      => '',
					  *		'menu_id'         => FALSE,
					  * 	'depth'           => 1,
					  * 	'walker'          => new Description_Walker
					  * )
					  *);
					  */

					?>
				</nav>
			</div> <!-- end nav-portada -->
		</div><!--end menu row-->
	</div><!--end menu container-frame-->
	

	<!-- MAIN CONTENT AREA -->
	<div class="container-frame">
		<div class="row">