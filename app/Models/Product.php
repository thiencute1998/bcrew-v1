<?php

namespace App\Models;

use App\Models\Admin\ProductImage;
use App\Models\Admin\ProductVideo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'slug', 'service_id', 'description', 'status', 'tag', 'keyword', 'description_seo'];

    public $timestamps = true;

    public function productImages() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productVideos() {
        return $this->hasMany(ProductVideo::class, 'product_id', 'id');
    }
}
