<?php

namespace App\Http\Controllers;

use App\Repositories\Viewer\FloorPlanViewerRepository;
use Illuminate\Http\Request;

class FloorPlanViewerController extends Controller
{
    //
    private $repository;
    public function __construct(FloorPlanViewerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index() {
        return $this->repository->index();
    }

    public function find($slug) {
        return $this->repository->index($slug);
    }
}
