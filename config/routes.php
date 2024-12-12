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
    ]

];