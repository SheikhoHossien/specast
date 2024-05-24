<?php

use App\Http\Controllers\HomeController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    // dd('soso');
    return view('index');

})->name('index');
Route::get('/index', function () {
    // dd('soso');
    return view('index');

})->name('index');
Route::get('/contact', function () {
    // dd('soso');
    return view('Content.contact');

})->name('contact');
Route::get('/abouts', function () {
    // dd('soso');
    return view('Content.about');

})->name('abouts');
Route::get('/portfolio', function () {
    // dd('soso');
    return view('Content.portfolio');

})->name('portfolio');
Route::get('/commercial', function () {
    // dd('soso');
    // return view('Content.projects.commercial_projets');
    $projects  = DB::table('projects')->where('project_type', 2)->get();
    // dd($projects);
    // dd($projects);
    return view('Content.projects.commercial_projets',compact('projects'));

})->name('commercial');

Route::get('/sub_commercial_projects/{id}', function ($id) {
    // dd($id);
    // dd('soso');
    // return view('Content.projects.commercial_projets');
    $projects  = DB::table('subprojects')->where('project_id', $id)->get();
    // dd($projects);
    // dd($projects);
    return view('Content.projects.sub_commercial_projets',compact('projects'));

})->name('sub_commercial_projects');
Route::get('/villas', function () {
    // dd('soso');
    // return view('Content.projects.villas');
    $villas = DB::table('projects')->where('project_type', 1)->get();

    // dd($projects);
    return view('Content.projects.villas',compact('villas'));

})->name('villas');
Route::get('/mosques', function () {
    // dd('soso');
    // return view('Content.projects.mosques');
    $projects = DB::table('projects')->where('project_type', 1)->get();

    // dd($projects);
    return view('Content.projects.mosques',compact('projects'));

})->name('mosques');
Route::get('/sub_mosques', function () {
    // dd('soso');
    // return view('Content.projects.sub_mosques');
    // $mosques = DB::table('projects')->where('project_type', 1)->get();
    $mosques = DB::table('subprojects')->where('project_id', 1)->get();

    // dd($mosques);
    // dd($projects);
    return view('Content.projects.sub_mosques',compact('mosques'));

})->name('sub_mosques');
Route::get('/clients', function () {
    // dd('soso');
    return view('Content.clients');


})->name('clients');
Route::get('/lang/{locale?}', function ($locale = null) {
    // dd('ssheikkho',$locale);
    // if (isset($locale) && in_array($locale, config('app.available_locales'))) {
    //     app()->setLocale($locale);
    // }
    if (isset($locale)) {
        app()->setLocale($locale);
    }
    // Session::put('lang', $locale);
    session(['lang' => $locale]);


    // return redirect('index',compact('locale'));
    return redirect()->route('index')->with( ['locale' => $locale] );
})->name('lang');




Route::get('/installation', function () {
    // dd('soso');
    return view('Content.services.installation');

})->name('installation');
Route::get('/supply', function () {
    // dd('soso');
    return view('Content.services.supply');

})->name('supply');
Route::get('/3d_design', function () {
    // dd('soso');
    return view('Content.services.3d_design');

})->name('3d_design');
Route::get('/project_management', function () {
    // dd('soso');
    return view('Content.services.project_management');

})->name('project_management');

Route::get('/material_installation', function () {
    // dd('soso');
    return view('Content.services.material_installation');

})->name('material_installation');
Route::get('/products', function () {
    // dd('soso');
    return view('Content.products');

})->name('products');
Route::get('/products_relatives/{id}', function ($id) {
    // dd('soso');
    $products = DB::table('subproducts')->where('product_id', $id)->get();

    // dd($products);
    return view('Content.products_relatives',compact('products'));

})->name('products_relatives');

Route::get('/send', [HomeController::class, 'send'])->name('send');
// Route::get('/client', [ClientController::class, 'createReservation'])->name('client');


