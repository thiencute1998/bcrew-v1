<?php

namespace App\Repositories\Admin;

use App\Models\ContactUs;
use App\Repositories\BaseRepository;

class ContactUsRepository extends BaseRepository {
    public function model()
    {
        return ContactUs::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['name'])) {
            $search = $searchParams['name'];
            $query->where('name', 'like', "$search%");
        }
        if (isset($searchParams['email'])) {
            $search = $searchParams['email'];
            $query->where('email', 'like', "$search%");
        }
        $query->orderBy('id', 'desc');
        $contacts = $query->paginate(10);
        return view('admin.pages.contact-us.index', compact('contacts'));
    }
}
