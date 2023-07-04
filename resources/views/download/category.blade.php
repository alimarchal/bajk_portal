<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Downloads
        </h2>

        <div class="flex justify-center items-center float-right">
            <a href="{{route('download.create')}}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200 dark:border-gray-200  dark:hover:bg-gray-700 ml-2" title="Members List">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                <span class="hidden md:inline-block ml-2">Create New Download</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @foreach($downloads as $manual)
                        {{$loop->iteration }} - <a href="javascript:;" class="text-blue-500 hover:underline">
                            {{ $manual->title }} - {{\Carbon\Carbon::parse($manual->created_at)->format('d-M-Y')}}
                            <a href="{{\Illuminate\Support\Facades\Storage::url($manual->document)}}" target="_blank" class="text-red-500 font-extrabold  hover:underline">[Download]</a>
                        </a>                         <!-- Delete button -->
                        <form action="{{ route('download.destroy', $manual->id) }}" method="POST" class="inline-block float-right">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this download?')" class="inline-flex items-center px-4 py-2 bg-red-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Delete</button>
                        </form>
                        <p class="mt-2 mb-2 text-black leading-relaxed">
                            {!! $manual->description !!}
                        </p>


                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
