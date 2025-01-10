<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

       <!-- Modal Berhasil Register -->
       @if(session('success'))
       <div id="successModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 z-50 flex items-center justify-center hidden">
           <div class="bg-white p-6 rounded-lg shadow-xl">
               <h2 class="text-lg font-semibold text-green-600">Berhasil Registrasi</h2>
               <p class="mt-2">Registrasi berhasil! Silakan login untuk melanjutkan.</p>
               <div class="mt-4 flex justify-end">
                   <button onclick="closeModal()" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                       OK
                   </button>
               </div>
           </div>
       </div>
       <script>
           // Menampilkan modal setelah halaman dimuat
           window.onload = function() {
               document.getElementById('successModal').style.display = 'flex';
           };
   
           // Fungsi untuk menutup modal
           function closeModal() {
               document.getElementById('successModal').style.display = 'none';
           }
       </script>
       @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        

        <div class="flex items-center justify-end mt-4">
            <div class="mx-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('dont have acount?') }}
                </a>
    
            </div>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>

           
        </div>
    </form>
</x-guest-layout>
