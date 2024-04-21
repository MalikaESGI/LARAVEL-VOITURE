@extends('admin.admin')

@section('titre', $user->exists ? "Editer l'utilisateur": "Créer un utilisateur")

@section('content')

<x-guest-layout>
    <form class="vstack gap-2" action="{{ route($user->exists ? 'admin.user.update': 'admin.user.store', ['user' => $user ]) }}" method="post">
        @csrf
        @method($user->exists ? 'put': 'post')

      <!-- Name -->
<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->exists ? old('name', $user->name) : '' }}" required autofocus autocomplete="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<!-- Surname -->
<div>
    <x-input-label for="surname" :value="__('Surname')" />
    <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" value="{{ $user->exists ? old('surname', $user->surname) : '' }}" required autofocus autocomplete="name" />
    <x-input-error :messages="$errors->get('surname')" class="mt-2" />
</div>

<!-- Birthday -->
<div>
    <x-input-label for="birthday" :value="__('Birthday')" />
    <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" value="{{ $user->exists ? old('birthday', $user->birthday) : '' }}" required autofocus autocomplete="birthday" />
    <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
</div>

<!-- Email Address -->
<div class="mt-4">
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->exists ? old('email', $user->email) : '' }}" required autocomplete="username" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select name="role" id="role">
                @foreach($role as $role)
                    <option value="{{ $role }}" {{ $currentRole === $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                @endforeach
            </select>
        </div>

        <!-- Show password fields only for new user creation -->
        @unless($user->exists)
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        @endunless

        <button class="btn btn-primary">
            @if($user->exists)
                Modifier
            @else
                Créer un utilisateur
            @endif
        </button>
    </form>
</x-guest-layout>
@endsection
