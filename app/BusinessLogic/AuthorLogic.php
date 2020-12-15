<?php

namespace App\BusinessLogic;

use App\Exceptions\BusinessLogicException;
use App\Exceptions\DatabaseException;
use App\Models\Repositories\Contracts\AuthorRepositoryInterface;
use Throwable;

class AuthorLogic
{
    private $authors;

    public function __construct(AuthorRepositoryInterface $authors)
    {
        $this->authors = $authors;
    }

    public function getAllAuthors()
    {
        try {
            $result = $this->authors->list();
            return $result;
        } catch (Throwable $e) {
            if ($e instanceof DatabaseException) {
                throw new DatabaseException('DatabaseException');
            }
            throw new BusinessLogicException($e->getMessage());
        }
    }
}
