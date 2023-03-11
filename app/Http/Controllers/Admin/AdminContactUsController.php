<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\ContactUsRepository;
use Illuminate\Http\Request;

class AdminContactUsController extends Controller
{
    //
    private $repository;
    public function __construct(ContactUsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('name', 'email');
        return $this->repository->index($searchParams);
    }
}
