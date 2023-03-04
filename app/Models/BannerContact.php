<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerContact extends Model
{
    use HasFactory;

    protected $table = 'banner_contacts';

    protected $fillable = ['content', 'link', 'status', 'file', 'file_name'];

}
