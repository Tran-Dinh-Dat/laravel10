<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\TodoList;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('upload', [FileController::class, 'index'])->name('index');
Route::post('upload', [FileController::class, 'store'])->name('upload');
Route::patch('update/{file}', [FileController::class, 'update'])->name('update');
Route::get('update/{file}', [FileController::class, 'edit'])->name('edit');
Route::get('loading', function () {
    return view('loading.index');
});

 
Route::get('/todos', TodoList::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/storage/move', function () {
    // foreach (Storage::files('tmp') as $_file) {
    //     if (is_file(Storage::path($_file))) {
    //         dump($_file);
    //     }
    // }

    dump(storage_path('tmp'));
    dump(Storage::path('tmp/image.jpg'));

    // tmp_data ディレクトリが未作成の場合、mkdirメソッドで権限のゆるいディレクトリを作成する
    if (! file_exists($tmp_file_dir = Storage::path('tmp'))) {
        mkdir($tmp_file_dir, 0777, true);
    }

    dump(Storage::url('tmp/$2y$10$sWDXMMeo5iYCLsVjcLItWucV3LAx3WPFYlIF5/Yk0jxvNOTM8AgVW_20230809013715.jpg'));
    Storage::move('tmp/$2y$10$sWDXMMeo5iYCLsVjcLItWucV3LAx3WPFYlIF5/Yk0jxvNOTM8AgVW_20230809013715.jpg', 'article/notification/$2y$10$sWDXMMeo5iYCLsVjcLItWucV3LAx3WPFYlIF5/Yk0jxvNOTM8AgVW_20230809013715.jpg');
    // => "http://localhost/storage/tmp/image.jpg"

    dump(Storage::directories());
    Storage::makeDirectory('makeDir');

    dd('11');
    $oldFile = 'tmp/image.jpg';
    $newFile = 'article/notification/image.jpg';
    Storage::move($oldFile, $newFile);
});

Route::post('storage/create', function (Request $request) {
    $file = $request->file('image');
    $fileName = $file->getClientOriginalName();
    $hashedFileName = Hash::make($fileName) . '_' . Carbon::now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
    dump($hashedFileName);
    // dd($file);
    Storage::putFileAs('tmp', $request->file('image'), $hashedFileName);
});