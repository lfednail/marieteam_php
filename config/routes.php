<?php

namespace MarieTeam\Router;

const ROUTES = [
    '/' => [
		'controller' => App\Controller\MainController::class,
		'method' => 'home'
	],
    '/contact' => [
        'controller' => App\Controller\MainController::class,
		'method' => 'contact'
    ],

];