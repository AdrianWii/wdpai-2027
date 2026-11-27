<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProjectRepository;
use App\Repository\UsersRepository;

final class ProjectController extends AppController
{
    public function index(): void
    {
        $projectRepository = new ProjectRepository();

        $this->render('projects', [
            'pageTitle' => 'Projekty',
            'projects' => $projectRepository->findAllWithOwner(),
        ]);
    }

    public function addProject(): void
    {
        $projectRepository = new ProjectRepository();
        $usersRepository = new UsersRepository();

        $users = $usersRepository->findAll();
        $userIds = array_map(
            static fn (array $user): int => (int) $user['id'],
            $users,
        );
        $statuses = [
            'planned' => 'Planowany',
            'active' => 'Aktywny',
            'completed' => 'Zakończony',
        ];
        $errors = [];
        $old = [
            'user_id' => '',
            'name' => '',
            'description' => '',
            'status' => 'active',
        ];

        if ($this->isPost()) {
            $old = [
                'user_id' => is_string($_POST['user_id'] ?? null) ? $_POST['user_id'] : '',
                'name' => is_string($_POST['name'] ?? null) ? trim($_POST['name']) : '',
                'description' => is_string($_POST['description'] ?? null) ? trim($_POST['description']) : '',
                'status' => is_string($_POST['status'] ?? null) ? $_POST['status'] : '',
            ];

            $userId = filter_var($old['user_id'], FILTER_VALIDATE_INT);

            if ($old['name'] === '') {
                $errors['name'] = 'Nazwa projektu jest wymagana.';
            } elseif (strlen($old['name']) > 120) {
                $errors['name'] = 'Nazwa projektu może mieć maksymalnie 120 znaków.';
            }

            if ($old['description'] === '') {
                $errors['description'] = 'Opis projektu jest wymagany.';
            }

            if (!array_key_exists($old['status'], $statuses)) {
                $errors['status'] = 'Wybierz poprawny status projektu.';
            }

            if ($userId === false || !in_array($userId, $userIds, true)) {
                $errors['user_id'] = 'Wybierz właściciela projektu.';
            }

            if ($errors === []) {
                $projectId = $projectRepository->insert(
                    $old['name'],
                    $old['description'],
                    $old['status'],
                    $userId,
                );

                header('Location: /projects/' . $projectId, true, 303);
                return;
            }
        }

        $this->render('add-project', [
            'pageTitle' => 'Nowy projekt',
            'users' => $users,
            'statuses' => $statuses,
            'errors' => $errors,
            'old' => $old,
        ]);
    }

    public function show(int $id): void
    {
        $projectRepository = new ProjectRepository();
        $project = $projectRepository->findByIdWithOwner($id);

        if ($project === null) {
            http_response_code(404);
            $this->render('not-found', [
                'pageTitle' => 'Nie znaleziono projektu',
            ]);
            return;
        }

        $this->render('project', [
            'pageTitle' => 'Szczegóły projektu',
            'project' => $project,
        ]);
    }
}
