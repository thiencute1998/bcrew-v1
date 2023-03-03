<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductImage;
use App\Models\Admin\ProductVideo;
use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class FloorPlanRepository extends BaseRepository {
    public function model()
    {
        return Product::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['search'])) {
            $search = $searchParams['search'];
            $query->where('name', 'like', "$search%");
        }
        $products = $query->paginate(10);
        return view('admin.pages.services.floor-plan.index', compact('products'));
    }

    /**
     * @throws \Exception
     */
    public function store($params) {
        DB::beginTransaction();
        try {
            $product = new $this->model;
            $product->fill($params);
            $product->save();
            if ($params['service_id'] == 4) { // Video
                if (isset($params['videos'])) {
                    $videos = $params['videos'];
                    foreach ($videos as $video) {
                        $arr[] = [
                            'product_id'=> $product->id,
                            'link'=> $video
                        ];
                    }
                    ProductVideo::insert($arr);
                }
            } else {
                $total = $params['total_image'];
                for($i = 1; $i <= $total; $i++){
                    $file1= null;
                    $file2= null;
                    $fileName1 = null;
                    $fileName2 = null;
                    if (isset($params['file_start'. $i])) {
                        $startImage = $params['file_start'. $i];
                        $fileName1 = time() . $this->generateRandomString() . "." . $startImage->extension();
                        $startImage->move(public_path("upload/admin/product"), $fileName1);
                        $file1 = $startImage->getClientOriginalName();
                    }
                    if (isset($params['file_end'. $i])) {
                        $endImage = $params['file_end'. $i];
                        $fileName2 = time() . $this->generateRandomString() . "." . $endImage->extension();
                        $endImage->move(public_path("upload/admin/product"), $fileName2);
                        $file2 = $endImage->getClientOriginalName();
                    }
                    if ($file1 || $file2) {
                        ProductImage::insert([
                            'product_id'=> $product->id,
                            'file_1'=> $file1,
                            'file_name_1'=> $fileName1,
                            'file_2'=> $file2,
                            'file_name_2'=> $fileName2,
                        ]);
                    }
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function edit($id) {
        $query = Product::query();
        $query->where('id', $id);
        return $query->with('productImages')->first();
    }

    public function update($params, $id) {
        $product = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            $product->fill($params);
            $product->save();
            ProductImage::where('product_id', $id)->delete();
            ProductVideo::where('product_id', $id)->delete();
            if ($params['service_id'] == 4) { // Video
                if (isset($params['videos'])) {
                    $arr = [];
                    $videos = $params['videos'];
                    foreach ($videos as $video) {
                        if ($video) {
                            $arr[] = [
                                'product_id'=> $product->id,
                                'link'=> $video
                            ];
                        }
                    }
                    ProductVideo::insert($arr);
                }
            } else {
                $total = $params['total_image'];
                for($i = 1; $i <= $total; $i++){
                    $file1= null;
                    $file2= null;
                    $fileName1 = null;
                    $fileName2 = null;
                    if (isset($params['file_start_hidden'. $i])) {
                        $file1 = $params['file_start_hidden'. $i];
                        $fileName1 = $params['file_start_name_hidden'. $i];
                    }
                    if (isset($params['file_end_hidden'. $i])) {
                        $file2 = $params['file_end_hidden'. $i];
                        $fileName2 = $params['file_end_name_hidden'. $i];
                    }
                    if (isset($params['file_start'. $i])) {
                        $startImage = $params['file_start'. $i];
                        $fileName1 = time() . $this->generateRandomString() . "." . $startImage->extension();
                        $startImage->move(public_path("upload/admin/product"), $fileName1);
                        $file1 = $startImage->getClientOriginalName();
                    }
                    if (isset($params['file_end'. $i])) {
                        $endImage = $params['file_end'. $i];
                        $fileName2 = time() . $this->generateRandomString() . "." . $endImage->extension();
                        $endImage->move(public_path("upload/admin/product"), $fileName2);
                        $file2 = $endImage->getClientOriginalName();
                    }
                    if ($file1 || $file2) {
                        ProductImage::insert([
                            'product_id'=> $product->id,
                            'file_1'=> $file1,
                            'file_name_1'=> $fileName1,
                            'file_2'=> $file2,
                            'file_name_2'=> $fileName2,
                        ]);
                    }
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function delete($id) {
        DB::beginTransaction();
        try {
            $this->model->where('id', $id)->delete();
            ProductImage::where('product_id', $id)->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
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

    public function upload($params) {
        if (isset($params['file'])) {
            $file = $params['file'];
            $name = time() . $this->generateRandomString() . "." . $file->extension();
            $file->move(public_path("upload/admin/product/product_images"), $name);
            ProductImage::insert([
                'product_id'=> $params['product_id'],
                'file'=> $file->getClientOriginalName(),
                'file_name'=> $name
            ]);
        }
    }
}
