<?php

declare(strict_types=1);

namespace App\Repository;

use PDO;

final class UsersRepository extends Repository
{
    public function findAll(): array
    {
        $statement = $this->connection->prepare(
            'SELECT
                users.id,
                users.full_name,
                users.email
            FROM users
            ORDER BY users.id DESC',
        );
        $statement->execute();
        $users = $statement->fetchAll();

        return $users;
    }
}
