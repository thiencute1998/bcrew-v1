<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVideo extends Model
{
    use HasFactory;

    protected $table = 'product_videos';

    protected $fillable = ['product_id', 'link', 'file', 'file_name'];

    public $timestamps = false;
}
