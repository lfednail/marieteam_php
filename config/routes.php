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
    'traversee' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'traversee'
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
    'profil' => [
        'controller'=> App\Controller\MainController::class,
        'method' => 'profil'
    ],
    'profil/editProfil' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'editProfil'
    ],
    'profil/try_editProfil/{id}' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'tryEditProfil'
    ]

];