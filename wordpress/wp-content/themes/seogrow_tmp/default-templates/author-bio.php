<?php
$author_id = get_the_author_meta( 'ID' );
if(empty($author_id)) {
	$author_id = get_query_var('author');
}
if( empty($author_id) ) return;

$author_url = get_author_posts_url( $author_id );
$author_desc = get_the_author_meta( 'description', $author_id );
$author_web = get_the_author_meta( 'url', $author_id );
$author_social = '';

if ( defined( 'SLZ' ) ) {
	$social_arr = SLZ_Params::get('social-icons');
	foreach ($social_arr as $key => $value) {
		$social_val = get_the_author_meta( $key,$author_id );
		if(!empty($social_val)){
			$author_social .= '<a href="'.esc_url($social_val).'" class="link author-'.esc_attr($key).'" target="_blank"><i class="icons fa fa-'.$key.'"></i></a>';
		}
	}
	
}
?>
<div class="slz-blog-author media">
	<div class="media-left">
		<a href="<?php echo esc_url( $author_url )?>" class="media-image thumb"><?php echo get_avatar($author_id, 100); ?></a>
	</div>
	<div class="media-right">
		<a href="<?php echo esc_url( $author_url )?>" title="" class="author"><?php echo get_the_author_meta('display_name', $author_id); ?></a>
		<?php if(!empty($author_web)){?>
			<a href="<?php echo esc_url( $author_web );?>" title="" target="_blank" class="author-web"><?php  echo esc_attr( $author_web ); ?></a>
		<?php } ?>
		<div class="clearfix"></div>
		<?php 
		if(!empty($author_social)){
			echo '<div class="social">';
				echo wp_kses_post($author_social);
			echo '</div>';
		}
		?>
		<div class="des"><?php echo nl2br( esc_textarea( $author_desc ) ) ?></div>
	</div>
</div>
