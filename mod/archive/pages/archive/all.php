<?php

// Get the current page's owner
$page_owner = elgg_get_logged_in_user_guid();
elgg_set_page_owner_guid($page_owner);

$limit = get_input("limit", 10);
$offset = get_input("offset", 0);
$filter = get_input("filter", "all");

if($filter == 'media')
$subtypes = 'kaltura_video';
elseif ($filter == 'images')
$subtypes = 'album';
elseif ($filter == 'files')
$subtypes = 'file';
else
$subtypes = array('kaltura_video', 'album', 'file');

$content = elgg_list_entities(	array(	'types' => 'object', 
										'subtypes' => $subtypes, 
										'limit' => $limit, 
										'offset' => $offset, 
										'full_view' => FALSE,
										'archive_view' => TRUE
									));
$sidebar = elgg_view('kaltura/sidebar');
/*
		// Get categories, if they're installed
		global $CONFIG;
		$area3 = elgg_view('kaltura/categorylist',array('baseurl' => $CONFIG->wwwroot . 'search/?subtype=kaltura_video&tagtype=universal_categories&tag=','subtype' => 'kaltura_video'));
*/
$body = elgg_view_layout(	"content", array(
												'content' => $content, 
												'sidebar' => $sidebar, 
												'title' => elgg_echo('archive:all'),
												'filter_override' => elgg_view('page/layouts/content/archive_filter', $vars),
											));

	// Display page
echo elgg_view_page(elgg_echo('kalturavideo:label:adminvideos'),$body);

?>