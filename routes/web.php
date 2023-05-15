<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProofOfPaymentController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TouristAttractionController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ProfileController;
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
//halaman menampilkan profile
Route::post('/action-edit-password',[ProfileController::class,'editPassword']) -> name('actionEditPassword') -> middleware('auth');
Route::post('/update-profile',[ProfileController::class,'updateProfile']) -> name('actionUpdateProfile') -> middleware('auth');
Route::get('/profile/edit-password',[ProfileController::class,'viewEditPassword']) -> middleware('auth');
Route::get('/profile',[ProfileController::class,'viewProfile']) -> middleware('auth');

// halaman menampilkan promo
// halaman menampilkan promo
Route::get('/promo',[PromoController::class,'viewPromo']);
Route::get('/promo/{id}',[PromoController::class,'detailPromo']);

//halaman menampilkan event
Route::get('/kebudayaan',[EventController::class,'viewEvent']);
Route::get('/kebudayaan/{id}', [EventController::class, 'detailEvent']) -> name('detailEvent');

//halaman testing chatbot
Route::get('/chat-bot',[ChatBotController::class, 'viewChatBot']);
Route::get('/chat-bot/pertanyaan/{jenis}',[ChatBotController::class, 'getQuestion']);


//halaman menambahkan proof of payment
Route::post('create-pop/{id}/{pax}/{code}', [ProofOfPaymentController::class, 'createProofOfPayment']) -> name('createPop') -> middleware('auth');

// Halaman memesan form tiket
Route::get('/daftar-tiket', [TicketController::class, 'viewTiketByUser']);
Route::post('/pesan-tiket/{id}/{pax}/{code}/edit', [TicketController::class, 'actionEditTicket'])->where(['id' => '[0-9]+', 'pax' => '[1-5]{1}'])-> name('actionEditTiket') -> middleware('auth');
Route::get('/pesan-tiket/{id}/{pax}/{code}/edit', [TicketController::class, 'editTicket'])->where(['id' => '[0-9]+', 'pax' => '[1-5]{1}'])-> name('editTiket') -> middleware('checkisverify') -> middleware('auth');
Route::get('/pesan-tiket/{id}/{pax}/{code}', [TicketController::class, 'orderDetail'])->where(['id' => '[0-9]+', 'pax' => '[1-5]{1}']) -> name('detailTicket') -> middleware('auth');
Route::get('/pesan-tiket/{id}/{pax}',[TicketController::class,'addTicket']) ->where(['id' => '[0-9]+', 'pax' => '[1-5]{1}']) -> name('pesanTiket') -> middleware('auth');
Route::post('/create-order/{id}/{pax}',[TicketController::class, 'createOrder'])  -> name('createOrder') ->where(['id' => '[0-9]+', 'pax' => '[1-5]{1}']) -> middleware('auth');

// Halaman Tourist Attraction
Route::get('/tempat-wisata',[TouristAttractionController::class,'viewTouristAttraction']);
Route::get('/tempat-wisata/{id}', [TouristAttractionController::class, 'detailTouristAttraction']) -> name('detailPariwisata');

//post admin
Route::get('/create-article',[ArticleController::class, 'createArticle']);

// REGISTER
Route::get('/register', [RegisterController::class, 'register']) -> name('register');
Route::post('/actionRegister', [RegisterController::class, 'actionRegister']) -> name('actionRegister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');


// login 
Route::get('/login', [LoginController::class, 'login']) -> name('login');
Route::post('/actionLogin', [LoginController::class, 'actionLogin']) -> name('actionLogin');


// Home
Route::get('/', [HomeController::class, 'home']) -> name('home');
Route::get('/logout', [LoginController::class, 'logout']) -> name('logout') -> middleware('auth');