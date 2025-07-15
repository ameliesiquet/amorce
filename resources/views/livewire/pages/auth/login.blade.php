<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<section class="bg-zinc-900 text-white h-screen flex items-center justify-center">

<div class="bg-zinc-900 text-white h-screen flex items-center justify-center">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

<<<<<<< Updated upstream
    <form wire:submit="login" class="bg-zinc-900 p-10 border border-amber-200 rounded-2xl text-white">
        <!-- Email Address -->
=======
    <form wire:submit.prevent="login" class="bg-zinc-900 p-10 border border-amber-200 rounded-2xl text-white">
        @csrf
>>>>>>> Stashed changes
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
<<<<<<< Updated upstream
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
=======
            <x-input-label for="password" :value="__('Password')"/>
            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                          name="password" required autocomplete="current-password"/>
            <x-input-error :messages="$errors->get('form.password')" class="mt-2"/>
>>>>>>> Stashed changes
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
<<<<<<< Updated upstream
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
=======
                <input wire:model="form.remember" id="remember" type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-50">{{ __('Remember me') }}</span>
>>>>>>> Stashed changes
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
<<<<<<< Updated upstream
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" wire:navigate>
=======
                <a class="underline text-sm text-white hover:text-amber-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('password.request') }}" wire:navigate>
>>>>>>> Stashed changes
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>

</section>
