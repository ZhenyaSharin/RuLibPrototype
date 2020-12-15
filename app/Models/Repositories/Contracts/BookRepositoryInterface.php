<?php

namespace App\Models\Repositories\Contracts;

interface BookRepositoryInterface 
{
    public function list();

    public function demoBooks();
}
