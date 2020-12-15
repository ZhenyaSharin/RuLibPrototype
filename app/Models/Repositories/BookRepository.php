<?php

namespace App\Models\Repositories;

use App\Exceptions\DatabaseException;
use App\Models\Repositories\Contracts\BookRepositoryInterface;
use Illuminate\Support\Facades\DB;
use PDO;
use Throwable;

class BookRepository implements BookRepositoryInterface
{
    function list() {
        try {
            $pdo = DB::connection()->getPDO();
            $pdo->beginTransaction();
            $stm = $pdo->prepare('SELECT * FROM "GetAllBooks"()');
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

    public function demoBooks()
    {
        try {
            $pdo = DB::connection()->getPDO();
            $pdo->beginTransaction();
            $stm = $pdo->prepare('SELECT * FROM "GetFiveRandomBooks"()');
            $stm->execute();
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
            $stm2 = $pdo->prepare('SELECT "Last_name", "First_name", "Middle_name", "Link" FROM "GetAuthorById"(:FltId)');
            foreach ($result as &$item) {
                $stm2->bindValue("FltId", $item['AuthorId']);
                $stm2->execute();
                $author = $stm2->fetch(\PDO::FETCH_ASSOC);
                $item['Author'] = $author;
            }
            $pdo->commit();
            return $result;
        } catch (\PDOException | Throwable $e) {
            if ($pdo && $pdo->inTransaction()) {
                $pdo->rollback();
            }
            throw new DatabaseException($e->getMessage());
        }
    }

    public function getBooksByAuthorId(int $id)
    {
        try {
            $pdo = DB::connection()->getPDO();
            $pdo->beginTransaction();
            $stm = $pdo->prepare('SELECT * FROM "GetBookByAuthorId"(:FltAuthorId)');
            $stm->bindValue("FltAuthorId", $id);
            $stm->execute();
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
            $stm2 = $pdo->prepare('SELECT "Last_name", "First_name", "Middle_name", "Link" FROM "GetAuthorById"(:FltId)');
            foreach ($result as &$item) {
                $stm2->bindValue("FltId", $item['AuthorId']);
                $stm2->execute();
                $author = $stm2->fetch(\PDO::FETCH_ASSOC);
                $item['Author'] = $author;
            }
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
