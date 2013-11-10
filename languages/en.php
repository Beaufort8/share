<?php
/**
 * Share English language file
 */

$english = array (

	'share:this' => 'Share this',
	'share:remove' => 'Revoke share',
	
	/**
	 * River
	 */
	 
	'river:share:object:default' => '%s shares %s',
	
	'river:share:group:default' => '%s shares the group %s',

	'river:share:object:groupforumtopic' => '%s shares the discussion topic %s',
	'river:share:object:blog' => '%s shares the blog post %s',
	'river:share:object:bookmarks' => '%s shares the bookmark %s',
	'river:share:object:file' => '%s shares the file %s',
	'river:share:object:page' => '%s shares the page %s',
	'river:share:object:thewire' => '%s shares the post %s',	 

	/**
	 * Notification
	 */

	'share:notifications:subject' => '%s shares your post "%s"',
	'share:notifications:body' => 'Hi %1$s,

%2$s shares your post "%3$s" on %4$s

See your original post here:

%5$s

or view %2$s\'s profile here:

%6$s

Thanks,
%4$s
',
	
	/**
	 * Status messages
	 */

	'share:save:success' => 'The item was successfully shared.',
	'share:delete:success' => 'The item was was revoked.',

	/**
	 * Error messages
	 */

	'share:save:failed' => 'The item could not be shared.',
	'share:delete:failed' => 'Your share could not be revoked. Please try again.',	

	/**
	 * Widget
	 */

	'share:widget:name' => 'Shares',
	'share:widget:description' => 'Shows your shared items.',
	'share:widget:noshares' => 'No shared items.',
	'share:widget:numbertodisplay' => 'Number of shares to display',	
);

add_translation('en', $english);