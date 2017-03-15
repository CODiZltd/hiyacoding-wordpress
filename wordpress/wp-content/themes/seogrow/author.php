<?php
/**
 * The template for displaying author detail.
 *
 * @package WordPress
 * @subpackage SEOGrow
 * @since 1.0
 */

get_header();
$seogrow_container = seogrow_get_container_class( 'author-article-style' );
?>

	<div class="slz-main-content">

		<?php echo seogrow_show_title( '<div class="archive-header"><div class="container"><h1 class="title">', '</h1></div></div>' ); ?>

		<div class="container">

			<div class="slz-blog-detail <?php echo esc_attr( $seogrow_container['sidebar_layout_class'] ); ?> margin-top-100 margin-bottom-100">

				<div class="row">

					<div id="page-content" class="<?php echo esc_attr($seogrow_container['content_class'] ); ?> slz-content-column">

						<?php if ( have_posts() ) : ?>
							<div class="post-by-author"><?php echo esc_html__( 'POSTS BY AUTHOR', 'seogrow' ) ?></div>
							<div class="sc_block_posts">
								<div class="slz-list-block <?php echo esc_attr( $seogrow_container['block_class'] ); ?>">

									<?php

										if ( $seogrow_template = seogrow_check_article_layout('articles', 'author-article-style') ) {

											while ( have_posts() ) : the_post();

												$seogrow_template->render( $post );

											endwhile;

										}
										else{

											while ( have_posts() ) : the_post();

												get_template_part( 'default-templates/article' );

											endwhile;

										}

									?>

								</div>
							</div>

							<?php seogrow_posts_pagination();?>

						<?php

						else :
							get_template_part( 'default-templates/no-content' );

						endif;
						?>
						
					</div>

					<?php if( $seogrow_container['show_sidebar']):?>

						<div id="page-sidebar" class="<?php echo esc_attr($seogrow_container['sidebar_class'])?> slz-sidebar-column slz-widgets">

							<?php seogrow_get_sidebar($seogrow_container['sidebar']);?>

						</div>

					<?php endif; ?>

					<div class="clearfix"></div>

				</div>

			</div>

		</div>

	</div>

<?php get_footer(); ?>
