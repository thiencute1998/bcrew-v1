<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Viewer\ContactUsRequest;
use App\Repositories\Viewer\ContactUsRepository;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    private $repository;
    public function __construct(ContactUsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index() {
        return $this->repository->index();
    }

    public function sendMail(ContactUsRequest $request) {
        $result = $this->repository->sendMail($request->only('name', 'email', 'link', 'message', 'file'));
        if ($result) {
            return redirect()->back()->with('send-success', 'Sent success !!!');
        }
    }
}
