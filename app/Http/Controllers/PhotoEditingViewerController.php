<?php

namespace App\Http\Controllers;

use App\Repositories\Viewer\PhotoEditingViewerRepository;
use Illuminate\Http\Request;

class PhotoEditingViewerController extends Controller
{
    //
    private $repository;
    public function __construct(PhotoEditingViewerRepository $repository)
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
