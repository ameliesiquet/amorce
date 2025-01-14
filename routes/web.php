<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
Route::get('/projects', \App\Livewire\Projects::class)->name('projects');
Route::get('/accounting', \App\Livewire\Pages\Accounting\Accounting::class)->name('accounting');
Route::get('/meeting', \App\Livewire\Meeting::class)->name('meeting');
Route::get('/newsletter', \App\Livewire\Newsletter::class)->name('newsletter');
Route::get('/selection', \App\Livewire\Selection::class)->name('selection');

Route::get('/fund/edit/{model}', \App\Livewire\Modals\FundEdit::class)->name('fund.edit');





require __DIR__.'/auth.php';
ini_set('memory_limit', '512M');
