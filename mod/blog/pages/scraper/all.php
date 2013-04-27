<?php
/**
 * Show all scrapers
 */

$scrapers = elgg_get_entities(array(	'type'=>'object', 
										'subtypes'=>array('scraper'),
										));
							
$title = elgg_echo('blog:minds:scraper');

$content = elgg_view_entity_list($scrapers);

elgg_register_menu_item('title', array(
			'name' => 'create_scraper',
			'href' => 'blog/scrapers/create',
			'text' => elgg_echo('blog:minds:scraper:create'),
			'link_class' => 'elgg-button elgg-button-action',
	));

$body = elgg_view_layout('content', array(	'title' => $title,
											'content'=>$content,
											'filter' => ''
											));
										

echo elgg_view_page($title, $body);