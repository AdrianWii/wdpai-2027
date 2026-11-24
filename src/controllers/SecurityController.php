<?php

declare(strict_types=1);

namespace App\Controller;

final class SecurityController extends AppController
{
    public function login(): void
    {
        if ($this->isPost()) {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // musimy sprawdzic czy email jest w db
            // musimy porwnac hashe hasel
            // utworzenie sesji uzytkownik

            var_dump($email, $password, $_POST);
            $this->render('projects', [
                'pageTitle' => 'Projects',
            ]);
            return;
        }

        $this->render('login', [
            'pageTitle' => 'Login',
        ]);
    }

    public function register(): void
    {
        if($this->isPost()){

            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            if($password !== $confirmPassword){
                // hasla nie sa takie same
                var_dump('Hasła nie są takie same');
                return;
            }

            // todo register user in database

            $this->render("projects", [
                'pageTitle' => 'Projects',
            ]);
        }

        $this->render("register", [
            'pageTitle' => 'Register',
        ]);
    }

    public function logout(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION = [];
        session_destroy();

        header('Location: /login', true, 302);
    }
}
