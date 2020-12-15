<?php

namespace App\Http\Controllers\Api\v1;

use App\BusinessLogic\AuthorLogic;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    private $authorLogic;

    public function __construct(AuthorLogic $authorLogic)
    {
        $this->authorLogic = $authorLogic;
    }

    public function getAllAuthors()
    {
        $result = $this->authorLogic->getAllAuthors();
        return response()->json(["error" => "0", "result" => $result]);
    }
}
