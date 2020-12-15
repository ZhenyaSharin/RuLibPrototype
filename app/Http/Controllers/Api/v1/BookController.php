<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BusinessLogic\BookLogic;

class BookController extends Controller
{
    private $bookLogic;

    public function __construct(BookLogic $bookLogic)
    {
        $this->bookLogic = $bookLogic;
    }

    public function getSomeBooks()
    {
        $result = $this->bookLogic->getSomeBooks();
        return response()->json(["error" => "0", "result" => $result]);
    }
}
