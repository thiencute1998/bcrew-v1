<?php

namespace App\Http\Controllers;

use App\Repositories\Viewer\VirtualStagingViewerRepository;
use Illuminate\Http\Request;

class VirtualStagingViewerController extends Controller
{
    //
    private $repository;
    public function __construct(VirtualStagingViewerRepository $repository)
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
