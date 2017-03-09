<?php if ( ! defined( 'SLZ' ) ) die( 'Forbidden' ); ?>
<?php
/**
 * The template for displaying the service detail content
 *
 * @package WordPress
 * @subpackage solazu-core
 * @since 1.0
 */


get_header();
$slz_container_css = slz_extra_get_container_class();
?>
<div class="slz-main-content padding-top-100 padding-bottom-100">
	<div class="container">
		<div class="slz-blog-detail slz-portfolio <?php echo esc_attr( $slz_container_css['sidebar_layout_class'] ); ?>">
			<div class="row">
				<div id="page-content" class="slz-content-column <?php echo esc_attr( $slz_container_css['content_class'] ); ?>">
					<?php if ( have_posts() ) :
							while ( have_posts() ) : the_post();
					?>
							<div class="project-detail-wrapper">

								<?php

								the_title( '<h1 class="title">', '</h1>' );
								printf( '<div class="slz-featured-block"><a href="%s">%s</a></div>',
									esc_url( get_permalink() ),
									get_the_post_thumbnail( get_the_ID(), 'post-thumbnail' )
								);?>
								<div class="entry-content">
									<?php
										the_content( sprintf( '<a href="%s" class="read-more">%s<i class="fa fa-angle-right"></i></a>',
														get_permalink(),
														esc_html__( 'Read more', 'seogrow' )
												) );

										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'seogrow' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</div>

								<?php
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>
							</div>

					<?php
							endwhile;
							wp_reset_postdata();
						else:
							get_template_part( 'default-templates', 'no-content' );
						endif; // have_posts
					?>

				</div>
				<?php if ( $slz_container_css['show_sidebar'] ) :?>
					<div id='page-sidebar' class="slz-sidebar-column slz-widgets <?php echo esc_attr( $slz_container_css['sidebar_class'] ); ?>">
						<?php dynamic_sidebar( $slz_container_css['sidebar'] ); ?>
					</div>
				<?php endif; ?>
				<div class="clearfix"></div>

				<?php
				$post_id  = get_the_ID();
				$related_option    = slz_get_db_settings_option('pf-related-post','');
				$show_related = slz_akg('status',$related_option, '' );

				if ( $show_related == 'show'  ){

					$filter = $filter_value = '';
					$column = absint(slz_akg('show/column',$related_option, '' ));
					if( empty($column)) {
						$column = 4;
					}
					$limit = -1;
					if( $str_limit = slz_akg('show/limit',$related_option, '' ) ) {
						$limit = $str_limit;
					}
					$filter_by = slz_akg('show/filter-by',$related_option, '' );

					if( $filter_by == 'category' ){

						$category_slug = '';
						$filter = '';
						$portfolio_categories = get_the_terms ( $post_id, 'slz-portfolio-cat' );
						if( !empty( $portfolio_categories ) ) {
							foreach( $portfolio_categories as $cat ){
								$slug[] = $cat->slug;
								$filter .= sprintf('category_slug="%1$s", ', $cat->slug);
							}
							$category_slug = implode( ',', $slug );
						}
						$filter = rtrim($filter, ', ');
						$filter_value = $category_slug;

					}else{

						$filter = 'author="%1$s"';
						$filter_value = get_post_field( 'post_author', $post_id );

					}
					?>
					<div class="related-portfolio">
						<?php
						$title = slz_akg('show/title',$related_option, '' );
							if(!empty($title)){
								echo '<div class="title">';
								echo esc_attr($title);
								echo '</div>';
							}
						echo do_shortcode( sprintf('[slz_portfolio_carousel layout="layout-1" show_category="no" description_length="15" '. $filter .' slide_to_show="%3$s" limit_post="%4$s" post__not_in="%2$s" button_text="read more" slide_dots="yes" slide_arrows="yes"]',esc_attr( $filter_value ), esc_attr( $post_id ), esc_attr($column),esc_attr($limit) ));?>
					</div>

				<?php } ?>

				<!-- end related portfolio -->

			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>