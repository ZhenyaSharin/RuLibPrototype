<?php

namespace App\Models\Repositories\Contracts;

interface BookRepositoryInterface 
{
    public function list();

    public function getBooksByAuthorId(int $id);

    public function demoBooks();

    public function getBookBySlug(int $authorId, string $slug);
}
