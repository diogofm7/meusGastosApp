<?php

use Illuminate\Support\Facades\Route;

use \Illuminate\Support\Facades\{Storage, File};

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

use App\Http\Livewire\Expense\{
    ExpenseList,
    ExpenseCreate,
    ExpenseEdit
};

use App\Http\Livewire\Plan\{
    PlanList,
    PlanCreate
};

use App\Http\Livewire\Payment\{
    CreditCard
};

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::prefix('expenses')->name('expenses.')->group(function () {

        Route::get('/', ExpenseList::class)->name('index');
        Route::get('/create', ExpenseCreate::class)->name('create');
        Route::get('/edit/{expense}', ExpenseEdit::class)->name('edit');

        Route::get('/{expense}/photo', function ($expense) {
            $expense = auth()->user()->expenses()->findOrFail($expense);

            if (!Storage::disk('public')->exists($expense->photo))
                return abort(404);

            $image = Storage::disk('public')->get($expense->photo);
            $mimeType = File::mimeType(storage_path('app/public/'.$expense->photo));

            return response($image)->header('Content-Type', $mimeType);
        })->name('photo');

    });

    Route::prefix('plans')->name('plans.')->group(function () {

        Route::get('/', PlanList::class)->name('index');
        Route::get('create', PlanCreate::class)->name('create');

    });

});

Route::get('subscription', CreditCard::class)->name('plan.subscription');

Route::get('/notification', function (){
    //$code = '3C85EA992828D03114A4FFAC784B77FB';
    //return (new \App\Services\PagSeguro\Subscription\SubscriptionReaderService())->getSubscriptionByCode($code);

    $notificationCode = '56321F9A9C5F9C5F6BCBB489BF8395935A64';
    return (new \App\Services\PagSeguro\Subscription\SubscriptionReaderService())->getSubscriptionByNotificationCode($notificationCode);
});
