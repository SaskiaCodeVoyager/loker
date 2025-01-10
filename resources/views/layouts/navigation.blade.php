
<div class="min-h-screen flex bg-gray-50">
    <!-- Sidebar Navigation -->
    <nav class="bg-white w-64 h-screen p-4 border-r shadow-lg">
        <div>
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="block text-orange-600 text-xl font-bold mb-6">Logo</a>

            <!-- User Settings -->
            <div class="mt-6 mb-6 pt-4 border-b">
                <div class="flex items-center mb-3">
                    <span class="text-sm font-medium flex-1">{{ Auth::user()->name }}</span>
                    <img src="{{ Auth::user()->perusahaan && Auth::user()->perusahaan->logo 
                                  ? asset('storage/' . Auth::user()->perusahaan->logo) 
                                  : asset('/gambar/1.png') }}" 
                         alt="Logo" class="w-8 h-8 rounded-full border">
                </div>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('profile.edit') }}" class="block py-2 px-3 text-sm text-gray-700 hover:bg-orange-100">
                            Info Akun
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left py-2 px-3 text-sm text-gray-700 hover:bg-orange-100">
                                Log Out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
 
            <!-- Sidebar Menu -->
            <ul class="space-y-2">
                @if(Auth::user()->role == 'user')
                    <li>
                        <a href="{{ route('dashboard') }}" 
                           class="block py-2 px-3 rounded hover:bg-orange-100 {{ request()->routeIs('dashboard') ? 'bg-orange-100' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('resume.index') }}" 
                           class="block py-2 px-3 rounded hover:bg-orange-100 {{ request()->routeIs('resume.index') ? 'bg-orange-100' : '' }}">
                            Resume
                        </a>
                    </li>
                    @endif     
            </ul>
        </div>
    </nav>
</div>
