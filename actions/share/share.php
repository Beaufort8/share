<?php
/**
* Elgg share add action
*
*/

/*
A river in elgg is the place to show the news to users. When you write a blog, or bookmark on something, the blog or bookmark will be added to the river immediately, and your friends or all the user will see the news according to your choice. But how can you add something into river other than by user interface?
The normal way is to develope a plug-in to make the inner function add_to_river() be open to other webs, for it seems that elgg does not provide such API for outer webs.
But there is some problem for me to accomplish that. So I find another direct way. Add_to_river() functions adds something to river by some operation on the database. So I write another function in the plug-in for mediawiki to do the same thing, and make wiki pages added to the elgg's river.
The contents of bookmark in rivers are stored in following tables:
elgg_river(store bookmarks and its display mode),
elgg_entities(declare bookmarks' guid, authors and some other information),
elgg_users_entity(link the author to the bookmark),
elgg_metadata(link the summary and the linkage url for the bookmark),
elgg_metastring(store the text for summary and the linkage url).
Make queries to the above tables in order, a elgg bookmark will be added to the river,

*/

/*
$title = htmlspecialchars(get_input('title', '', false), ENT_QUOTES, 'UTF-8');
$description = get_input('description');
$address = get_input('address');
$access_id = get_input('access_id');
$tags = get_input('tags');
$guid = get_input('guid');
$share = get_input('share');
$container_guid = get_input('container_guid', elgg_get_logged_in_user_guid());
*/

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

$user = elgg_get_logged_in_user_entity();
$annotation = create_annotation($entity->guid,
								'share',
								"share",
								"",
								$user->guid,
								$entity->access_id);

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

/*
add_to_river(
		$viewname,
		$action,
		$user_performing_action_guid,
		$entity_being_acted_on_guid
	);
*/

add_to_river('river/object/share/share','share', elgg_get_logged_in_user_guid(), $entity->guid);

// Forward back to the page where the user 'shares' the object
forward(REFERER);
