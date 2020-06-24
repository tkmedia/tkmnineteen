<!-- Method MastHead -->
<?php
$brch_addtitle = get_post_meta( get_the_ID(), 'brch_adti', true );
$brch_addtext = wpautop(get_post_meta( get_the_ID(), 'brch_adtx', true ));

$brch_addwaze = get_post_meta( get_the_ID(), 'brch_adwz', true );
$brch_addgoogle = get_post_meta( get_the_ID(), 'brch_adgl', true );

$brch_timetitle = get_post_meta( get_the_ID(), 'brch_timti', true );
$brch_timetext = wpautop(get_post_meta( get_the_ID(), 'brch_timtx', true ));

$brch_contacttitle = get_post_meta( get_the_ID(), 'brch_conti', true );
$brch_phoneicon = get_field( 'brch_conphi' );
$brch_phonetext = get_post_meta( get_the_ID(), 'brch_conphtx', true );
$brch_phonelink = get_post_meta( get_the_ID(), 'brch_conphlk', true );
$brch_socialtext = get_post_meta( get_the_ID(), 'brch_sotx', true );
$brch_socialmess = get_post_meta( get_the_ID(), 'brch_somess', true );
$brch_socialwhatsa = get_post_meta( get_the_ID(), 'brch_sowa', true );
$brch_email = get_post_meta( get_the_ID(), 'brch_conem', true );
$brch_asktext = get_post_meta( get_the_ID(), 'brch_asktx', true );
$brch_asklink = get_post_meta( get_the_ID(), 'brch_asklk', true );
?>

<div id="btanch_content" class="" itemprop="text">
	<div class="btanch_content btanch_content_wrap wrap">
		<div class="btanch_content_row row-flex">
			<?php if( $brch_addtext || $brch_addwaze || $brch_addgoogle ) { ?>
			<div class="btanch_content_col branch_address col-xs-12 col-sm-4">
				
				<div class="btanch_content_title">
					<?php if( $brch_addtitle ) { echo $brch_addtitle; } else { _e('Address', 'tkmnineteen'); }	?>
				</div>
				<?php if( $brch_addtext ) { ?>
				<div class="btanch_content_text brch_addtext"><?php echo $brch_addtext; ?></div>
				<?php } ?>
				<?php if( $brch_addwaze || $brch_addgoogle ) { ?>
				<div class="brch_addlinks_row">
					<?php if( $brch_addwaze ) { ?>
					<div class="brch_addlinks_waze">
						<a href="<?php echo $brch_addwaze; ?>" class="" target="_blank">
							<img src="/wp-content/uploads/2019/12/waze.png" class="brch_addlinks_img"><br>
							<?php _e('Navigate with Waze', 'tkmnineteen'); ?>
						</a>
					</div>
					<?php } ?>
					<?php if( $brch_addgoogle ) { ?>
					<div class="brch_addlinks_google">
						<a href="<?php echo $brch_addgoogle; ?>" class="" target="_blank">
							<img src="/wp-content/uploads/2019/12/google.png" class="brch_addlinks_img"><br>
							<?php _e('Navigate with Google', 'tkmnineteen'); ?>
						</a>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
				
			</div>
			<?php } ?>
			<?php if( $brch_timetext ) { ?>
			<div class="btanch_content_col branch_opening col-xs-12 col-sm-4">
				<div class="btanch_content_title">
					<?php if( $brch_timetitle ) { echo $brch_timetitle; } else { _e('Opening Hours', 'tkmnineteen'); }	?>
				</div>
				<?php if( $brch_timetext ) { ?>
				<div class="btanch_content_text brch_timetext"><?php echo $brch_timetext; ?></div>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if( $brch_phonetext || $brch_phonelink || $brch_email || $brch_asktext ) { ?>
			<div class="btanch_content_col branch_contact col-xs-12 col-sm-4">
				<div class="btanch_content_title">
					<?php if( $brch_contacttitle ) { echo $brch_contacttitle; } else { _e('Contant Info', 'tkmnineteen'); }	?>
				</div>
				<?php if( $brch_phonetext || $brch_phonelink ) { ?>
				<div class="btanch_content_text brch_phone">
					<a href="<?php echo $brch_phonelink; ?>" class="">
						<span class="brch_phoneicon"><?php echo $brch_phoneicon; ?></span>
						<span class="brch_phonetext"><?php echo $brch_phonetext; ?></span>
					</a>
				</div>
				<?php } ?>
				<?php if( $brch_socialtext || $brch_socialmess || $brch_socialwhatsa ) { ?>
				<div class="btanch_content_text brch_social">
					<span class="brch_socialtext"><?php echo $brch_socialtext; ?></span>
					<span class="brch_socialmess"><a href="<?php echo $brch_socialmess; ?>"><i class="fab fa-facebook-messenger"></i></a></span>
					<span class="brch_socialwhatsa"><a href="<?php echo $brch_socialwhatsa; ?>"><i class="fab fa-whatsapp"></i></a></span>
					<span class="brch_emailicon only-mobile"><a href="mailto:<?php echo $brch_email; ?>"><i class="far fa-envelope"></i></a></span>
					</a>
				</div>
				<?php } ?>
				<?php if( $brch_email ) { ?>
				<div class="btanch_content_text brch_email_row">
					<a href="mailto:<?php echo $brch_email; ?>" class="">
						<span class="brch_emailicon"><i class="far fa-envelope"></i></span>
						<span class="brch_email"><?php echo $brch_email; ?></span>
					</a>
				</div>
				<?php } ?>
				<?php if( $brch_asktext || $brch_asklink ) { ?>
				<div class="btanch_content_text brch_ask">
					<a href="<?php echo $brch_asklink; ?>" class="">
						<span class="brch_asktext"><?php if( $brch_asktext ) { echo $brch_asktext; } else { _e('Ask on Google', 'tkmnineteen'); }	?></span>
						<span class="brch_askicon"><img src="/wp-content/uploads/2019/12/google-my-business.png"></span>
					</a>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>  