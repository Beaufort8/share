<?php
/**
 * Elgg delete share action
 *
 */

// Support deleting by id in case we're deleting another user's shares
$id = (int) get_input('id');
$user_guid = elgg_get_logged_in_user_guid();

$share = NULL;
if ($id) {
	$share = elgg_get_annotation_from_id($id);
}

if (!$share) {
	$shares = elgg_get_annotations(array(
		'guid' => (int) get_input('guid'),
		'annotation_owner_guid' => $user_guid,
		'annotation_name' => 'share',
	));
	$share = $shares[0];
}

if ($share && $share->canEdit()) {

	elgg_delete_river( array(
		'object_guids' => $share['entity_guid'],
		'subject_guids' => $user_guid,
		'action_types' => 'share',
	));

	$share->delete();
	
	system_message(elgg_echo("share:deleted"));
	forward(REFERER);
}

register_error(elgg_echo("share:notdeleted"));
forward(REFERER);
