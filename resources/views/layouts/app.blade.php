<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        @media print {
            /* Hide entire navigation container */
            .navigation-container {
                display: none !important;
            }
            
            /* Hide header when printing */
            .page-header {
                display: none !important;
            }
            
            /* Hide status messages when printing */
            .status-message {
                display: none !important;
            }
            
            /* Adjust main content for printing */
            .main-content-area {
                margin-left: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
            
            /* Ensure white background */
            body {
                background-color: white !important;
            }
            
            .min-h-screen {
                padding: 0 !important;
                margin: 0 !important;
            }

            /* General print settings */
            @page {
                margin: 2cm;
            }
        }
    </style>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex bg-gray-100">
            <!-- Navigation Container -->
            <div class="navigation-container">
                @include('layouts.navigation')
            </div>

            <!-- Main Content Area -->
            <div class="flex-1 p-6 main-content-area">
                <!-- Flash Message -->
                @if(session('status'))
                    <div class="bg-green-500 text-white p-2 rounded-lg mb-4 status-message">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow mb-6 page-header">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html> 