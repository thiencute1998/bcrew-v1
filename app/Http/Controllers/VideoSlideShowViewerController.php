<?php

namespace App\Http\Controllers;

use App\Repositories\Viewer\VideoSlideShowViewerRepository;
use Illuminate\Http\Request;

class VideoSlideShowViewerController extends Controller
{
    //
    private $repository;
    public function __construct(VideoSlideShowViewerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index() {
        return $this->repository->index();
    }
}
