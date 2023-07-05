<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Circulars') }}
        </h2>

        @can('Create Circular')
            <div class="flex justify-center items-center float-right">
                <a href="{{route('circular.create')}}"
                   class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200 dark:border-gray-200  dark:hover:bg-gray-700 ml-2"
                   title="Members List">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    <span class="hidden md:inline-block ml-2">Create Circular</span>
                </a>
            </div>
        @endcan
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-6 ">
                @foreach(\App\Models\Division::all() as $division)
                    <a href="{{route('circular.division', $division->id)}}"
                       class="transform bg-white hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="p-5">
                            <div class="grid grid-cols-3 gap-1">
                                <div class="col-span-2">
                                    <div class="text-3xl font-bold leading-8">{{$division->circulars->count()}}</div>
                                    <div class="mt-1 text-base font-bold text-gray-600">
                                        {{$division->name}}
                                    </div>
                                </div>
                                <div class="col-span-1 flex items-center justify-end">
                                    @if($division->short_name == "IBD")
                                        <img src="https://img.icons8.com/?size=128&id=41028&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @elseif($division->short_name == "OPD")
                                        <img src="https://img.icons8.com/?size=128&id=uGdZ04SqPxmY&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @elseif($division->short_name == "CMD")
                                        <img src="https://img.icons8.com/?size=128&id=76864&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @elseif($division->short_name == "HRD")
                                        <img src="https://img.icons8.com/?size=128&id=MkDL506zTrpE&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @elseif($division->short_name == "SAMD")
                                        <img src="https://img.icons8.com/?size=128&id=KIYhNnVRdRaN&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @elseif($division->short_name == "CD")
                                        <img src="https://img.icons8.com/?size=128&id=s4MzQ849Sdas&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @elseif($division->short_name == "TMD")
                                        <img src="https://img.icons8.com/?size=128&id=WHTQ647cdlNh&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @elseif($division->short_name == "FCD")
                                        <img src="https://img.icons8.com/?size=128&id=39897&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @elseif($division->short_name == "ITD")
                                        <img src="https://img.icons8.com/?size=128&id=0dbdoPcVxc3N&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @elseif($division->short_name == "CRBD")
                                        <img src="https://img.icons8.com/?size=128&id=64550&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @elseif($division->short_name == "CAD")
                                        <img src="https://img.icons8.com/?size=128&id=Vj50UPHgnPdv&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @elseif($division->short_name == "RMD")
                                        <img src="https://img.icons8.com/?size=128&id=6i3rGzDoPqyO&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @elseif($division->short_name == "AID")
                                        <img src="https://img.icons8.com/?size=128&id=42873&format=png"
                                             alt="employees on leave" class="h-12 w-12">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach


            </div>
        </div>
    </div>
</x-app-layout>
