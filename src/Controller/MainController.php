<?php

namespace App\Controller;

class MainController extends AbstractController {

    public function home(): string
    {
		return $this->renderView('vue/viewHome.php', ['title' => 'Home']);
	}

    public function contact() {
		// Imaginons ici traiter la soumission d'un formulaire de contact et envoyer un mail...
		return $this->renderView('vue/viewContact.php', ['title' => 'Contact']);
	}

    public function liaisons(): string
    {
        return $this->renderView('controllerpage/liaisons.php', ['title' => 'Liaisons']);
    }

    public function liaisonById(array $data){
        $this->renderView(
            'controllerpage/liaisons.php',
            [
                'title' => 'Liaisons',
                'id' => $data['id']
            ]
        );
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
        return $this->renderView('main/liaisons.php', ['title' => 'Traversee']);
    }

    public function login(): string
    {
        return $this->renderView('controllerpage/login.php', ['title' => 'Login']);
    }

    public function register(): string
    {
        return $this->renderView('controllerpage/register.php', ['title' => 'Register']);
    }

    public function logout(){
        return $this->renderView('controllerpage/logout.php', ['title' => 'Deconnection']);
    }

    public function profile(){
        return $this->renderView('controllerpage/profile.php', ['title' => 'Your profile']);
    }

    public function editProfile(){
        return $this->renderView('controllerpage/editProfile.php', ['title' => 'EditProfil']);
    }

    public function about(){
        return $this->renderView('vue/viewAbout.php', ['title' => 'About']);
    }

}