<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Resources\GroupResourceCollection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): GroupResourceCollection
    {
        return new GroupResourceCollection(Group::paginate());

    }
}
