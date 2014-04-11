<?php
	get_header();


	// Master change 2 
	// Platea, tincidunt sociis, tempor, proin parturient scelerisque sit vel lectus, hac, aenean augue pulvinar, nascetur facilisis elementum scelerisque aliquam? Scelerisque hac a sit, magna, diam rhoncus et, in, placerat a! Tristique cras in a porta parturient? Sit et pulvinar aliquam, odio adipiscing est mauris purus! Aenean in porta, tincidunt enim, cum nec elementum hac. Et nascetur, rhoncus turpis porta cum.
?>

<!-- Start Content
==================================================
Platea, tincidunt sociis, tempor, proin parturient scelerisque sit vel lectus, hac, aenean augue pulvinar, nascetur facilisis elementum scelerisque aliquam? Scelerisque hac a sit, magna, diam rhoncus et, in, placerat a! Tristique cras in a porta parturient? Sit et pulvinar aliquam, odio adipiscing est mauris purus! Aenean in porta, tincidunt enim, cum nec elementum hac. Et nascetur, rhoncus turpis porta cum.
-->
<section class="primary section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-9">
						<div class="content">
							<div class="row">
								<div class="col-md-12">
									<?php
									global $layout_sidebar;
									$layout_sidebar = 'with-sidebar';
		                            if (have_posts()) :
		                            	$loop_args = array(
							                            'overlay' => 'none',
							                            'excerpt' => 'both',
							                            'readmore' => __('Read more', 'themeton'),
							                            'grid' => '1',
							                            'element_style' => 'default'
						                            );
		                            	$result = '';
		                                while (have_posts()) : the_post();
		                                	ob_start();
		                                    blox_loop_regular($loop_args);
		                                    $result .= ob_get_contents();
		                                    ob_end_clean();
		                                endwhile;

		                                $pager_html = '';
		                                ob_start();
							            themeton_pager();
							            $pager_html .= ob_get_contents();
							            ob_end_clean();

		                                echo '<div class="blox-element blog medium-loop">
						                        <div class="row">
						                            <div class="col-md-12">'.$result.'</div>
						                        </div>
						                        '. $pager_html .'
						                      </div>';
		                            endif;
		                            ?>
								</div>
							</div>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Content
================================================== -->


<?php
	get_footer();
?>