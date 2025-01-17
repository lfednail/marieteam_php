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
    'liaisons/create' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonCreate'
    ],
    'liaisons/try_create' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'liaisonTryCreate'
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
    ]
    ,
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
    'profile/editProfile' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'editProfile'
    ],
    'profile/try_editProfile/{id}' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'tryEditProfile'
    ],
    'about' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'about'
    ],

];