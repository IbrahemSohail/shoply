<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head')
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex flex-col">
            @include('layouts.navigation')

            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                {{ $slot }}
            </main>
        </div>
    </body>
    </html>
