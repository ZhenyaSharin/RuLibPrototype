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
        if ($author['error'] == 0) {
            return view('author', compact('author'));
        } else {
            return view('error404');
        }
    }

    public function booking($name, $book)
    {
        $author = $this->authorLogic->getAuthor($name);
        $book = 
        return view('author', compact('author'));
    }
}
