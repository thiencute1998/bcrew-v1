<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Repositories\Viewer\HomeRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    private $repository;
    public function __construct(HomeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index() {
        return $this->repository->index();
    }

}
