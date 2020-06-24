<?php 
$product_block_width = get_sub_field('prb_bW');
$product_order = get_sub_field('prb_or');
$product_mobile = get_sub_field('prb_mo');
$product_hide_mobile = get_sub_field('prb_hMo');
$product_break = get_sub_field('prb_br');
$product_block_align = get_sub_field('prb_bAl');

$product = get_sub_field('prb');
$product_animation = get_sub_field('prb_an');

if ( $product_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $product_mobile;?> <?php echo $product_block_width;?> <?php if( $product_break ){ ?><?php echo $product_block_align; ?><?php } ?>" <?php if( $product_order ){ ?>style="order:<?php echo $product_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $product_animation;?>">

		<div class="flex_product_container flexible_page_element" itemprop="text">
		    <div class="product_block">
			    
				<?php				
				if( $product ): 
				
					// override $post
					$post = $product;
					setup_postdata( $post ); 
					$product_id = wc_get_product( $post->ID );
				
					?>
				    <div class="product_item_wrap">
					    <div class="product_image">
						    
						    <?php echo the_post_thumbnail('full'); ?>
						    <div class="product_item_info_mobile">
							    <div class="product_item_name">
								    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							    </div>
							    <div class="product_item_price"><?php echo $product_id->get_price(); ?> <?php echo get_woocommerce_currency_symbol(); ?></div>
						    </div>						    
					    </div>
					    <div class="product_item_info_row">
						    <div class="product_item_info_right">
							    <div class="product_item_name">
								    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							    </div>
							    <div class="product_item_price"><?php echo $product_id->get_price(); ?> <?php echo get_woocommerce_currency_symbol(); ?></div>
						    </div>
						    <div class="product_item_info_left">
							    <div class="product_item_catgory">
									<?php
									$args = array( 'taxonomy' => 'product_cat',);
									$terms = wp_get_post_terms($post->ID,'product_cat', $args);
									 
									$count = count($terms);
									if ($count > 0) {
										foreach ($terms as $term) {
											?>
											<div class="woo_product_category">
												<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="<?php echo $term->slug; ?>" rel="tag">
													<span class="cat_name_pre desktop_view"><?php _e('To Category', 'tkmnineteen'); ?></span>
													<span class="cat_name_pre mobile_view"><?php _e('More', 'tkmnineteen'); ?></span>
													<span class="cat_name"><?php echo $term->name; ?></span>
												</a>
											</div>
											<?php
										}
									}
									?>
							    </div>
							    <div class="product_item_page">
								    <div class="woo_product_link woocommerce">
									    <div class="woo_add_to_cart">
										    <i class="fal fa-shopping-bag"></i>
										    <?php woocommerce_template_loop_add_to_cart(); ?>
									    </div>
								    </div>
							    </div>
						    </div>
					    </div>
					    
				    </div>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
			    
			    
		    </div>
		</div>
		
	</section>
</div>
<?php if( $product_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
