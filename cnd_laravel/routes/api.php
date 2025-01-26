<?php

use App\Domains\Contact\Actions\SaveContactForm;
use Illuminate\Support\Facades\Route;

Route::prefix('contact-form')->group(function () {
    Route::post('', SaveContactForm::class);
});
