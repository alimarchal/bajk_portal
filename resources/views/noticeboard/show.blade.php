<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Noticeboard') }}
        </h2>

        <div class="flex justify-center items-center float-right">
            <a href="{{route('noticeBoard.create')}}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200 dark:border-gray-200  dark:hover:bg-gray-700 ml-2" title="Members List">
                <span class="hidden md:inline-block ml-2">Create Notice</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-8">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $noticeBoard->title }} - {{ \Carbon\Carbon::parse($noticeBoard->created_at)->diffForHumans() }}</h5>
                    </a>

                    <div class="no-tailwindcss-base mb-4">
                        {!! $noticeBoard->description !!}

                        <hr class="my-4">
                        <a href="{{Storage::url($noticeBoard->document)}}" class="hover:underline text-blue-500" target="_blank">
                            Attachment
                        </a>

                    </div>


                    <a href="{{ route('noticeBoard.index') }}" class="mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Back
                    </a>
                </div>


        </div>
    </div>
</x-app-layout>
