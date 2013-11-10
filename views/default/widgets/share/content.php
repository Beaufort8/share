<?php
/**
 * User share widget display view
 */

$num = $vars['entity']->num_display;

$options = array(
	'annotation_names'=>'share',
	'annotation_values' => 'share',
	'annotation_owner_guids' => $vars['entity']->owner_guid,
	'limit' => $num,
	'full_view' => FALSE,
	'pagination' => FALSE,
);

$entities = elgg_get_entities_from_annotations($options);
$content = 	elgg_view_entity_list($entities,array(
	'limit'=>$num,
	'full_view'=>FALSE,
	'list_type_toggle'=>FALSE,
	'pagination'=>FALSE,
));

echo $content;

if (!$content) {
	echo elgg_echo('share:widget:noshares');
}
