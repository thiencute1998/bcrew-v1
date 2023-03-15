<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Viewer\ContactUsRequest;
use App\Models\ContactUs;
use App\Repositories\Viewer\ContactUsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

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
        $result = $this->repository->sendMail($request->only('name', 'email', 'link', 'message', 'file', 'contact_id'));
        if ($result) {
            return redirect()->back()->with('send-success', 'Sent success !!!');
        }
    }

    public function uploadFile(Request $request) {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $fileName = time() . $this->generateRandomString() . "." . $file->extension();
            $file->move(public_path("upload/viewer/contact_us"), $fileName);

//            Storage::putFileAs('contact_us', $file, $fileName);

            //store db
            $id = $this->store($file->getClientOriginalName(), $fileName);

            // delete chunked file
//            unlink($file->getPathname());

            return [
                'id'=> $id
            ];
        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

    public function store($file, $fileName) {
        $contact = new ContactUs;
        $contact->file = $file;
        $contact->file_name = $fileName;
        $contact->save();
        return $contact->id;
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
