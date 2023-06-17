<?php

/**
 * Application:Reactoor\illustrate Team
 * date: 6/14/2023
 * @author: Arshiamohammadei
 */

return [
	'storage' =>__DIR__ . '/../cache/software/',
	'auth' => [
		'api_key' => $_ENV['SOFTWARE_API_KEY'],
		'software_url' => $_ENV['SOFTWARE_URL']
	],
];