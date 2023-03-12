<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Viewer\ContactUsRequest;
use App\Repositories\Viewer\ContactUsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
//        $request->file('file')->store('test-file', 's3');
//        $file = $request->file('file');
//        $file->storeAs('test-file', $file->getClientOriginalName(), 's3');
//        return 123;
        $result = $this->repository->sendMail($request->only('name', 'email', 'link', 'message', 'file'));
        if ($result) {
            return redirect()->back()->with('send-success', 'Sent success !!!');
        }
    }
}
