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

    public function insert(
        string $name,
        string $description,
        string $status,
        int $userId,
    ): int {
        $statement = $this->connection->prepare(
            'INSERT INTO projects (user_id, name, description, status)
            VALUES (:user_id, :name, :description, :status)
            RETURNING id',
        );
        $statement->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $statement->bindValue(':name', $name, PDO::PARAM_STR);
        $statement->bindValue(':description', $description, PDO::PARAM_STR);
        $statement->bindValue(':status', $status, PDO::PARAM_STR);
        $statement->execute();

        return (int) $statement->fetchColumn();
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
