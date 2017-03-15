<?php if ( ! defined( 'SLZ' ) ) die( 'Forbidden' ); ?>
<?php
/**
 * The template for displaying the team detail content
 *
 *
 * @package WordPress
 * @subpackage solazu-core
 * @since 1.0
 */

get_header();
$slz_container_css = slz_extra_get_container_class();
$ext = slz()->extensions->get( 'teams' );
$html_format = '
	<div class="slz-about-me-02 slz-block-team-03 ">
		<div class="block-wrapper">
			<div class="image-wrapper">
				<div class="slz-block-team-01">
					<div class="team-img">
						%1$s
					</div>
					<div class="team-body">
						<div class="main-info">
							%2$s
							%3$s
						</div>
						<div class="social-list">%6$s</div>
					</div>
				</div>
			</div>
			<div class="content-wrapper">
				<div class="content-title">'.esc_html__('Something About Me','seogrow').'</div>

				<div class="content-text">
					%7$s
				</div>
				
				%8$s

				<div class="content-title">'.esc_html__('Contact Me','seogrow').'</div>

				<div class="contact-info">
					%4$s
				</div>

			</div>
		</div>
	</div>
	';
?>
<div class="slz-main-content padding-top-100 padding-bottom-100">
	<div class="container">
		<div class="slz-blog-detail slz-teams <?php echo esc_attr( $slz_container_css['sidebar_layout_class'] ); ?>">
			<div class="row">
				<div class="slz-content-column <?php echo esc_attr( $slz_container_css['content_class'] ); ?>">
					<?php if ( have_posts() ) : 
							while ( have_posts() ) : the_post();
								$post_id = get_the_ID();
								$image_size = array(
									'large'				=> 'full',
									'no-image-large'	=> 'full',
								);
								$defaults = $ext->get_config('default_values');
								$args = array(
												'post_id'    => array( $post_id ),
												'image_size' => $image_size,
												'show_contact_info' => 'yes'
											);
								$args = array_merge( $defaults, $args );
								$model = new SLZ_Team();
								$model->init( $args );
					?>
							<div class="teams-detail-wrapper">
								<div class="slz-team-slider-03">
									<?php $model->render_team_carousel_sc( array( 'html_format' => $html_format ) ); ?>
								</div>
								<div class="entry-content">
									<?php
										the_content( sprintf( '<a href="%s" class="read-more">%s<i class="fa fa-angle-right"></i></a>',
														get_permalink(),
														esc_html__( 'Read more', 'seogrow' )
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
					<div class="slz-sidebar-column slz-widgets <?php echo esc_attr( $slz_container_css['sidebar_class'] ); ?>">
						<?php slz_extra_get_sidebar( $slz_container_css['sidebar'] ); ?>
					</div>
				<?php endif; ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>