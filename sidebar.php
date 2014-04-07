<div class="col-md-3">
	<div class="sidebar">
		<?php
		if (function_exists('dynamic_sidebar')){
			
			global $post, $woocommerce, $current_sidebar;
			$posttype = get_post_type($post);
			
			if( isset($current_sidebar) && !empty($current_sidebar) ){
				dynamic_sidebar($current_sidebar);
			}
			else{
				if( function_exists('is_woocommerce') && is_woocommerce() ){
					dynamic_sidebar('woocommerce-sidebar');
				}
				else if( is_page() ){
					dynamic_sidebar('page-sidebar');
				}
				else if( $posttype=='post' && is_single() ){
					dynamic_sidebar('post-sidebar');
				}
				else if( $posttype=='portfolio' ){
					dynamic_sidebar('portfolio-sidebar');
				}
				else{
					dynamic_sidebar('blog-sidebar');
				}
			}
			
		}
		?>
	</div>
</div>