<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }
    public array $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8', 'confirmed'],
    ];


    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate();

        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));
            return;
        }

        Session::flash('status', __($status));

        $this->redirectRoute('login', navigate: true);
    }

}; ?>

<section class="bg-zinc-900 text-white h-screen flex items-center justify-center p-8">
    <form wire:submit.prevent="resetPassword" class="w-full max-w-md space-y-6">
        <!-- Email -->
        <div>
            <label for="email" class="block mb-1 font-medium">Email</label>
            <input wire:model="email" id="email" type="email" required autofocus
                   class="w-full px-3 py-2 rounded border border-gray-300 text-zinc-900 focus:outline-none focus:ring-2 focus:ring-amber-200" />
            @error('email') <p class="text-red-200 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block mb-1 font-medium">Password</label>
            <input wire:model="password" id="password" type="password" required
                   class="w-full px-3 py-2 rounded border border-gray-200 text-zinc-900 focus:outline-none focus:ring-2 focus:ring-amber-200" />
            @error('password') <p class="text-red-200 text-sm mt-1">{{ $message }}</p> @enderror

        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block mb-1 font-medium">Confirm Password</label>
            <input wire:model="password_confirmation" id="password_confirmation" type="password" required
                   class="w-full px-3 py-2 rounded border border-gray-200 text-zinc-900 focus:outline-none focus:ring-2 focus:ring-amber-200" />
            @error('password_confirmation') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-amber-200 rounded text-black hover:bg-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300">
                Reset Password
            </button>
        </div>
    </form>
</section>
