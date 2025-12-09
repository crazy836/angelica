<section>
    <header>
        <h2 class="text-2xl font-bold text-white">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="block text-sm font-medium text-gray-300 mb-1" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="block text-sm font-medium text-gray-300 mb-1" />
            <x-text-input id="update_password_password" name="password" type="password" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="block text-sm font-medium text-gray-300 mb-1" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="flex flex-col sm:flex-row items-center gap-4">
            <x-primary-button class="px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 w-full sm:w-auto">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-500"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>