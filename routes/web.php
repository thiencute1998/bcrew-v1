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
use App\Http\Controllers\Admin\Banner\LogoController;
use App\Http\Controllers\Admin\Banner\SlideController;
use App\Http\Controllers\Admin\Banner\BannerContactController;
use App\Http\Controllers\Admin\HowToWorkController;
use App\Http\Controllers\Admin\Service\ServiceIntroduceController;

use App\Http\Controllers\Viewer\HomeController;
use App\Http\Controllers\PhotoEditingViewerController;
use App\Http\Controllers\VirtualStagingViewerController;
use App\Http\Controllers\FloorPlanViewerController;
use App\Http\Controllers\VideoSlideShowViewerController;
use App\Http\Controllers\Viewer\ContactUsController;
use App\Http\Controllers\Viewer\HowToWorkController as HowToWorkViewerController;
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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout-auth');


Route::prefix('admin')->middleware(['checkAuthorization'])->group(function () {
    Route::get('/', function() {
        return view('admin.index');
    })->name('admin-index');

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::get('/create', [ProductController::class, 'create'])->name('products-create');
        Route::post('/store', [ProductController::class, 'store'])->name('products-store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products-edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('products-update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products-delete');
        Route::post('/upload', [ProductController::class, 'upload'])->name('products-upload');
    });

    // services
    Route::prefix('services')->group(function () {

        Route::prefix('introduce')->group(function() {
            Route::get('/', [ServiceIntroduceController::class, 'index'])->name('service-introduce');
            Route::get('/edit/{id}', [ServiceIntroduceController::class, 'edit'])->name('service-introduce-edit');
            Route::post('/update/{id}', [ServiceIntroduceController::class, 'update'])->name('service-introduce-update');
        });

        Route::prefix('photo-editing')->group(function() {
            Route::get('/', [PhotoEditingController::class, 'index'])->name('photo-editing');
            Route::get('/create', [PhotoEditingController::class, 'create'])->name('photo-editing-create');
            Route::post('/store', [PhotoEditingController::class, 'store'])->name('photo-editing-store');
            Route::get('/edit/{id}', [PhotoEditingController::class, 'edit'])->name('photo-editing-edit');
            Route::post('/update/{id}', [PhotoEditingController::class, 'update'])->name('photo-editing-update');
            Route::get('/delete/{id}', [PhotoEditingController::class, 'delete'])->name('photo-editing-delete');
            Route::post('/ckeditor/image_upload', [PhotoEditingController::class, 'upload'])->name('photo-editing-upload');
        });

        Route::prefix('virtual-staging')->group(function() {
            Route::get('/', [VirtualStagingController::class, 'index'])->name('virtual-staging');
            Route::get('/create', [VirtualStagingController::class, 'create'])->name('virtual-staging-create');
            Route::post('/store', [VirtualStagingController::class, 'store'])->name('virtual-staging-store');
            Route::get('/edit/{id}', [VirtualStagingController::class, 'edit'])->name('virtual-staging-edit');
            Route::post('/update/{id}', [VirtualStagingController::class, 'update'])->name('virtual-staging-update');
            Route::get('/delete/{id}', [VirtualStagingController::class, 'delete'])->name('virtual-staging-delete');
            Route::post('/ckeditor/image_upload', [VirtualStagingController::class, 'upload'])->name('virtual-staging-upload');
        });

        Route::prefix('floor-plan')->group(function() {
            Route::get('/', [FloorPlanController::class, 'index'])->name('floor-plan');
            Route::get('/create', [FloorPlanController::class, 'create'])->name('floor-plan-create');
            Route::post('/store', [FloorPlanController::class, 'store'])->name('floor-plan-store');
            Route::get('/edit/{id}', [FloorPlanController::class, 'edit'])->name('floor-plan-edit');
            Route::post('/update/{id}', [FloorPlanController::class, 'update'])->name('floor-plan-update');
            Route::get('/delete/{id}', [FloorPlanController::class, 'delete'])->name('floor-plan-delete');
            Route::post('/ckeditor/image_upload', [FloorPlanController::class, 'upload'])->name('floor-plan-upload');
        });

        Route::prefix('video-slideshow')->group(function() {
            Route::get('/', [VideoSlideShowController::class, 'index'])->name('video-slideshow');
            Route::get('/create', [VideoSlideShowController::class, 'create'])->name('video-slideshow-create');
            Route::post('/store', [VideoSlideShowController::class, 'store'])->name('video-slideshow-store');
            Route::get('/edit/{id}', [VideoSlideShowController::class, 'edit'])->name('video-slideshow-edit');
            Route::post('/update/{id}', [VideoSlideShowController::class, 'update'])->name('video-slideshow-update');
            Route::get('/delete/{id}', [VideoSlideShowController::class, 'delete'])->name('video-slideshow-delete');
            Route::post('/ckeditor/image_upload', [VideoSlideShowController::class, 'upload'])->name('video-slideshow-upload');
        });

    });

    // banner
    Route::prefix('banner')->group(function () {

        Route::prefix('logos')->group(function() {
            Route::get('/', [LogoController::class, 'index'])->name('logos');
            Route::get('/create', [LogoController::class, 'create'])->name('logos-create');
            Route::post('/store', [LogoController::class, 'store'])->name('logos-store');
            Route::get('/edit/{id}', [LogoController::class, 'edit'])->name('logos-edit');
            Route::post('/update/{id}', [LogoController::class, 'update'])->name('logos-update');
            Route::get('/delete/{id}', [LogoController::class, 'delete'])->name('logos-delete');
        });

        Route::prefix('slides')->group(function() {
            Route::get('/', [SlideController::class, 'index'])->name('slides');
            Route::get('/create', [SlideController::class, 'create'])->name('slides-create');
            Route::post('/store', [SlideController::class, 'store'])->name('slides-store');
            Route::get('/edit/{id}', [SlideController::class, 'edit'])->name('slides-edit');
            Route::post('/update/{id}', [SlideController::class, 'update'])->name('slides-update');
            Route::get('/delete/{id}', [SlideController::class, 'delete'])->name('slides-delete');
        });

        Route::prefix('contacts')->group(function() {
            Route::get('/', [BannerContactController::class, 'index'])->name('contacts');
            Route::get('/create', [BannerContactController::class, 'create'])->name('contacts-create');
            Route::post('/store', [BannerContactController::class, 'store'])->name('contacts-store');
            Route::get('/edit/{id}', [BannerContactController::class, 'edit'])->name('contacts-edit');
            Route::post('/update/{id}', [BannerContactController::class, 'update'])->name('contacts-update');
            Route::get('/delete/{id}', [BannerContactController::class, 'delete'])->name('contacts-delete');
        });

    });


    Route::prefix('how-to-work')->group(function() {
        Route::get('/', [HowToWorkController::class, 'index'])->name('works');
        Route::get('/create', [HowToWorkController::class, 'create'])->name('works-create');
        Route::post('/store', [HowToWorkController::class, 'store'])->name('works-store');
        Route::get('/edit/{id}', [HowToWorkController::class, 'edit'])->name('works-edit');
        Route::post('/update/{id}', [HowToWorkController::class, 'update'])->name('works-update');
        Route::get('/delete/{id}', [HowToWorkController::class, 'delete'])->name('works-delete');
    });


    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/create', [UserController::class, 'create'])->name('users-create');
        Route::post('/store', [UserController::class, 'store'])->name('users-store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users-edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users-update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users-delete');
        Route::post('/upload', [UserController::class, 'upload'])->name('users-upload');
        Route::get('/edit-password', [UserController::class, 'editPassword'])->name('edit-password');
        Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update-password');
    });

    Route::prefix('configs')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('configs');
        Route::post('/update', [ConfigController::class, 'update'])->name('configs-update');
    });
});

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('photo-editing')->group(function () {
    Route::get('/', [PhotoEditingViewerController::class, 'index'])->name('photo_editing');
    Route::get('/{slug}', [PhotoEditingViewerController::class, 'find'])->name('photo_editing_slug');
});

Route::prefix('virtual-staging')->group(function () {
    Route::get('/', [VirtualStagingViewerController::class, 'index'])->name('virtual_staging');
    Route::get('/{slug}', [VirtualStagingViewerController::class, 'find'])->name('virtual_staging_slug');
});

Route::prefix('floor-plan')->group(function () {
    Route::get('/', [FloorPlanViewerController::class, 'index'])->name('floor_plan');
    Route::get('/{slug}', [FloorPlanViewerController::class, 'find'])->name('floor_plan_slug');
});

Route::prefix('video-slideshow')->group(function () {
    Route::get('/', [VideoSlideShowViewerController::class, 'index'])->name('video_slideshow');
});

Route::prefix('contact-us')->group(function () {
    Route::get('/', [ContactUsController::class, 'index'])->name('contact_us');
    Route::post('/send-mail', [ContactUsController::class, 'sendMail'])->name('contact_us_send_mail');
});
Route::get('/how-to-work', [HowToWorkViewerController::class, 'index'])->name('how_to_work');

