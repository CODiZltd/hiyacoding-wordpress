<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage SEOGrow
 * @since 1.0
 */

$seogrow_args = seogrow_404_page();
$seogrow_illustration_image = $seogrow_args['404-illustration'];
get_header(); ?>
<div class="slz-main-content">
	<div class="content-wrapper content-wrapper-404">
		<div class="container">
			<div class="page-404-content">
				<h1 class="title"><?php echo esc_html($seogrow_args['title']); ?></h1>
				<div class="subtitle"><?php echo wp_kses_post($seogrow_args['description']); ?>
				</div>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>