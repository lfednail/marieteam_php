<?php

namespace App\Controller;

class MainController extends AbstractController {

    public function home() {
		return $this->renderView('main/home.php', ['title' => 'Accueil']);
	}

    public function contact() {
		// Imaginons ici traiter la soumission d'un formulaire de contact et envoyer un mail...
		return $this->redirectToRoute('home', ['state' => 'success']);
	}

    public function liaisons() {
        return $this->renderView('main/liaisons.php', ['title' => 'Liaisons']);
    }

}