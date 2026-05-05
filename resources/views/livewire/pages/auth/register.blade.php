<?php

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $no_telp = '';
    public string $no_whatsapp = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'no_telp' => ['required', 'string', 'max:20'],
            'no_whatsapp' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Wrap dalam DB transaction biar atomic — kalau gagal di tengah, rollback semua
        $user = DB::transaction(function () use ($validated) {
            // 1. Buat user baru dengan role 'pelanggan'
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'pelanggan', // Default semua yg register dari form = pelanggan
            ]);

            // 2. Buat record pelanggan terkait
            Pelanggan::create([
                'user_id' => $user->id,
                'no_telp' => $validated['no_telp'],
                'no_whatsapp' => $validated['no_whatsapp'] ?: $validated['no_telp'], // Default ke no_telp kalau kosong
            ]);

            return $user;
        });

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Nama Lengkap -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Nomor Telepon -->
        <div class="mt-4">
            <x-input-label for="no_telp" :value="__('Nomor Telepon')" />
            <x-text-input wire:model="no_telp" id="no_telp" class="block mt-1 w-full" type="tel" name="no_telp" required placeholder="Contoh: 081234567890" />
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div>

        <!-- Nomor WhatsApp (opsional) -->
        <div class="mt-4">
            <x-input-label for="no_whatsapp" :value="__('Nomor WhatsApp (opsional, jika berbeda)')" />
            <x-text-input wire:model="no_whatsapp" id="no_whatsapp" class="block mt-1 w-full" type="tel" name="no_whatsapp" placeholder="Kosongkan jika sama dengan No. Telepon" />
            <x-input-error :messages="$errors->get('no_whatsapp')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Konfirmasi Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Sudah punya akun?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</div>
