<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserLogin;




Route::get('home', HomeController::class)->name('home');


Route::get('/', 'WelcomeController@home');



   
   
    
        Route::post('nuevo/{id}',    [UserLogin::class, 'login'])->name('login.r');
        
      
 


Route::post('/main', [UserLogin::class, 'Singin'])->name('Singin');


Route::resource('company', 'CompanyController');
Route::resource('customer', 'CustomerController');
Route::resource('lote', 'LoteController');
Route::resource('book', 'BookController');

Auth::routes();