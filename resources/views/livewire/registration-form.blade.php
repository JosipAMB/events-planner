<div class="mt-4">
    @if ($submitted)
        <p class="text-green-600 font-medium">Je bent aangemeld! Tot {{ $event->start_date->format('d-m-Y') }}.</p>
        <button
            wire:click="cancel"
            class="mt-2 text-sm text-red-500 underline hover:text-red-700"
        >
            Afmelden
        </button>
    @else
        <form wire:submit="submit" class="flex flex-col sm:flex-row gap-3 mt-2">
            <input
                type="text"
                wire:model="name"
                placeholder="Je naam"
                class="border rounded-lg px-3 py-2 text-sm flex-1 focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <input
                type="email"
                wire:model="email"
                placeholder="Je e-mailadres"
                class="border rounded-lg px-3 py-2 text-sm flex-1 focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <button
                type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition"
            >
                Aanmelden
            </button>
        </form>

        @error('name')  <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    @endif
</div>