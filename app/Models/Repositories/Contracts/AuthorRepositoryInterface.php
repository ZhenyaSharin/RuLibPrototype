<?php

namespace App\Models\Repositories\Contracts;

interface AuthorRepositoryInterface 
{
    public function list();

    public function getAuthorById(int $id);

    public function getAuthorByAlias(string $link);

    public function getAnotherAuthors(int $id, int $count = 5);
}
