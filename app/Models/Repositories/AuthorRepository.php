<?php

namespace App\Models\Repositories;

use App\Exceptions\DatabaseException;
use App\Models\Repositories\Contracts\AuthorRepositoryInterface;
use Illuminate\Support\Facades\DB;
use PDO;
use Throwable;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function list() {
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

    public function getAuthorById(int $id)
    {
        try {
            $pdo = DB::connection()->getPDO();
            $pdo->beginTransaction();
            $stm = $pdo->prepare('SELECT * FROM "GetAuthorById"(:FltId)');
            $stm->bindValue("FltId", $id);
            $stm->execute();
            $result = $stm->fetch(\PDO::FETCH_ASSOC);
            $pdo->commit();
            return $result;
        } catch (\PDOException | Throwable $e) {
            if ($pdo && $pdo->inTransaction()) {
                $pdo->rollback();
            }
            throw new DatabaseException($e->getMessage());
        }
    }

    public function getAuthorByAlias(string $link)
    {
        try {
            $pdo = DB::connection()->getPDO();
            $pdo->beginTransaction();
            $stm = $pdo->prepare('SELECT * FROM "GetAuthorByAlias"(:FltLink)');
            $stm->bindValue("FltLink", $link);
            $stm->execute();
            $result = $stm->fetch(\PDO::FETCH_ASSOC);
            $pdo->commit();
            return $result;
        } catch (\PDOException | Throwable $e) {
            if ($pdo && $pdo->inTransaction()) {
                $pdo->rollback();
            }
            throw new DatabaseException($e->getMessage());
        }
    }

    public function getAnotherAuthors(int $id, int $count = 5)
    {
        try {
            $pdo = DB::connection()->getPDO();
            $pdo->beginTransaction();
            $stm = $pdo->prepare('SELECT * FROM "GetAnotherSomeAuthors"(:FltId, :FltCount)');
            $stm->bindValue("FltId", $id);
            $stm->bindValue("FltCount", $count);
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
