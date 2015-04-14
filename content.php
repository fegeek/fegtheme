<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
    <?php if(!is_singular()): ?>
		<?php if(has_post_thumbnail()): ?>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
                <?php the_title( '<h2>', '</h2>' ); ?>
            </a>
        <?php else: ?>
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <?php endif; ?>
    <?php else: the_title( '<h1 class="entry-title">', '</h1>' ); endif; ?>
        <h4><?php the_date('Y-m-d'); ?></h4>
    </header>
    <div class="entry-content">
        <?php the_content("");?>
    </div>
    <footer class="entry-footer">
    <?php if ( is_single() ) : the_tags('<p class="post_tags">标签： ', '', '</p>'); else: ?>
		<a class="read-more" href="<?php the_permalink(); ?>">查看全文</a>
    <?php endif; ?>
    </footer>
</article>