<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'keyword', 'code_google', 'email_admin', 'hotline_1', 'hotline_2',
    'skype', 'google', 'facebook', 'twitter', 'youtube', 'instagram', 'code_facebook', 'facebook_page', 'whatsapp'
    ];

    public $timestamps = false;
}
