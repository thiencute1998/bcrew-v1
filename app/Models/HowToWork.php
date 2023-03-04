<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowToWork extends Model
{
    use HasFactory;

    protected $table = 'how_to_work';

    protected $fillable = ['content', 'status', 'file', 'file_name'];
}
