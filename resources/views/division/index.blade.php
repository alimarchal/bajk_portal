<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Divisions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <table class="w-full text-sm border-collapse border border-slate-400 text-left text-black dark:text-gray-400">
                        <thead class="text-black uppercase bg-gray-50 dark:bg-gray-700 ">
                        <tr>
                            <th scope="col" class="px-1 py-3 border border-black" width="70%">
                                Name
                            </th>
                            <th scope="col" class="px-1 py-3 border border-black  text-center" width="50%">
                                Short Name
                            </th>
{{--                            <th scope="col" class="px-1 py-3 border border-black  text-center" width="5%">--}}
{{--                                Actions--}}
{{--                            </th>--}}
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($divisions as $division)
                            <tr class="bg-white  border-b dark:bg-gray-800 dark:border-black text-left">
                                <th class="border px-2 py-2  border-black font-medium text-black dark:text-white">
                                    {{$division->name}}
                                </th>
                                <th class="border px-2 py-2 border-black py-0 font-medium text-black dark:text-white text-center">
                                    {{$division->short_name}}
                                </th>
                            </tr>
                        @endforeach

                        <tr class="bg-white  border-b dark:bg-gray-800 dark:border-black text-left">
                            <th class="border px-2 py-2  border-black font-medium text-black dark:text-white text-center font-bold">
                                Total
                            </th>
                            <th class="border px-2 py-2  border-black font-medium text-black dark:text-white text-center font-bold" colspan="2">
                                {{$divisions->count()}}
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
