<?php
/**
 * Share German language file
 */

$german = array (

	'share:this' => 'Empfehlen',
	'share:remove' => 'Empfehlung zurücknehmen',
	
	/**
	 * River
	 */
	 
	'river:share:object:default' => '%s empfiehlt %s',
	
	'river:share:group:default' => '%s empfiehlt die Gruppe %s',

	'river:share:object:groupforumtopic' => '%s empfiehlt das Diskussionsthema %s',
	'river:share:object:blog' => '%s empfiehlt den Blog-Artikel %s',
	'river:share:object:bookmarks' => '%s empfiehlt das Lesezeichen %s',
	'river:share:object:file' => '%s empfiehlt die Datei %s',
	'river:share:object:page' => '%s empfiehlt die Seite %s',
	'river:share:object:thewire' => '%s empfiehlt die Statusmeldung %s',	 

	/**
	 * Notification
	 */

	'share:notifications:subject' => '%s hat Ihren Beitrag "%s" weiter empfohlen',
	'share:notifications:body' => 'Hallo %1$s,

%2$s hat Ihren Beitrag "%3$s" auf %4$s weiter empfohlen.

Hier finden Sie den Originalbeitrag:

%5$s

oder besuchen Sie %2$ss Profil:

%6$s

Danke,
%4$s
',
	
	/**
	 * Status messages
	 */

	'share:save:success' => 'Der Beitrag wurde erfolgreich weiter empfohlen.',
	'share:delete:success' => 'Ihre Empfehlung wurde zurückgenommen.',

	/**
	 * Error messages
	 */

	'share:save:failed' => 'Der Beitrag konnte nicht weiter empfohlen werden.',
	'share:delete:failed' => 'Ihre Empfehlung konnte nicht zurückgenommen werden. Bitte versuchen Sie es erneut',	

	/**
	 * Widget
	 */

	'share:widget:name' => 'Empfehlungen',
	'share:widget:description' => 'Zeigt letzte Empfehlungen.',
	'share:widget:noshares' => 'Keine Empfehlungen vorhanden.',
	'share:widget:numbertodisplay' => 'Anzahl der zu zeigenden Empfehlungen',
	
);

add_translation('de', $german);