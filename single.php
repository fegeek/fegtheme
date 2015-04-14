<?php get_header(); ?>
<div id="site-main">
		<?php if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );
		else :
			get_template_part( 'content', 'none' );
		endif;
		?>
</div>
<?php get_footer(); ?>