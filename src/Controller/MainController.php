<?php

namespace App\Controller;

class MainController extends AbstractController {

    public function home(): string
    {
		return $this->renderView('main/home.php', ['title' => 'Accueil']);
	}

    public function contact() {
		// Imaginons ici traiter la soumission d'un formulaire de contact et envoyer un mail...
		return $this->redirectToRoute('home', ['state' => 'success']);
	}

    public function liaisons(): string
    {
        return $this->renderView('main/liaisons.php', ['title' => 'Liaisons']);
    }

    public function liaisonById(array $data){
        return $this->renderView(
            'main/liaisons.php',
            [
                'title' => 'Liaisons',
                'id' => $data['id']
            ])
            ;
    }

    public function login(): string
    {
        return $this->renderView('auth/login.php', ['title' => 'Connexion']);
    }

    public function register(): string
    {
        return $this->renderView('auth/register.php', ['title' => 'Connexion']);
    }

}