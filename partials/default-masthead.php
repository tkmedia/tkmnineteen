<?php
$page_masthead_title =  get_post_meta( get_the_ID(), 'masthead_title', true );
?>
<!-- MastHead -->
<div id="default_masthead" itemprop="text">	
	<div class="default_masthead intro-section">	
		<div class="default_masthead_content wrap">
			<h1 class="entry-title masthead_content_title" itemprop="headline">
				<?php if( $page_masthead_title ) { ?>
					<?php echo $page_masthead_title; ?>
				<?php } else { ?>
					<?php the_title(); ?>
				<?php } ?>
			</h1>
		</div>
	</div>
</div>


 