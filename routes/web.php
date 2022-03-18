<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

/* --------------------- Admin Route -------------------- */

Route::prefix('admin')->group( function () {
    Route::get('/', function () {
        return redirect()->to('admin/dashboard');
    });

    Route::get('/login', [AdminController::class, 'Index'])->name('admin.login');
    Route::post('/login/handle', [AdminController::class, 'Login'])->name('admin.login.handle');
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])
        ->name('admin.dashboard')->middleware('admin');
    
    Route::post('/update/{id}', function ($id) {
        $shortURL = \AshAllenDesign\ShortURL\Models\ShortURL::findByKey(request()->url);
        if (is_null($shortURL)) {
            $url = \AshAllenDesign\ShortURL\Models\ShortURL::find($id);
            $url->url_key = request()->url;
            $url->destination_url = request()->destination;
            $url->default_short_url = config('app.url').'/s/'.request()->url;
            $url->save();
            
            return back()->with('admmsg','URL updated successfully. ');
        } else {
            return back()->with('admerr','URL already exists. ');
        }
        
    })->name('admin.update')->middleware('admin');

    Route::get('/delete/{id}', function ($id) {
        $url = \AshAllenDesign\ShortURL\Models\ShortURL::find($id);
        $url->delete();
    
        return back()->with('admmsg','URL deleted successfully. ');
    })->name('admin.delete')->middleware('admin');

    Route::get('/logout', [AdminController::class, 'Logout'])
        ->name('admin.logout')->middleware('admin');
});

/* --------------------- End Admin Route -------------------- */


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $uid = Auth::id();
    $urls = \AshAllenDesign\ShortURL\Models\ShortURL::latest()->where('user_id', $uid)->get();
    return view('dashboard', compact('urls'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/dashboard', function () {
    $builder = new \AshAllenDesign\ShortURL\Classes\Builder();

    $shortURLObject = $builder->destinationUrl(request()->url)->make();
    $shortURL = $shortURLObject->default_short_url;

    return back()->with('success','URL shortened successfully. ');

})->name('url.shorten');

Route::get('/s/{shortURLKey}', '\AshAllenDesign\ShortURL\Controllers\ShortURLController');

require __DIR__.'/auth.php';
