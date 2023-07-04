<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Events') }}
        </h2>

        <div class="flex justify-center items-center float-right">
            <a href="{{route('event.create')}}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200 dark:border-gray-200  dark:hover:bg-gray-700 ml-2" title="Members List">
                <span class="hidden md:inline-block ml-2">Create New Event</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($events as $event)
                    <a href="{{ route('event.show', $event->id) }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $event->title }} -  {{ \Carbon\Carbon::parse($event->created_at)->diffForHumans() }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{!! $event->description !!}</p>
                    </a>
                @endforeach
            </div>


        </div>
    </div>
</x-app-layout>
