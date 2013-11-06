<?php
/**
 * Share English language file
 */

$english = array(

	/**
	 * Menu items and titles
	 */
	'share' => "Share",
	'share:add' => "Share this",
	'share:edit' => "Edit bookmark",
	'share:owner' => "%s's bookmarks",
	'share:friends' => "Friends' bookmarks",
	'share:everyone' => "All site bookmarks",
	'share:this' => "Share this",
	'share:this:group' => "Bookmark in %s",
	'share:bookmarklet' => "Get bookmarklet",
	'share:bookmarklet:group' => "Get group bookmarklet",
	'share:inbox' => "Bookmarks inbox",
	'share:morebookmarks' => "More bookmarks",
	'share:more' => "More",
	'share:with' => "Share with",
	'share:new' => "A new bookmark",
	'share:address' => "Address of the bookmark",
	'share:none' => 'No bookmarks',

	'share:notification' =>
'%s added a new bookmark:

%s - %s
%s

View and comment on the new bookmark:
%s
',

	'share:delete:confirm' => "Are you sure you want to delete this resource?",

	'share:numbertodisplay' => 'Number of bookmarks to display',

	'share:shared' => "Bookmarked",
	'share:visit' => "Visit resource",
	'share:recent' => "Recent bookmarks",

	/* river */
	
	'river:share:object:blog' => '%s share the blog post %s',
	/* 'river:comment:object:blog' => '%s commented on the blog %s', */

	'river:share:object:bookmarks' => '%s share the bookmarke %s',
	/* 'river:comment:object:bookmarks' => '%s commented on a bookmark %s', */
	
	'river:share:object:file' => '%s share the file %s',
	/*	'river:comment:object:file' => '%s commented on the file %s', */

	'river:share:object:group' => '%s share the group %s',
	'river:share:object:groupforumtopic' => '%s share a discussion topic %s',

	'river:share:object:page' => '%s share the page %s',

	'river:share:object:thewire' => "%s share the post %s",


	'share:river:annotate' => 'a comment on this bookmark',
	'share:river:item' => 'an item',

	'item:object:bookmarks' => 'Bookmarks',

	'share:group' => 'Group bookmarks',
	'share:enablebookmarks' => 'Enable group bookmarks',
	'share:nogroup' => 'This group does not have any bookmarks yet',
	'share:more' => 'More bookmarks',

	'share:no_title' => 'No title',

	/**
	 * Widget and bookmarklet
	 */
	'share:widget:description' => "Display your latest bookmarks.",

	'share:bookmarklet:description' =>
			"The bookmarks bookmarklet allows you to share any resource you find on the web with your friends, or just bookmark it for yourself. To use it, simply drag the following button to your browser's links bar:",

	'share:bookmarklet:descriptionie' =>
			"If you are using Internet Explorer, you will need to right click on the bookmarklet icon, select 'add to favorites', and then the Links bar.",

	'share:bookmarklet:description:conclusion' =>
			"You can then save any page you visit by clicking it at any time.",

	/**
	 * Status messages
	 */

	'share:save:success' => "Your item was successfully shared.",
	'share:delete:success' => "Your bookmark was deleted.",

	/**
	 * Error messages
	 */

	'share:save:failed' => "Your bookmark could not be saved. Make sure you've entered a title and address and then try again.",
	'share:save:invalid' => "The address of the bookmark is invalid and could not be saved.",
	'share:delete:failed' => "Your bookmark could not be deleted. Please try again.",
);

add_translation('en', $english);