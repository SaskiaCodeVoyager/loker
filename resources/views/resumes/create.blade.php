@extends('layouts.app')

@section('content')
<div class="min-h-screen flex bg-gray-50">
    <!-- Sidebar Navigation -->
    <nav class="bg-white w-64 h-screen p-4 border-r shadow-lg">
        <div>
            <a href="{{ route('dashboard') }}" class="block text-orange-600 text-xl font-bold mb-6">Logo</a>
            
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
            
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}" 
                       class="block py-2 px-3 rounded hover:bg-orange-100 {{ request()->routeIs('dashboard') ? 'bg-orange-100' : '' }}">
                        Dashboard
                    </a>
                </li>
                @if (Auth::user()->resume)
                    <li>
                        <a href="{{ route('resume.index') }}" 
                           class="block py-2 px-3 rounded hover:bg-orange-100 {{ request()->routeIs('resume.index') ? 'bg-orange-100' : '' }}">
                            Resume
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('resume.create') }}" 
                           class="block py-2 px-3 text-sm text-orange-600 hover:underline">
                            Tambah Resume
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h2 class="text-2xl font-bold text-orange-600 mb-4">Tambah Resume</h2>

        <form method="POST" action="{{ route('resume.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="w-full mt-2 border border-gray-300 p-2 rounded-md" required>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full mt-2 border border-gray-300 p-2 rounded-md" required>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Tahun Lahir</label>
                    <input type="number" name="tahun_lahir" class="w-full mt-2 border border-gray-300 p-2 rounded-md" required>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Lokasi</label>
                    <input type="text" name="lokasi" class="w-full mt-2 border border-gray-300 p-2 rounded-md" required>
                </div>

                <div>
                    <button type="submit" class="mt-4 px-6 py-2 bg-orange-600 text-white rounded-md">Simpan Resume</button>
                </div>
            </div>
        </form>
    </main>
</div>
@endsection
