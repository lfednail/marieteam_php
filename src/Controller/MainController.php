<?php

namespace App\Controller;

class MainController extends AbstractController {

    public function home(): string
    {
		return $this->renderView('main/home.php', ['title' => 'Home']);
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

    public function liaisonCreate(){
        return $this->renderView('liaisons/auth/create.php', ['title' => 'Create a liaison']);
    }

    public function liaisonEdit(array $data){
        return $this->renderView('liaisons/auth/edit.php', [
            'title' => 'Edit a liaison',
            'id' => $data['id'],
        ]);
    }

    public function liaisonTryCreate(){
        return $this->renderView('verification/try_create.php', ['title' => 'Try create a liaison']);
    }

    public function liaisonTryEdit(array $data){
        return $this->renderView('verification/try_edit.php', [
            'title' => 'Try edit a liaison',
            'id' => $data['id']
        ]);
    }

    public function login(): string
    {
        return $this->renderView('auth/login.php', ['title' => 'Connexion']);
    }

    public function register(): string
    {
        return $this->renderView('auth/register.php', ['title' => 'Connexion']);
    }

    public function tryLogin (){
        return $this->renderView('verification/try_login.php', ['title' => 'TryLogin']);
    }

    public function tryRegister ()
    {
        return $this->renderView('verification/try_register.php', ['title' => 'TryRegiter']);
    }

    public function profile(){
        return $this->renderView('main/profile.php', ['title' => 'Your profile']);
    }

    public function tryEditProfile(){
        return $this->renderView('verification/try_editProfile.php', ['title' => 'TryEditrofil']);
    }

}