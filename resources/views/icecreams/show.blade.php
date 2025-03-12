@extends('layouts.app')

    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
            Ice Cream Details
        </h1>

        <div class="space-y-2">
            <p class="text-gray-700 dark:text-white"><strong>Name:</strong> {{ $iceCream->name }}</p>
            <p class="text-gray-700 dark:text-white"><strong>Size:</strong> {{ $iceCream->size }}</p>
            <p class="text-gray-700 dark:text-white"><strong>Flavor:</strong> {{ $iceCream->flavor }}</p>
            <p class="text-gray-700 dark:text-white"><strong>Price:</strong> ${{ $iceCream->price }}</p>
        </div>

        <a href="{{ route('icecreams.edit', $iceCream->id) }}" 
           class="mt-4 inline-block px-4 py-2 bg-primary text-white rounded-lg shadow-md hover:bg-sky-400 transition duration-300">
            Edit Ice Cream
        </a>
    </div>
    @extends('layouts.app')

