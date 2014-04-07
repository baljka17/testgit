<!DOCTYPE HTML>
<!--[if IE 6]>
<html class="oldie ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html class="oldie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="oldie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    
    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="<?php echo get_template_directory_uri(); ?>/assets/plugins/html5shiv.js"></script>
    <![endif]-->

	<title> <?php wp_title("|",true, 'right'); ?> <?php if (!defined('WPSEO_VERSION')) { bloginfo('name'); } ?></title>
	
	<!-- Favicons -->
	<?php tt_icons(); ?>
   	<?php
   		global $smof_data;

   		$body_classes = $nav_fixed = '';
   		if(isset($smof_data['layout']) && $smof_data['layout'] == 'boxed'){ $body_classes .= 'boxed '; }
   		if(isset($smof_data['use_responsive']) && $smof_data['use_responsive'] != 1){ $body_classes .= 'non-responsive '; }
   		else { echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">'; }
   		if(isset($smof_data['use_responsive'],$smof_data['fixed_menu']) && $smof_data['fixed_menu'] == 1){ $nav_fixed = 'navbar-fixed-top'; }

   	?>
   	<?php wp_head(); ?>
</head>
<body <?php body_class($body_classes); ?>>


	<div class="layout-wrapper">

		<?php
		/* Page Top Slider */
		getPageSlider(true);
		?>

		<div id="header_spacing" class="hidden-xs" style="height: 80px;"></div>
		<!-- Start Header
		================================================== -->
		<header id="header" class="navbar navbar-inverse <?php echo $nav_fixed; ?>" role="banner">

			<?php if( isset($smof_data['top_bar']) && $smof_data['top_bar'] == 1 && tt_getmeta('hide_topbar')!='1' ) : ?>
			<div id="top-bar" class="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="top-bar-left">
								<?php tt_bar_content($smof_data['top_bar_left']); ?>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="top-bar-right text-right">
								<?php tt_bar_content($smof_data['top_bar_right']); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; //top bar ?>
			
			<div class="container">
				<div class="row">
					<div class="navbar-header">
						<!-- Your Logo -->
						<?php tt_site_logo(); ?>
					</div>
					<!-- Start Navigation -->
					<nav class="mainmenu pull-right visible-lg visible-md" role="navigation">
						<?php
					  		render_mega_nav();
					  	?>

					  	<?php 
					  	// Search Box
					  	if( isset($smof_data['search_box']) && $smof_data['search_box'] == 1):
					  		echo '<div class="header-search"><a class="search-icon"><i class="icon-magnifier"></i></a>';
					  		get_search_form();
					  		echo '</div>';
					  	endif; ?>
					</nav>

					<!-- MOBILE MENU START -->
					<div id="mobile-menu-wrapper" class="visible-xs visible-sm" data-skin="<?php echo isset($smof_data['mobile_menu_dark']) ? $smof_data['mobile_menu_dark'] : '0'; ?>">
						<?php get_mobile_cart_holder(); ?>
						<a class="mobile-menu-icon" href="#mobile-menu"><i class="fa-align-justify"></i></a>
						<div class="mobile-menu-content">
							<?php wp_nav_menu(array('theme_location' => 'mobile-menu', 
													'fallback_cb' => '',
													'menu_class'=>'list-inline',
													'container_id'=>'mobile-menu',
													'container'=>'nav' )); ?>
						</div>
					</div>
					<!-- MOBILE MENU END -->


					<!-- WOOCOMMERCE MOBILE CART START -->
					<?php
					if( class_exists( 'woocommerce' ) ):
						ob_start();
		                woocommerce_mini_cart();
		                $mini_cart = ob_get_clean();
					?>
					<div id="mobile-cart-wrapper" class="hidden">
						<div class="mobile-cart-content">
							<?php echo $mini_cart; ?>
						</div>
						<div class="mobile-cart-tmp">
							<nav id="mobile-cart" class="woocommerce"></nav>
						</div>
					</div>
					<?php endif; ?>
					<!-- WOOCOMMERCE MOBILE CART END -->

				</div>
			</div>
		</header>
		<!-- ==================================================
		End Header -->