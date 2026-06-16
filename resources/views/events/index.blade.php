<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Evenementen</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-gray-100 min-h-screen">

        <div class="max-w-4xl mx-auto py-10 px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Aankomende evenementen</h1>

            @forelse ($events as $event)
                <div class="bg-white rounded-xl shadow p-6 mb-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">{{ $event->title }}</h2>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $event->start_date->format('d-m-Y H:i') }} &nbsp;|&nbsp;
                                {{ $event->location }}
                            </p>
                            <p class="text-gray-700 mt-3">{{ $event->description }}</p>
                        </div>
                    </div>
                    
                    @if ($event->spotsLeft() > 0)
                        <p class="text-sm text-gray-500 mt-2">Nog {{ $event->spotsLeft() }} plekken beschikbaar</p>
                    @else
                        <p class="text-sm text-red-500 mt-2 font-medium">Evenement is vol</p>
                    @endif
                    
                    {{-- Aanmeldformulier (Livewire) --}}
                    @livewire('registration-form', ['event' => $event], key($event->id))
                </div>
            @empty
                <p class="text-gray-500">Er zijn momenteel geen aankomende evenementen.</p>
            @endforelse
        </div>

        @livewireScripts
    </body>
</html>