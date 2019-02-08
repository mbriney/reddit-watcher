<?php

include "config.inc";
require "vendor/mandrill/mandrill/src/Mandrill.php";

$html = file_get_contents("http://www.mountvernon.org/site/reddit/");

try {
	$mandrill = new Mandrill($mandrill_api);
	$message = array(
		'html' => $html,
		'text' => 'HTML only',
		'subject' => 'GW Pulse - '.date("M j, Y"),
		'from_email' => 'newmedia@mountvernon.org',
		'from_name' => 'Robot Tobias',
		'to' => array(
			array(
				'email' => 'newmedia@mountvernon.org',
				'name' => 'New Media Team',
				'type' => 'to'
			)
		),
		'headers' => array('Reply-To' => 'newmedia@mountvernon.org'),
		'important' => false,
		'track_opens' => null,
		'track_clicks' => null,
		'auto_text' => null,
		'auto_html' => null,
		'inline_css' => null,
		'url_strip_qs' => null,
		'preserve_recipients' => null,
		'view_content_link' => null,
		'bcc_address' => null,
		'tracking_domain' => null,
		'signing_domain' => null,
		'return_path_domain' => null,
		'merge' => true,
		'merge_language' => 'mailchimp',
		'global_merge_vars' => array(
			array(
				'name' => 'merge1',
				'content' => 'merge1 content'
			)
		)
	);
	$async = false;
	$ip_pool = 'Main Pool';
	$result = $mandrill->messages->send($message, $async, $ip_pool);
	print_r($result);
	/*
	Array
	(
		[0] => Array
			(
				[email] => recipient.email@example.com
				[status] => sent
				[reject_reason] => hard-bounce
				[_id] => abc123abc123abc123abc123abc123
			)
	
	)
	*/
} catch(Mandrill_Error $e) {
	// Mandrill errors are thrown as exceptions
	echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
	// A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
	throw $e;
}
?>