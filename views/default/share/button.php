<?php
/**
 * Elgg share button
 *
 * @uses $vars['entity']
 */

if (!isset($vars['entity'])) {
	return true;
}

$guid = $vars['entity']->getGUID();

// check to see if the user has already shared this
if (elgg_is_logged_in() && $vars['entity']->canAnnotate(0, 'share')) {
	if (!elgg_annotation_exists($guid, 'share')) {
		$url = elgg_get_site_url() . "action/share/share?guid={$guid}";
		$params = array(
			'href' => $url,
			'text' => elgg_view_icon('share'),
			'title' => elgg_echo('share:this'),
			'is_action' => true,
			'is_trusted' => true,
		);
		$share_button = elgg_view('output/url', $params);
	} else {

			
		$url = elgg_get_site_url() . "action/share/delete?guid={$guid}";
		//$ulr="#";
		
		$params = array(
			'href' => $url,
			'text' => elgg_view_icon('share-alt'),
			'title' => elgg_echo('share:remove'),
			'is_action' => true,
			'is_trusted' => true,
		);
		$share_button = elgg_view('output/url', $params);
		
		
	}
}

echo $share_button;
