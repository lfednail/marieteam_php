<?php

const ROUTES = [
    '/' => [
		'controller' => App\Controller\MainController::class,
		'method' => 'home'
	],
    '/contact' => [
        'controller' => App\Controller\MainController::class,
		'method' => 'contact'
    ],
    '/liaisons'  => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisons'
    ],
	'auth/login' => [
		'controller' => App\Controller\MainController::class,
		'method' => 'login'
	],

	'auth/register' => [
	'controller' => App\Controller\MainController::class,
	'method' => 'register'
]

];