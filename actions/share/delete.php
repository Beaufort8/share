<?php
/**
 * Elgg delete share action
 *
 */

// Support deleting by id in case we're deleting another user's likes
$id = (int) get_input('id');

$share = NULL;
if ($id) {
	$share = elgg_get_annotation_from_id($id);
}

if (!$share) {
	$shares = elgg_get_annotations(array(
		'guid' => (int) get_input('guid'),
		'annotation_owner_guid' => elgg_get_logged_in_user_guid(),
		'annotation_name' => 'share',
	));
	$share = $shares[0];
}

if ($share && $share->canEdit()) {

/*
object(ElggAnnotation)#837 (2) {
    ["time_created"]=>string(10) "1383852158"
    ["type"]=>string(10) "annotation"
    ["id"]=>string(4) "1241"
    ["entity_guid"]=>string(3) "156"				this is from input
    ["name_id"]=>string(4) "4815"
    ["value_id"]=>string(4) "4815"
    ["value_type"]=>string(4) "text"
    ["owner_guid"]=>string(2) "41"
    ["access_id"]=>string(1) "1"
    ["enabled"]=>string(3) "yes"
    ["name"]=>string(5) "share"
    ["value"]=>string(5) "share"
  }
  ["valid":protected]=>bool(false)
}
*/

	/* elgg_delet_river
	array 	$options Parameters: 
	ids => INT|ARR River item id(s) 
	subject_guids => INT|ARR Subject guid(s) 
	object_guids => INT|ARR Object guid(s) 
	annotation_ids => INT|ARR The identifier of the annotation(s) 
	action_types => STR|ARR The river action type(s) identifier 
	views => STR|ARR River view(s)
	types => STR|ARR Entity type string(s) 
	subtypes => STR|ARR Entity subtype string(s) 
	type_subtype_pairs => ARR Array of 
		type => subtype pairs where subtype can be an array of subtype strings
	posted_time_lower => INT The lower bound on the time posted 
	posted_time_upper => INT The upper bound on the time posted
	*/

	$river_guids = elgg_get_river(array(
		'object_guids' => $share['entity_guid'],
		'subject_guids' => $share['subject_guid'],
		'action_types' => 'share',
	));
	$river_guid = $river_guids[0];
	
	elgg_delete_river(array('object_guids' => $river_guid->object_guid));

	$share->delete();
	
	system_message(elgg_echo("share:deleted"));
	forward(REFERER);
}

register_error(elgg_echo("share:notdeleted"));
forward(REFERER);
