<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Repositories\Viewer\HowToWorkRepository;
use Illuminate\Http\Request;

class HowToWorkController extends Controller
{
    //
    private $repository;
    public function __construct(HowToWorkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index() {
        return $this->repository->index();
    }
}
