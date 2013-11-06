<?php
/**
 * New share river entry
 *
 * @package Share
 */

$subject = $vars['item']->getSubjectEntity();
$object = $vars['item']->getObjectEntity();
$excerpt = elgg_get_excerpt($object->description);

$subject_icon = elgg_view_entity_icon($subject, 'tiny');

/*
elgg_view('page/components/image_block', array(
	'image' => elgg_view('river/elements/image', $vars),
	'body' => elgg_view('river/elements/body', $vars),
	'class' => 'elgg-river-item',
));
*/

echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' => $subject_icon.$excerpt,
	'attachments' => elgg_view('output/url', array('href' => $object->address)),
));


/*

* Create friend river view

$subject = $vars['item']->getSubjectEntity();
$object = $vars['item']->getObjectEntity();

$subject_icon = elgg_view_entity_icon($subject, 'tiny');
$object_icon = elgg_view_entity_icon($object, 'tiny');

echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'attachments' => $subject_icon . elgg_view_icon('arrow-right') . $object_icon,
));
*/