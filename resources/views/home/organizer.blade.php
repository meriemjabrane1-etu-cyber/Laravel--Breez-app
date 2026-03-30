<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Organizer Dashboard 
        </h2>
    </x-slot>

    <div class="p-6">
        <h1 class="text-2xl">Welcome {{ auth()->user()->name }}</h1>
        <p>Your role: {{ auth()->user()->role }}</p>
    </div>
</x-app-layout>
