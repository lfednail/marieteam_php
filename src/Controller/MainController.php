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
        return $this->renderView('liaisons/admin/create.php', ['title' => 'Create a liaison']);
    }

    public function liaisonEdit(array $data){
        return $this->renderView('liaisons/admin/edit.php', [
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

    public function crossing(){
        return $this->renderView('main/crossing.php', ['title' => 'Traversee']);
    }

    public function login(): string
    {
        return $this->renderView('auth/login.php', ['title' => 'Connection']);
    }

    public function register(): string
    {
        return $this->renderView('auth/register.php', ['title' => 'Connection']);
    }

    public function logout(){
        return $this->renderView('auth/logout.php', ['title' => 'Deconnection']);
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

    public function editProfile(){
        return $this->renderView('profile/edit_profile.php', ['title' => 'EditProfil']);
    }

    public function tryEditProfile(array $data){
        return $this->renderView('verification/try_editProfile.php', [
            'title' => 'TryEditProfile',
            'id' => $data['id']
        ]);
    }

    public function about(){
        return $this->renderView('main/about.php', ['title' => 'About']);
    }

}