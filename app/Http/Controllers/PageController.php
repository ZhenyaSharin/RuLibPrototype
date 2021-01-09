<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessLogic\AuthorLogic;
use App\BusinessLogic\BookLogic;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    private $authorLogic;
    private $bookLogic;

    public function __construct(AuthorLogic $authorLogic, BookLogic $bookLogic)
    {
        $this->authorLogic = $authorLogic;
        $this->bookLogic = $bookLogic;
    }

    public function index($name)
    {
        $author = $this->authorLogic->getAuthor($name);
        return view('author', compact('author'));
    }

    public function booking($name, $book)
    {
        $author = $this->authorLogic->getAuthor($name);
        $book = $this->bookLogic->getBook($name);
        return view('author', compact('author'));
    }
}
