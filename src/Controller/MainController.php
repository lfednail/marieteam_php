<?php

namespace App\Controller;

class MainController extends AbstractController {

    public function home(): string
    {
		return $this->renderView('vue/viewHome.php', ['title' => 'Home']);
	}

    public function contact(): string
    {
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

    public function liaisonCreate(): string
    {
        return $this->renderView('admin/liaisonCreate.php', ['title' => 'Create a liaison']);
    }

    public function liaisonEdit(array $data): string
    {
        return $this->renderView('admin/liaisonEdit.php', [
            'title' => 'Edit a liaison',
            'id' => $data['id'],
        ]);
    }

    public function liaisonTryCreate(): string
    {
        return $this->renderView('verification/try_create.php', ['title' => 'Try create a liaison']);
    }

    public function liaisonTryEdit(array $data): string
    {
        return $this->renderView('verification/try_edit.php', [
            'title' => 'Try edit a liaison',
            'id' => $data['id']
        ]);
    }

    public function crossing(): string
    {
        return $this->renderView('controllerpage/crossing.php', ['title' => 'Traversee']);
    }

    public function login(): string
    {
        return $this->renderView('controllerpage/login.php', ['title' => 'Login']);
    }

    public function register(): string
    {
        return $this->renderView('controllerpage/register.php', ['title' => 'Register']);
    }

    public function logout(): string
    {
        return $this->renderView('controllerpage/logout.php', ['title' => 'Deconnection']);
    }

    public function profile(): string
    {
        return $this->renderView('controllerpage/profile.php', ['title' => 'Your profile']);
    }

    public function editProfile(): string
    {
        return $this->renderView('controllerpage/editProfile.php', ['title' => 'EditProfil']);
    }

    public function about(): string
    {
        return $this->renderView('vue/viewAbout.php', ['title' => 'About']);
    }
}