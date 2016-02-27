<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
	'domain' => env('MAILGUN_DOMAIN',true),
	'secret' => env('MAILGUN_SECRET',true),
	],

	'mandrill' => [
	'secret' => '',
	],

	'ses' => [
	'key' => '',
	'secret' => '',
	'region' => 'us-east-1',
	],

	'stripe' => [
	'model'  => 'User',
	'secret' => '',
	],
	'mercadopago'=>[
	'CLIENT_ID'=>env('MERCADOPAGO_CLIENT_ID', ''),
	'CLIENT_SECRET'=>env('MERCADOPAGO_CLIENT_SECRET', ''),
	'SANDBOXMODE'=>env('MERCADOPAGO_MP_SANDBOXMODE', ''),
	]

	];
