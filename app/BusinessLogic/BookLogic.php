<?php

namespace App\BusinessLogic;

use App\Exceptions\BusinessLogicException;
use App\Exceptions\DatabaseException;
use App\Models\Repositories\Contracts\BookRepositoryInterface;
use Illuminate\Support\Facades\Storage;
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

    public function getAuthorsBooks($id)
    {
        try {
            $result = $this->books->getBooksByAuthorId($id);
            return $result;
        } catch (Throwable $e) {
            if ($e instanceof DatabaseException) {
                throw new DatabaseException('DatabaseException');
            }
            throw new BusinessLogicException($e->getMessage());
        }
    }

    public function getBookByAuthorIdAndSlug($authorId, $name, $slug, $page)
    {
        try {
            $result = $this->books->getBookBySlug($authorId, $slug);
            $link = $result['Link'];
            $text = file_get_contents(public_path()."/storage/books/$name/$link.txt");
            $result['Page'] = $page;
            $result['Text'] = $text;

            return $result;
        } catch (Throwable $e) {
            if ($e instanceof DatabaseException) {
                throw new DatabaseException('DatabaseException');
            }
            throw new BusinessLogicException($e->getMessage());
        }
    }
}
