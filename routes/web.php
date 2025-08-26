<?php
require __DIR__.'/auth.php';

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', \App\Livewire\Pages\Dashboard\Dashboard::class)->name('dashboard');
Route::get('/projects', \App\Livewire\Pages\Projects\Projects::class)->name('projects');
Route::get('/accounting', \App\Livewire\Pages\Accounting\Accounting::class)->name('accounting');
Route::get('/meeting', \App\Livewire\Pages\Meeting\Meeting::class)->name('meeting');
Route::get('/newsletter', \App\Livewire\Pages\Newsletter\Newsletter::class)->name('newsletter');
Route::get('/selection', \App\Livewire\Pages\Selection\Selection::class)->name('selection');

Route::get('/fund/edit/{model}', \App\Livewire\Modals\EditFund::class)->name('fund.edit');





ini_set('memory_limit', '512M');
