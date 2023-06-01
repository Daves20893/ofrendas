<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;
use App\Http\Controllers\Admin\BrotherController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\OfferingController;
use App\Http\Controllers\Admin\VisitorController;


Route::get('', [HomeController::class,'index'])->name('admin.home');

Route::get('/informes_individual', [OfferingController::class,'individual_index'])->name('admin.reports.individual');

Route::post('download-pdf', [OfferingController::class,'individual_index_pdf'])->name('admin.reports.individual.pdf');

Route::get('/informes_global', [OfferingController::class,'global_index'])->name('admin.reports.global');

Route::post('download-pdf-global', [OfferingController::class,'global_index_pdf'])->name('admin.reports.global.pdf');

Route::resource('brothers', BrotherController::class)->names('admin.brothers');

Route::resource('offerings', OfferingController::class)->names('admin.offerings');

Route::resource('categories', CategoryController::class)->names('admin.categories');

Route::resource('expenses', ExpenseController::class)->names('admin.expenses');

Route::resource('visitors', VisitorController::class)->names('admin.visitors');

Route::resource('lessons', LessonController::class)->names('admin.lessons');

Route::resource('students', VisitorController::class)->names('admin.students');

Route::resource('teachers', VisitorController::class)->names('admin.teachers');

Route::resource('subjects', VisitorController::class)->names('admin.subjects');

Route::resource('credits', VisitorController::class)->names('admin.credits');