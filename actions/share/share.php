<?php
/**
 * Elgg add share action
 *
 */

$entity_guid = (int) get_input('guid');

//check to see if the user has already shared the item
if (elgg_annotation_exists($entity_guid, 'share')) {
	system_message(elgg_echo("share:alreadyshared"));
	forward(REFERER);
}
// Let's see if we can get an entity with the specified GUID
$entity = get_entity($entity_guid);
if (!$entity) {
	register_error(elgg_echo("share:notfound"));
	forward(REFERER);
}

// limit likes through a plugin hook (to prevent sharing your own content for example)
if (!$entity->canAnnotate(0, 'share')) {
	// plugins should register the error message to explain why liking isn't allowed
	forward(REFERER);
}

/*
int 	$entity_guid Entity Guid
string 	$name Name of annotation
string 	$value Value of annotation
string 	$value_type Type of value (default is auto detection)
int 	$owner_guid Owner of annotation (default is logged in user)
int 	$access_id Access level of annotation
*/

$user = elgg_get_logged_in_user_entity();
$annotation = create_annotation(
	$entity->guid,
	'share',
	'share',
	'',
	$user->guid,
	$entity->access_id
);

// tell user annotation didn't work if that is the case
if (!$annotation) {
	register_error(elgg_echo("share:failure"));
	forward(REFERER);
}

// notify if poster wasn't owner
if ($entity->owner_guid != $user->guid) {
	share_notify_user($entity->getOwnerEntity(), $user, $entity);
}

system_message(elgg_echo("share:save:success"));

add_to_river('river/object/share/share','share', elgg_get_logged_in_user_guid(), $entity->guid);

// Forward back to the page where the user 'shares' the object
forward(REFERER);
