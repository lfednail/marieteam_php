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
    'liaisons/edit/{id}' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonEdit'
    ],
    'liaisons/try_edit/{id}' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonTryEdit'
    ],
    'liaisons/{id}' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonById'
    ],
    'crossing' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'crossing'
    ],
    'crossing/search' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'searchCrossing'
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

];