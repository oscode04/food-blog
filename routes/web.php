<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\SubCatgoriesController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\InovasiPanganController;
use App\Http\Controllers\KategoriEdukasiController;
use App\Http\Controllers\KategoriFoodTechController;
use App\Http\Controllers\KategoriHealtyFoodController;
use App\Http\Controllers\KategoriLifeStyleController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Node\Block\Document;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LandingPageController::class, 'index'])->name('home');

Route::get('/artikel-details/{id}', [DetailsController::class, 'index'])->name('artikel-details');
// Route::get('/', [LandingPageController::class, 'index'])->name('admin');
// Route::get('/', function () {
//     return view('pages/landing-page');
// })->name('home');

Route::get('/kategori', function () {
    return view('pages/kategori');
})->name('kategori');

Route::get('/food-tech', [KategoriFoodTechController::class, 'index'])->name('food-tech');
Route::get('/life-style', [KategoriLifeStyleController::class, 'index'])->name('life-style');
Route::get('/healty-food', [KategoriHealtyFoodController::class, 'index'])->name('healty-food');
Route::get('/edukasi', [KategoriEdukasiController::class, 'index'])->name('edukasi');

Route::get('/inovasi-pangan', [InovasiPanganController::class, 'index'])->name('inovasi-pangan');
// Route::get('/inovasi-pangan', function () {
//     return view('pages/inovasi-pangan');
// })->name('inovasi-pangan');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
// Route::get('/edukasi', function () {
//     return view('pages/edukasi');
// })->name('edukasi');

Route::get('/about-us', function () {
    return view('pages/kontak');
})->name('about-us');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')
        ->namespace('admin')
        ->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('admin');

            Route::get('/articles/{id}', [ArticleController::class, 'index'])->name('article');

            //Routing untuk category 
            Route::get('category', [CategoryController::class, 'index'])->name('category');
            // Routing categry CRUD
            Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
            Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
            Route::delete('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

            //Routing untuk video 
            Route::get('video', [VideoController::class, 'index'])->name('video');
            // Routing video CRUD
            Route::get('video/create', [VideoController::class, 'create'])->name('video.create');
            Route::post('video/store', [VideoController::class, 'store'])->name('video.store');
            Route::get('video/{id}/edit', [VideoController::class, 'edit'])->name('video.edit');
            Route::post('video/update/{id}', [VideoController::class, 'update'])->name('video.update');
            Route::delete('video/destroy/{id}', [VideoController::class, 'destroy'])->name('video.destroy');

            //Routing untuk sub kategori
            Route::get('sub-category', [SubCatgoriesController::class, 'index'])->name('sub-category');
            // Routing dokumentasi CRUD
            Route::get('sub-category/create', [SubCatgoriesController::class, 'create'])->name('sub-category.create');
            Route::post('sub-category/store', [SubCatgoriesController::class, 'store'])->name('sub-category.store');
            Route::get('sub-category/{id}/edit', [SubCatgoriesController::class, 'edit'])->name('sub-category.edit');
            Route::post('sub-category/update/{id}', [SubCatgoriesController::class, 'update'])->name('sub-category.update');
            Route::delete('sub-category/destroy/{id}', [SubCatgoriesController::class, 'destroy'])->name('sub-category.destroy');

            //Routing untuk artikel 
            Route::get('article', [ArticleController::class, 'index'])->name('article');
            // Routing dokumentasi CRUD
            Route::get('article/create', [ArticleController::class, 'create'])->name('article.create');
            Route::post('article/store', [ArticleController::class, 'store'])->name('article.store');
            Route::get('article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
            Route::post('article/update/{id}', [ArticleController::class, 'update'])->name('article.update');
            Route::delete('article/destroy/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
        });
});




Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
