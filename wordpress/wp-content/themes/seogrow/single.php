<?php
/**
 * The template for displaying the blog detail content
 *
 * @package WordPress
 * @subpackage SEOGrow
 * @since 1.0
 */

get_header(); ?>

<div class="slz-main-content">

	<div class="container padding-top-100 padding-bottom-100">

		<?php
			if( $seogrow_template = seogrow_check_post_layout('posts', 'blog-layout')){
				$seogrow_template->render();
			}
			else
				get_template_part('default-templates/single');

		?>

	</div>

</div>

<?php get_footer(); ?>
