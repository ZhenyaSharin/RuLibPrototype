<?php

namespace App\BusinessLogic;

use App\Exceptions\BusinessLogicException;
use App\Exceptions\DatabaseException;
use App\Models\Repositories\Contracts\BookRepositoryInterface;
use Throwable;

class BookLogic
{
    private $books;

    public function __construct(BookRepositoryInterface $books)
    {
        $this->books = $books;
    }

    public function getSomeBooks()
    {
        try {
            $result = $this->books->demoBooks();
            return $result;
        } catch (Throwable $e) {
            if ($e instanceof DatabaseException) {
                throw new DatabaseException('DatabaseException');
            }
            throw new BusinessLogicException($e->getMessage());
        }
    }
}