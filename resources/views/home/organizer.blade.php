<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white ">
            Organizer Dashboard
        </h2>
    </x-slot>

    <div class="p-6">
        <h1>Welcome {{ auth()->user()->name }} </h1>
        <p>Role: {{ auth()->user()->role }}</p>
    </div>
</x-app-layout>
