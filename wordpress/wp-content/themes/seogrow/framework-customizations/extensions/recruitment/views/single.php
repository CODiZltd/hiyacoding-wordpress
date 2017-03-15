<?php if ( ! defined( 'SLZ' ) ) die( 'Forbidden' ); ?>
<?php
/**
 * The template for displaying the recruitment detail content
 *
 */


get_header();
$slz_container_css = slz_extra_get_container_class();

$html_options['title_format'] = '<h1 class="title">%1$s</h1>';
$html_options['recruit_type_format'] = '<li class="type">'.esc_html__('Type: ','seogrow').'<span>%1$s</span></li>';
$html_options['expired_date_format'] = '<li class="date-post">'.esc_html__('Date expired: ','seogrow').'<span>%1$s</span></li>';
$html_options['salary_format'] = '<li class="salary">'.esc_html__('Salary Range: ','seogrow').'<span>%1$s</span></li>';
$html_options['location_format'] = '<li class="location">'.esc_html__('Location: ','seogrow').'<span>%1$s</span></li>';
$html_options['html_format'] = '
    <div class="slz-featured-block">
        %1$s
        <ul class="block-info">
            %2$s
            %6$s
            %3$s
            %4$s
            %5$s
        </ul>
    </div>
    ';
?>
<div class="slz-main-content padding-top-100 padding-bottom-100">
	<div class="container">
		<div class="slz-blog-detail slz-recruitments <?php echo esc_attr( $slz_container_css['sidebar_layout_class'] ); ?>">
			<div class="row">
				<div id="page-content" class="slz-content-column <?php echo esc_attr( $slz_container_css['content_class'] ); ?>">
					<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							$post_id = get_the_ID();
							$args = array(
								'post_id'    => array( $post_id ),
							);
							$model = new SLZ_Recruitment();
							$model->init( $args );
							?>
							<div class="recruitment-detail-wrapper">
								<?php
								if( $model->query->have_posts() ) {
									$model->html_format = $model->set_default_options( $html_options );
									echo '<div class="slz-about-me-02 style-02">';
									while ( $model->query->have_posts() ) {
										$model->query->the_post();
										$model->loop_index();
										printf( $html_options['html_format'],
											$model->get_title( $html_options ),
											$model->get_recruit_type(),
											$model->get_expired_date(),
											$model->get_location(),
											$model->get_salary(),
											$model->get_more_info()
										);
									}
									$model->reset();
									echo '</div>';
								}
								?>
								<div class="entry-content">
									<?php
									the_content( sprintf( '<a href="%s" class="read-more">%s<i class="fa fa-angle-right"></i></a>',
										get_permalink(),
										esc_html__( 'Read more', 'seogrow' )
									) );
									?>

								</div>
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
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
