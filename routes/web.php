<?php

use App\Http\Services\XmlService;
use Illuminate\Support\Facades\Route;

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


    //return "<pre style='text-align: center'>".htmlentities($x->generateInvoiceCZ())."</pre><br/>";
    return view("welcome");
});
