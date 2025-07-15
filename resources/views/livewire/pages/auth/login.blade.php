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

        <!-- Email Address -->
    <form wire:submit.prevent="login" class="bg-zinc-900 p-10 border border-amber-200 rounded-2xl text-white flex flex-col gap-4">
        @csrf
        <!-- Email -->
        <x-form.field-label-input
            label="Email"
            name="form.email"
            type="email"
            model="form.email"
            placeholder="your-email@gmail.com"
            autocomplete="email"
            autofocus
            class="lowercase"
        />
        <!-- Password -->
        <div class="flex flex-col gap-3">
            <x-form.input-password
                label="Password"
                name="form.password"
                :model="'form.password'"
                autocomplete="current-password"
            />
            <!-- Remember Me -->
            <div class="block mt-2">
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 " name="remember">
                    <span class="ms-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
                </label>
            </div>
        </div>
        <div >
            @if (Route::has('password.request'))
                <a class="underline text-sm text-white hover:text-amber-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 "
                   href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        <x-buttons.primary-button class="ms-3">
            {{ __('Log in') }}
        </x-buttons.primary-button>
    </form>
</div>

</section>
