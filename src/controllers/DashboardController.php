<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UsersRepository;

final class DashboardController extends AppController
{
    public function dashboard(): void
    {
        $usersRepository = new UsersRepository();

        $users = $usersRepository->findAll();

        $this->render('home', [
            'pageTitle' => 'Moja aplikacja',
            'users' => $users,
        ]);
    }
}
