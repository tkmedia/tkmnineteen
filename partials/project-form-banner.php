<?php 
$page_template_slug	= get_page_template_slug( $post->ID );
if ($page_template_slug == 'page_project.php' ) {
	$prefix = 'proj';
}
if ($page_template_slug == 'page_cat_projects.php' ) {
	$prefix = 'projc';
}

$project_form_mtitle = get_post_meta( get_the_ID(), ''.$prefix.'_fmti', true );
$project_form_msubtitle = get_post_meta( get_the_ID(), ''.$prefix.'_fmst', true );
$project_form_btn = get_post_meta( get_the_ID(), ''.$prefix.'_btn', true );
$project_form_title = get_post_meta( get_the_ID(), ''.$prefix.'_fti', true );
$project_form_subtitle = get_post_meta( get_the_ID(), ''.$prefix.'_fst', true );
$project_form = get_field(''.$prefix.'_fo');

$dproj_form_mtitle = get_option( 'options_dproj_fmt' );
$dproj_form_msubtitle = get_option( 'options_dproj_fmsu' );
$dproj_form_btn = get_option( 'options_dproj_btn' );
$dproj_form_title = get_option( 'options_dproj_ft' );
$dproj_form_subtitle = get_option( 'options_dproj_fsu' );
$dproj_form = get_field( 'dproj_form','option' );	

?>

<?php if( $dproj_form || $project_form ) { ?>
<section id="project_form_banner" class="page_section" itemprop="text">
	<div class="project_form_banner wrap">
		<div class="project_form_banner_inner">
			
			<div class="project_form_banner_title">
			<?php if( $project_form_mtitle ) { echo $project_form_mtitle; } else { echo $dproj_form_mtitle; } ?>	
			</div>
			<div class="project_form_banner_sub">
			<?php 
			if( $project_form_msubtitle ) { echo $project_form_msubtitle; } else { echo $dproj_form_msubtitle; } ?>	
			</div>
			<div class="project_form_banner_btn">
				<a data-fancybox data-src="#project_form_popup" href="javascript:;">
					<button class="section_readmore_link watch_btn hoverLink">
						<div class="button_text">
							<?php if( $project_form_btn ) { echo $project_form_btn; } else { echo $dproj_form_btn; } ?>
						</div>
					</button>
				</a>
			</div>

		</div>
	</div>
	
</section>

<div style="display: none;" id="project_form_popup" class="button-popop-form">
	<div class="button-popop-form-wrap">
		<div class="button-popop-form-row">
			<div class="button-popop-form-col form-image col-xs-12">
				<?php if( $project_form_title || $dproj_form_title ) { ?>
				<div class="contact_title_wrap">
					<div class="contact-title">
						<div class="popup_contact_title">
						<?php if( $project_form_title ) { 
							echo $project_form_title; 
						} else { 
							echo $dproj_form_title; 
						} ?>
						</div>
					</div>
					<?php } ?>
					<?php if( $project_form_subtitle || $dproj_form_subtitle ) { ?>
					<div class="contact-title">
						<div class="popup_contact_subtext">
						<?php if( $project_form_subtitle ) { 
							echo $project_form_subtitle; 
						} else { 
							echo $dproj_form_subtitle; 
						} ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="contact-form-page">
					<div class="full_form_id">
						<div class="full_form_id_wrap">
							<?php if( $project_form ) { ?>
							<?php echo do_shortcode( '[contact-form-7 id="'.$project_form.'" ]' ); ?>
							<?php } else { ?>
							<?php echo do_shortcode( '[contact-form-7 id="'.$dproj_form.'" ]' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
