@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-3xl p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
            Ice Cream List
        </h1>

        <a href="{{ route('icecreams.create') }}" 
           class="px-4 py-2 bg-primary text-white rounded-lg shadow-md hover:bg-sky-400 transition duration-300">
            Add New Ice Cream
        </a>

        <div class="overflow-x-auto mt-4">
            <table class="w-full table-auto border-collapse border border-gray-200 dark:border-gray-700">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th class="p-2 border border-gray-200 dark:border-gray-700">Name</th>
                        <th class="p-2 border border-gray-200 dark:border-gray-700">Size</th>
                        <th class="p-2 border border-gray-200 dark:border-gray-700">Flavor</th>
                        <th class="p-2 border border-gray-200 dark:border-gray-700">Price</th>
                        <th class="p-2 border border-gray-200 dark:border-gray-700">Function</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($iceCreams as $iceCream)
                        <tr class="hover:bg-sky-400 dark:hover:bg-sky-600 transition duration-300">
                            <td class="p-2 border border-gray-200 dark:border-gray-700">{{ $iceCream->name }}</td>
                            <td class="p-2 border border-gray-200 dark:border-gray-700">{{ $iceCream->size }}</td>
                            <td class="p-2 border border-gray-200 dark:border-gray-700">{{ $iceCream->flavor }}</td>
                            <td class="p-2 border border-gray-200 dark:border-gray-700">${{ $iceCream->price }}</td>
                            <td class="p-2 border border-gray-200 dark:border-gray-700">
    <div class="flex items-center space-x-4">
        <a href="{{ route('icecreams.edit', $iceCream->id) }}" 
           class="text-sky-600 hover:underline">
           Edit
        </a>

        <form action="{{ route('icecreams.destroy', $iceCream->id) }}" method="POST" 
              onsubmit="return confirm('Are you sure you want to delete this?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-700 hover:underline">
                Delete
            </button>
        </form>
    </div>
</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
