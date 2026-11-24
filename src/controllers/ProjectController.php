<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProjectRepository;

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
