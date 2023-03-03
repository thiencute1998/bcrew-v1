<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\PhotoEditingController;
use App\Http\Controllers\Admin\VirtualStagingController;
use App\Http\Controllers\Admin\FloorPlanController;
use App\Http\Controllers\Admin\VideoSlideShowController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.layouts.index');
});
Route::get('/test', function () {
    return view('admin.layouts.test');
});

//Route::get('products', function(Request $request) {
//    $query = \App\Models\Product::query();
//    $products = $query->paginate(5);
//    return view('admin.pages.product.products', compact('products'));
//});

Route::get('/login', [AuthController::class, 'index'])->name('login-index');

Route::post('/login', [AuthController::class, 'login'])->name('login-auth');


Route::prefix('admin')->group(function () {
    Route::get('/', function() {
        return view('admin.layouts.master');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::get('/create', [ProductController::class, 'create'])->name('products-create');
        Route::post('/store', [ProductController::class, 'store'])->name('products-store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products-edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('products-update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products-delete');
        Route::post('/upload', [ProductController::class, 'upload'])->name('products-upload');
    });

    Route::prefix('services')->group(function () {

        Route::prefix('photo-editing')->group(function() {
            Route::get('/', [PhotoEditingController::class, 'index'])->name('photo-editing');
            Route::get('/create', [PhotoEditingController::class, 'create'])->name('photo-editing-create');
            Route::post('/store', [PhotoEditingController::class, 'store'])->name('photo-editing-store');
            Route::get('/edit/{id}', [PhotoEditingController::class, 'edit'])->name('photo-editing-edit');
            Route::post('/update/{id}', [PhotoEditingController::class, 'update'])->name('photo-editing-update');
            Route::get('/delete/{id}', [PhotoEditingController::class, 'delete'])->name('photo-editing-delete');
            Route::post('/upload', [PhotoEditingController::class, 'upload'])->name('photo-editing-upload');
        });

        Route::prefix('virtual-staging')->group(function() {
            Route::get('/', [VirtualStagingController::class, 'index'])->name('virtual-staging');
            Route::get('/create', [VirtualStagingController::class, 'create'])->name('virtual-staging-create');
            Route::post('/store', [VirtualStagingController::class, 'store'])->name('virtual-staging-store');
            Route::get('/edit/{id}', [VirtualStagingController::class, 'edit'])->name('virtual-staging-edit');
            Route::post('/update/{id}', [VirtualStagingController::class, 'update'])->name('virtual-staging-update');
            Route::get('/delete/{id}', [VirtualStagingController::class, 'delete'])->name('virtual-staging-delete');
            Route::post('/upload', [VirtualStagingController::class, 'upload'])->name('virtual-staging-upload');
        });

        Route::prefix('floor-plan')->group(function() {
            Route::get('/', [FloorPlanController::class, 'index'])->name('floor-plan');
            Route::get('/create', [FloorPlanController::class, 'create'])->name('floor-plan-create');
            Route::post('/store', [FloorPlanController::class, 'store'])->name('floor-plan-store');
            Route::get('/edit/{id}', [FloorPlanController::class, 'edit'])->name('floor-plan-edit');
            Route::post('/update/{id}', [FloorPlanController::class, 'update'])->name('floor-plan-update');
            Route::get('/delete/{id}', [FloorPlanController::class, 'delete'])->name('floor-plan-delete');
            Route::post('/upload', [FloorPlanController::class, 'upload'])->name('floor-plan-upload');
        });

        Route::prefix('video-slideshow')->group(function() {
            Route::get('/', [VideoSlideShowController::class, 'index'])->name('video-slideshow');
            Route::get('/create', [VideoSlideShowController::class, 'create'])->name('video-slideshow-create');
            Route::post('/store', [VideoSlideShowController::class, 'store'])->name('video-slideshow-store');
            Route::get('/edit/{id}', [VideoSlideShowController::class, 'edit'])->name('video-slideshow-edit');
            Route::post('/update/{id}', [VideoSlideShowController::class, 'update'])->name('video-slideshow-update');
            Route::get('/delete/{id}', [VideoSlideShowController::class, 'delete'])->name('video-slideshow-delete');
            Route::post('/upload', [VideoSlideShowController::class, 'upload'])->name('video-slideshow-upload');
        });

    });



    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/create', [UserController::class, 'create'])->name('users-create');
        Route::post('/store', [UserController::class, 'store'])->name('users-store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users-edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users-update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users-delete');
        Route::post('/upload', [UserController::class, 'upload'])->name('users-upload');
    });

    Route::prefix('configs')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('configs');
        Route::post('/update', [ConfigController::class, 'update'])->name('configs-update');
    });
});

Route::post('ckeditor/image_upload', function(Request $request) {
    if($request->hasFile('upload')) {
        //get filename with extension
        $filenamewithextension = $request->file('upload')->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $request->file('upload')->getClientOriginalExtension();

        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;

        //Upload File
        $request->file('upload')->move(public_path("upload/admin"), $filenametostore);
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('upload/admin/'.$filenametostore);
        $msg = 'Image successfully uploaded';
        $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        // Render HTML output
        @header('Content-type: text/html; charset=utf-8');
        echo $re;
    }
})->name('upload');




//Route::get('insert', function() {
//    for ($i = 1; $i <= 100; $i++) {
//        \App\Models\Product::create([
//            'name'=> 'Pruduct' . $i,
//            'quantity'=> $i,
//            'image'=> 'hihi.png',
//            'description'=> 'Hahahas'
//        ]);
//    }
//    return 1;
//});
