<div id="post-<?php the_ID(); ?>" <?php post_class('item');?> >
	<div class="slz-block-item-01 style-1 article-default">

		<?php if( ! is_search() ) :?>
			<?php seogrow_sticky_ribbon();?>
			<?php seogrow_post_thumbnail(); ?>
		<?php endif;?>

		<div class="block-content">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( seogrow_get_link_url() ) ), '</a></h2>' ); ?>

			<div class="block-info">
				<ul class="float-l">
					<?php seogrow_entry_meta();?>
				</ul>
				<div class="clearfix"></div>
			</div>
			
			<div class="entry-content">
				<?php if( is_search() ):?>

					<?php the_excerpt(); ?>

				<?php else:?>

					<?php the_content( sprintf( '<a href="%s" class="read-more">%s<i class="fa fa-angle-right"></i></a>',
							esc_url( get_permalink() ),
							esc_html__( 'Read more', 'seogrow' )
					) );?>

				<?php endif;?>

				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'seogrow' ) . '</span>',
						'after' => '</div>',
						'link_before' => '<span>',
						'link_after' => '</span>',
					) );
				?>
				
			</div>

			<?php if( get_post_type() == 'post' ) :?>
			<div class="entry-meta">
				<?php seogrow_categories_meta();?>
				<?php seogrow_tags_meta();?>
			</div>
			<?php endif;?>

			</div>
	</div>
</div>