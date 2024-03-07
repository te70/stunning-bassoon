<x-guest-layout>
    <form method="POST" action="{{ route('user.update', $id) }}">
        @csrf

        <!-- Name -->
        <div>
            <labelfor="name" :value="__('Name')" />
            <input id="name" class="block mt-1 w-full" type="text" name="name" value={{$userd->name}} required autofocus hidden autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <labelfor="email" :value="__('Email')" />
            <input id="email" class="block mt-1 w-full" type="email" name="email" value={{$userd->email}} required hidden autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <labelfor="password" :value="__('Password')" />

            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            value={{$userd->password}}
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <labelfor="password_confirmation" :value="__('Confirm Password')" />

            <input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            value={{$userd->password}}
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
