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
    'liaisons'  => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisons'
    ],
    'liaisons/create'  => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonCreate'
    ],
    'liaisons/edit/{id}' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonEdit'
    ],
    'liaisons/{id}' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonById'
    ],
    'crossing' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'crossing'
    ],
	'login' => [
		'controller' => App\Controller\MainController::class,
		'method' => 'login'
	],
	'register' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'register'
    ],
    'logout' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'logout'
    ],
    'profile' => [
        'controller'=> App\Controller\MainController::class,
        'method' => 'profile'
    ],
    'profile/editProfile' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'editProfile'
    ],
    'about' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'about'
    ],
    '/api/boat/GET' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'apiGetBoat'
    ],
    '/api/boat/GET/{id}' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'apiGetBoatWithData'
    ]
];