<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$interval_option = wp_get_schedules();
$interval_option_array = array();
foreach ($interval_option as $key => $value) {
	$interval_option_array[$key] = $value['display'];
}

global $wp_styles, $wp_scripts;

$registered_wp_styles = array();
$registered_wp_scripts = array();

if ( !empty ( $wp_styles->registered ) ) {
	foreach ($wp_styles->registered as $key => $value) {
		$registered_wp_styles[$key] = $key;
	}
}

if ( !empty ( $wp_scripts->registered ) ) {
	foreach ($wp_scripts->registered as $key => $value) {
		$registered_wp_scripts[$key] = $key;
	}
}

$options = array(
	'speed_optimize_tab' => array(
		'title'   => esc_html__( 'Optimize Performance', 'seogrow' ),
		'type'    => 'tab',
		'options' => array(
			'minify_tab'  => array(
				'title'   => esc_html__( 'Minify Resource', 'seogrow' ),
				'type'    => 'tab',
				'options' => array(
					'general_box'        => array(
						'title'   => esc_html__( 'General Configuration', 'seogrow' ),
						'type'    => 'box',
						'options' => array(
							'js_status'	=>	array(
								'type'  => 'switch',
								'value' => 'disable',
								'label' => esc_html__('JavaScript Minification', 'seogrow'),
								'desc'  => esc_html__('Enable / Disable javaScript minification', 'seogrow'),
								'left-choice' => array(
									'value' => 'enable',
									'label' => esc_html__('Enable', 'seogrow'),
								),
								'right-choice' => array(
									'value' => 'disable',
									'label' => esc_html__('Disable', 'seogrow'),
								),
							),
							'css_status'	=>	array(
								'type'  => 'switch',
								'value' => 'disable',
								'label' => esc_html__('Stylesheet Minification', 'seogrow'),
								'desc'  => esc_html__('Enable / Disable stylesheet minification', 'seogrow'),
								'left-choice' => array(
									'value' => 'enable',
									'label' => esc_html__('Enable', 'seogrow'),
								),
								'right-choice' => array(
									'value' => 'disable',
									'label' => esc_html__('Disable', 'seogrow'),
								),
							),
							'clear_minify'	=>	array(
								'type'  => 'slz-minify',
								'button_text' => 'Delete Minify Files',
								'label' => esc_html__('Delete Minify Files', 'seogrow'),
								'desc'  => esc_html__('Minify files are stored on your server as .js and .css files. If you need to delete them, use the button below.', 'seogrow'),
							),
						)
					),
					'advance_box'        => array(
						'title'   => esc_html__( 'Advanced Settings', 'seogrow' ),
						'type'    => 'box',
						'options' => array(
							'minify_cache_time'	=>	array(
								'type'  => 'short-text',
								'label' => esc_html__('Cache Time', 'seogrow'),
								'desc'  => esc_html__('Cache Time (seconds)', 'seogrow'),
								'value' => '3600'
							),
							'js_placement'	=>	array(
								'type'  => 'select',
								'value' => 'header-footer',
								'label' => esc_html__('JavaScript Placement', 'seogrow'),
								'desc'  => esc_html__('JavaScript Placement', 'seogrow'),
								'choices' => array(
									'header-footer' => esc_html__('Both header and footer', 'seogrow'),
									'header' => esc_html__('All in header', 'seogrow'),
									'footer' => esc_html__('All in footer', 'seogrow'),
								),
							),
							'js_async_tag'	=>	array(
								'type'  => 'switch',
								'value' => 'disable',
								'label' => esc_html__('Using Async Tag', 'seogrow'),
								'desc'  => esc_html__('Using async tag in javascript tag', 'seogrow'),
								'left-choice' => array(
									'value' => 'enable',
									'label' => esc_html__('Enable', 'seogrow'),
								),
								'right-choice' => array(
									'value' => 'disable',
									'label' => esc_html__('Disable', 'seogrow'),
								),
							),
						)
					)
				)
			),
			'browser_cahe_tab'  => array(
				'title'   => esc_html__( 'Browser Cache', 'seogrow' ),
				'type'    => 'tab',
				'options' => array(
					'general_box'        => array(
						'title'   => esc_html__( 'General Configuration', 'seogrow' ),
						'type'    => 'box',
						'options' => array(
							'data_gzip_status'	=>	array(
								'type'  => 'switch',
								'value' => 'disable',
								'label' => esc_html__('Gzip Compression', 'seogrow'),
								'desc'  => esc_html__('Enable / Disable gzip compression', 'seogrow'),
								'left-choice' => array(
									'value' => 'enable',
									'label' => esc_html__('Enable', 'seogrow'),
								),
								'right-choice' => array(
									'value' => 'disable',
									'label' => esc_html__('Disable', 'seogrow'),
								),
							),
							'data_leverage_browser_caching_status'   => array(
								'type'   => 'multi-picker',
								'label'  => false,
								'desc'   => false,
								'picker' => array(
									'leverage_browser_caching' => array(
										'type'  => 'switch',
										'value' => 'disable',
										'label' => esc_html__( 'Leverage Browser Caching', 'seogrow' ),
										'left-choice' => array(
											'value' => 'enable',
											'label' => esc_html__('Enable', 'seogrow'),
										),
										'right-choice' => array(
											'value' => 'disable',
											'label' => esc_html__('Disable', 'seogrow'),
										),
									),
								),
								'choices' => array(
									'enable' => array(
										'html_expire_time' => array(
											'type'  => 'text',
											'value' => '3600',
											'label' => esc_html__('HTML Expire Time', 'seogrow'),
										),
										'cssjs_expire_time' => array(
											'type'  => 'text',
											'value' => '31536000',
											'label' => esc_html__('CSS JS Expire Time', 'seogrow'),
										),
										'other_expire_time' => array(
											'type'  => 'text',
											'value' => '31536000',
											'label' => esc_html__('Other Expire Time', 'seogrow'),
										),
									),
								),
							),
						)
					),
				)
			),
			'page_cache_tab'  => array(
				'title'   => esc_html__( 'Page Cache', 'seogrow' ),
				'type'    => 'tab',
				'options' => array(
					'page_cache_general_box'        => array(
						'title'   => esc_html__( 'General Configuration', 'seogrow' ),
						'type'    => 'box',
						'show_borders'	=> 'true',
						'options' => array(
							'page_cache_status'	=>	array(
								'type'  => 'switch',
								'value' => 'disable',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'label' => esc_html__('Page Cache Status', 'seogrow'),
								'desc'  => esc_html__('Enable / Disable page cache', 'seogrow'),
								'left-choice' => array(
									'value' => 'enable',
									'label' => esc_html__('Enable', 'seogrow'),
								),
								'right-choice' => array(
									'value' => 'disable',
									'label' => esc_html__('Disable', 'seogrow'),
								),
							),
							'clear_cache'	=>	array(
								'type'  => 'slz-cache',
								'button_text' => 'Delete Cache',
								'label' => esc_html__('Delete Cached Pages', 'seogrow'),
								'desc'  => esc_html__('Cached pages are stored on your server as html and PHP files. If you need to delete them, use the button below.', 'seogrow'),
							),
							'cache_compress_content' => array(
								'label'	=> esc_html__('Compress Content', 'seogrow'),
								'type'  => 'checkbox',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'text'	=> esc_html__('Compress pages so they are served more quickly to visitors (Recommended).', 'seogrow'),
								'desc'  => 'Compression is disabled by default because some hosts have problems with compressed files. Switching it on and off clears the cache.',
								'value' => false,
							),
							'cache_user_logged_in' => array(
								'label'	=> esc_html__('Cache Content', 'seogrow'),
								'type'  => 'checkbox',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'desc'  => esc_html__('Unauthenticated users may view a cached version of the last authenticated users view of a given page. Disabling this option is not recommended.', 'seogrow'),
								'text'	=> esc_html__('Do not cache pages for logged in users', 'seogrow'),
								'value' => false,
							),
							'cache_flush_status'   => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'picker'       => array(
									'enable-page-cache-preload' => array(
										'type'         => 'switch',
										'value'        => 'disable',
										'attr'  		=>	array('class' => 'cache_modify_listener'),
										'label'        => esc_html__( 'Cache Preload', 'seogrow' ),
										'desc'		   => esc_html__( 'Automatically prime the page cache.', 'seogrow' ),
										'left-choice'  => array(
											'value' => 'enable',
											'label' => esc_html__( 'Enable', 'seogrow' ),
										),
										'right-choice' => array(
											'value' => 'disable',
											'label' => esc_html__( 'Disable', 'seogrow' ),
										)
									),
								),
								'choices'      => array(
									'enable' => array(
										'page_cache_time'	=>	array(
											'type'  => 'short-text',
											'attr'  =>	array('class' => 'cache_modify_listener'),
											'label' => esc_html__('Cache Time', 'seogrow'),
											'desc'  => esc_html__('How long should cached pages remain fresh? Set to 0 to disable garbage collection. A good starting point is 3600 seconds.', 'seogrow'),
											'value' => '3600'
										),
										'cache_scheduler_time'	=>	array(
											'type'  => 'datetime-picker',
											'attr'  =>	array('class' => 'cache_modify_listener'),
											'label' => esc_html__('Scheduler Clear Cache', 'seogrow'),
											'desc'  => esc_html__('Check for stale cached files at this time (UTC) or starting at this time every interval below.', 'seogrow'),
											'datetime-picker' => array(
												'format'        => 'H:i',
												'timepicker'    => true,
												'datepicker'    => false,
												'defaultTime'   => '12:00'
											),
										),
										'cache_scheduler_interval'	=>	array(
											'type'  => 'select',
											'attr'  =>	array('class' => 'cache_modify_listener'),
											'label' => esc_html__('Scheduler Clear Cache Interval', 'seogrow'),
											'choices' => $interval_option_array,
										),
									)
								)
							),
						),
					),
					'page_cache_update_box'        => array(
						'title'   => esc_html__( 'Cache Update Configuration', 'seogrow' ),
						'type'    => 'box',
						'options' => array(
							'cache_refresh_update_post' => array(
								'label'	=> esc_html__('When Update Post', 'seogrow'),
								'type'  => 'checkboxes',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'desc'	=> esc_html__('Auto update when edit, delete, publish, trash post.', 'seogrow'),
								'value' => array(
									'post' => true,
									'front' => true,
									'category' => true
								),
								'choices' => array(
									'post' => esc_html__('Update edited posts', 'seogrow'),
									'front' => esc_html__('Update front page and posts page', 'seogrow'),
									'category' => esc_html__('Update category page', 'seogrow')
								),
							),
							'cache_refresh_post_comment' => array(
								'label'	=> esc_html__('When Post Comment', 'seogrow'),
								'type'  => 'checkbox',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'text'	=> esc_html__('Auto refresh cache when post, edit, approve user comment.', 'seogrow'),
								'value' => false,
							),
							'cache_refresh_switch_theme' => array(
								'label'	=> esc_html__('When Switch Theme', 'seogrow'),
								'type'  => 'checkbox',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'text'	=> esc_html__('Auto refresh all cache. Include all cache content you selected', 'seogrow'),
								'value' => false,
							),
							'cache_refresh_update_nav_menu' => array(
								'label'	=> esc_html__('When Update Nav Menu', 'seogrow'),
								'type'  => 'checkbox',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'text'	=> esc_html__('Auto clear all cache. Where used this nav menu', 'seogrow'),
								'value' => false,
							),
							'cache_refresh_user_profile' => array(
								'label'	=> esc_html__('When Update User Profile', 'seogrow'),
								'type'  => 'checkboxes',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'desc'	=> esc_html__('Update cache when user update profile.', 'seogrow'),
								'choices' => array(
									'author' => esc_html__('Update page author', 'seogrow'),
									'post' => esc_html__('Update posts belong to this user', 'seogrow'),
								),
							),
						)
					),
					'page_cache_reject_box'        => array(
						'title'   => esc_html__( 'Reject Cache Configuration', 'seogrow' ),
						'type'    => 'box',
						'options' => array(
							'reject_page_type' => array(
								'type'  => 'checkboxes',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'label' => esc_html__('Rejected Page Types', 'seogrow'),
								'desc'  => esc_html__('Do not cache the following page types. See the Conditional Tags documentation for a complete discussion on each type.', 'seogrow'),
								'choices' => array(
									'single' => esc_html__('Single Posts (is_single)', 'seogrow'),
									'page' => esc_html__('Pages (is_page)', 'seogrow'),
									'front_page' => esc_html__('Front Page (is_front_page)', 'seogrow'),
									'home' => esc_html__('Home (is_home)', 'seogrow'),
									'archives' => esc_html__('Archives (is_archive)', 'seogrow'),
									'tag' => esc_html__('Tags (is_tag)', 'seogrow'),
									'category' => esc_html__('Category (is_category)', 'seogrow'),
									'feed' => esc_html__('Feeds (is_feed)', 'seogrow'),
									'search' => esc_html__('Search Pages (is_search)', 'seogrow'),
									'author' => esc_html__('Author Pages (is_author)', 'seogrow'),
								),
							),
							'reject_post_ids' => array(
								'label'	=> esc_html__('Rejected Post ID', 'seogrow'),
								'type'  => 'text',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'desc'  => esc_html__('Enter here the post IDs separated by commas (ex: 10,23,50) to disable cache in this page.', 'seogrow'),
							),
							'reject_author_roles' => array(
								'type'  => 'checkboxes',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'label' => esc_html__('Rejected User Roles', 'seogrow'),
								'desc'  => esc_html__('Select user roles that should not receive cached pages.', 'seogrow'),
								'choices' => array(
									'administrator' => esc_html__('Administrator', 'seogrow'),
									'editor' => esc_html__('Editor', 'seogrow'),
									'author' => esc_html__('Author', 'seogrow'),
									'contributor' => esc_html__('Contributor', 'seogrow'),
									'subscriber' => esc_html__('Subscriber)', 'seogrow')
								),
							),
							'reject_user_agents' => array(
								'label'	=> esc_html__('Rejected user agents', 'seogrow'),
								'type'  => 'addable-option',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'desc'  => esc_html__('Never send cache pages for these user agents.', 'seogrow'),
								'value' => array('bot', 'ia_archive', 'slurp', 'crawl', 'spider', 'Yandex'),
								'option' => array( 'type' => 'text' ),
								'add-button-text' => esc_html__('Add', 'seogrow'),
								'sortable' => true,
							),
							'reject_user_cookies' => array(
								'label'	=> esc_html__('Rejected user cookies', 'seogrow'),
								'type'  => 'addable-option',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'desc'  => esc_html__('Never cache pages that use the specified cookies.', 'seogrow'),
								'option' => array( 'type' => 'text' ),
								'add-button-text' => esc_html__('Add', 'seogrow'),
								'sortable' => true,
								'value' => array()
							),
							'accept_query_string' => array(
								'label'	=> esc_html__('Accepted query strings', 'seogrow'),
								'type'  => 'addable-option',
								'attr'  =>	array('class' => 'cache_modify_listener'),
								'desc'  => esc_html__('Always cache URLs with these query strings.', 'seogrow'),
								'option' => array( 'type' => 'text' ),
								'add-button-text' => esc_html__('Add', 'seogrow'),
								'sortable' => true,
								'value' => array()
							),
							'cache_change_status' => array(
								'type'  => 'hidden',
								'value' => 'change',
								'attr'  => array( 'class' => 'cache_modify_listener_hidden_field', 'id' => 'cache_modify_listener_hidden_field' ),
							)
						)
					)
				)
			),
		)
	)
);

