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
    'liaisons/{id}' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonById'
    ],
    'liaisons/create' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonCreate'
    ],
    'liaisons/edit/{id}' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonEdit'
    ],
    'liaisons/try_create' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonTryCreate'
    ],
    'liaisons/try_edit/{id}' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonTryEdit'
    ],
	'login' => [
		'controller' => App\Controller\MainController::class,
		'method' => 'login'
	],
	'register' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'register'
    ],
    'try_login' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'tryLogin'
    ],
    'try_register' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'tryRegister'
    ],
    'profile' => [
        'controller'=> App\Controller\MainController::class,
        'method' => 'profile'
    ],
    'profile/try_editProfile' => [
        'controller' => \App\Controller\MainController::class,
        'method' => 'tryEditProfile'
    ]

];