<?php
/**
 * New share river entry
 *
 * @package Share
 */

$subject = $vars['item']->getSubjectEntity();
$object = $vars['item']->getObjectEntity();

$object_owner_guid=$object->owner_guid;
$object_owner_entity = get_entity($object_owner_guid);
$object_owner_icon = elgg_view_entity_icon($object_owner_entity, 'small');

$subtype = get_subtype_from_id($object->subtype);

switch ($subtype) {
	case "blog":
	$excerpt = $object->excerpt;
	if ($excerpt) break;
	/**
	 * todo:
	 * handling other subtypes like 'groupforumtopic', 'bookmarks'
	 * or from third party plubins like 'event', 'poll'
	 */
	default:
	$excerpt = elgg_get_excerpt($object->description);
}

echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' => '<div class="elgg-image">'.$object_owner_icon.'</div>'.$excerpt,
	'attachments' => elgg_view('output/url', array('href' => $object->address)),
));
