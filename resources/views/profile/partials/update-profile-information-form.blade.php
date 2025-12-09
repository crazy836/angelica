<section>
    <header>
        <h2 class="text-2xl font-bold text-white">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Profile Picture Upload Section -->
        <div class="bg-gray-800 rounded-lg p-4">
            <x-input-label for="avatar" :value="__('Profile Picture')" class="block text-sm font-medium text-gray-300 mb-2" />
            <div class="flex items-center space-x-4">
                <input id="avatar" name="avatar" type="file" class="block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-red-600 file:text-white
                    hover:file:bg-red-700" onchange="previewImage(event)" />
                
                <div class="flex-shrink-0">
                    <!-- Preview container -->
                    <div id="avatar-preview-container" class="w-16 h-16 rounded-full bg-gray-600 flex items-center justify-center text-gray-400">
                        @if($user->profile_photo_path)
                            <img id="avatar-preview" src="{{ asset('storage/' . $user->profile_photo_path) }}?v={{ time() }}" alt="Profile Picture" class="w-16 h-16 rounded-full object-cover">
                        @else
                            <svg id="avatar-placeholder" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <img id="avatar-preview" src="" alt="Profile Picture" class="w-16 h-16 rounded-full object-cover hidden">
                        @endif
                    </div>
                </div>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>
        
        <!-- JavaScript for image preview -->
        <script>
            function previewImage(event) {
                const input = event.target;
                const preview = document.getElementById('avatar-preview');
                const placeholder = document.getElementById('avatar-placeholder');
                const container = document.getElementById('avatar-preview-container');
                
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                        if (placeholder) {
                            placeholder.classList.add('hidden');
                        }
                        // Update container to remove background
                        container.classList.remove('bg-gray-600');
                        container.classList.remove('text-gray-400');
                        container.classList.add('p-0');
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = '';
                    preview.classList.add('hidden');
                    if (placeholder) {
                        placeholder.classList.remove('hidden');
                        // Restore container background
                        container.classList.add('bg-gray-600');
                        container.classList.add('text-gray-400');
                        container.classList.remove('p-0');
                    }
                }
            }
        </script>

        <!-- Name Field -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="block text-sm font-medium text-gray-300 mb-1" />
            <x-text-input id="name" name="name" type="text" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-red-500 text-sm" :messages="$errors->get('name')" />
        </div>

        <!-- Change Email Address Section -->
        <div class="bg-gray-800 rounded-lg p-4">
            <h3 class="text-lg font-semibold text-white mb-3">Change Email Address</h3>
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-300 mb-1" />
                <x-text-input id="email" name="email" type="email" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2 text-red-500 text-sm" :messages="$errors->get('email')" />
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-3 bg-yellow-900 rounded-lg">
                    <p class="text-sm text-yellow-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ __('Your email address is unverified.') }}
                    </p>
                    <div class="mt-2">
                        <button form="send-verification" class="text-sm text-yellow-300 hover:text-yellow-100 underline focus:outline-none">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </div>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-400 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Birthdate Field -->
        <div>
            <x-input-label for="birthdate" :value="__('Birthdate')" class="block text-sm font-medium text-gray-300 mb-1" />
            <x-text-input id="birthdate" name="birthdate" type="date" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" :value="old('birthdate', $user->birthdate)" />
            <x-input-error class="mt-2 text-red-500 text-sm" :messages="$errors->get('birthdate')" />
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4">
            <x-primary-button class="px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
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
