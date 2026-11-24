<?php

declare(strict_types=1);

namespace App\Repository;

use PDO;

final class ProjectRepository extends Repository
{
    public function findAllWithOwner(): array
    {
        $statement = $this->connection->prepare(
            'SELECT
                projects.id,
                projects.name,
                projects.description,
                projects.status,
                projects.created_at,
                users.id AS owner_id,
                users.full_name AS owner_name,
                users.email AS owner_email
            FROM projects
            INNER JOIN users ON users.id = projects.user_id
            ORDER BY projects.created_at DESC, projects.id DESC',
        );
        $statement->execute();

        return $statement->fetchAll();
    }

    public function findByIdWithOwner(int $id): ?array
    {
        $statement = $this->connection->prepare(
            'SELECT
                projects.id,
                projects.name,
                projects.description,
                projects.status,
                projects.created_at,
                users.id AS owner_id,
                users.full_name AS owner_name,
                users.email AS owner_email
            FROM projects
            INNER JOIN users ON users.id = projects.user_id
            WHERE projects.id = :id',
        );
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $project = $statement->fetch();

        return $project === false ? null : $project;
    }
}
