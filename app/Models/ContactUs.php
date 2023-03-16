<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = "contact_us";

    protected $fillable = ['name', 'email', 'link','message','file','file_name', 'isDeleteFile', 'file_size'];

}
