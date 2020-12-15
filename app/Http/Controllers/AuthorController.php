<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessLogic\AuthorLogic;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    private $authorLogic;

    public function __construct(AuthorLogic $authorLogic)
    {
        $this->authorLogic = $authorLogic;
    }

    public function index($name)
    {
        $author = $this->authorLogic->getAuthor($name);
        return view('author', compact('author'));
    }
}
