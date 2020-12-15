<?php

namespace App\Models\Repositories;

use App\Exceptions\DatabaseException;
use App\Models\Repositories\Contracts\AuthorRepositoryInterface;
use Illuminate\Support\Facades\DB;
use PDO;
use Throwable;

class AuthorRepository implements AuthorRepositoryInterface
{
    function list() {
        try {
            $pdo = DB::connection()->getPDO();
            $pdo->beginTransaction();
            $stm = $pdo->prepare('SELECT * FROM "GetAllAuthors"()');
            $stm->execute();
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
            $pdo->commit();
            return $result;
        } catch (\PDOException | Throwable $e) {
            if ($pdo && $pdo->inTransaction()) {
                $pdo->rollback();
            }
            throw new DatabaseException($e->getMessage());
        }
    }
}
